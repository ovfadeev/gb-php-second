<?php
namespace fadeev\php2\services;
/**
* AutoLoader
*/
class AutoLoader
{
  const FILE_PATH = "#PATH#";
  const FILE_EXT = ".php";

  protected $filePath;
  protected $fileName;

  public function loadClass($className)
  {
    if (stristr($className, DEV_NAMESPACE))
    {
      $this->filePath = str_replace(array(DEV_NAMESPACE, "\\"), array("", DIRECTORY_SEPARATOR), $className);
      $this->fileName = str_replace("#PATH#", $this->filePath, ROOT_DIR.self::FILE_PATH);
      $this->fileName .= self::FILE_EXT;
    }
    if (file_exists($this->fileName))
    {
      include_once($this->fileName);
    }
  }
}
?>