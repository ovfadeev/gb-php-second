<?php
namespace fadeev\php2\services;
/**
* AutoLoader
*/
class AutoLoader
{
  const REMOVE_NAMESPACE = "fadeev\\php2\\";
  const FILENAME = "/../#PATH#.php";

  protected $filePath;
  protected $fileName;

  public function loadClass($className)
  {
    if (stristr($className, self::REMOVE_NAMESPACE))
    {
      $this->filePath = str_replace(array(self::REMOVE_NAMESPACE, "\\"), array("", "/"), $className);
      $this->fileName = str_replace("#PATH#", $this->filePath, $_SERVER["DOCUMENT_ROOT"].self::FILENAME);
    }
    if (file_exists($this->fileName))
    {
      include($this->fileName);
    }
  }
}
?>