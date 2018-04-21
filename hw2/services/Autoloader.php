<?php
namespace fadeev\php2\services;
/**
* AutoLoader
*/
class AutoLoader
{
  const REMOVE_NAMESPACE = "fadeev\\php2\\";

  protected $path;
  protected $fileName;

  public function loadClass($className)
  {
    if (stristr($className, self::REMOVE_NAMESPACE))
    {
      $this->path = str_replace(array(self::REMOVE_NAMESPACE, "\\"), array("", "/"), $className);
      $this->fileName = str_replace("#PATH#", $this->path, $_SERVER["DOCUMENT_ROOT"]."/../#PATH#.php");
    }
    if (file_exists($this->fileName))
    {
      include($this->fileName);
    }
  }
}
?>