<?php
return array(
  "root_dir" => __DIR__ . "/../",
  "templates_dir" => __DIR__ . "/../views/",
  "controllers_namespaces" => "fadeev\php2\controllers\\",
  "components" => array(
    "db" => array(
      "class" => \fadeev\php2\services\DB::class,
      "driver" => DB_TYPE,
      "host" => DB_HOST,
      "login" => DB_LOGIN,
      "password" => DB_PASSWORD,
      "database" => DB_NAME,
      "charset" => DB_CHARSET
    ),
    "request" => array(
      "class" => \fadeev\php2\services\Request::class
    ),
    "sessions" => array(
      "class" => \fadeev\php2\services\Sessions::class
    ),
    "preparesql" => array(
      "class" => \fadeev\php2\services\Preparesql::class
    ),
  )
);
// define("ROOT_DIR", $_SERVER["DOCUMENT_ROOT"]."/../");
// define("TEMPLATES_DIR", ROOT_DIR."views/");
// /* --- namespaces */
// define("DEV_NAMESPACE", "fadeev\\php2\\");
// define("CONTROLLERS_NAMESPACE", DEV_NAMESPACE."controllers\\");
// /* --- database --- */
// require_once(ROOT_DIR."config/db.php");
?>