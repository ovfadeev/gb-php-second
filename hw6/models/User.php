<?php
namespace fadeev\php2\models;
use fadeev\php2\models\DataEntity;
use fadeev\php2\models\repositories\UserRepository;

class User extends DataEntity
{
  public $id;
  public $f_name;
  public $l_name;
  public $email;
  public $login;
  public $password;

  /**
   * [__construct description]
   * @param int $id
   * @param string $name
   * @param string $lastName
   * @param string $email
   * @param string $login
   * @param string $password
   */
  public function __construct($id = null, $login = null, $password = null, $email = null, $f_name = null, $l_name = null)
  {
    // parent::__construct();
    $this->id = $id;
    $this->login = $login;
    $this->password = $password;
    $this->email = $email;
    $this->f_name = $f_name;
    $this->l_name = $l_name;
  }
}
?>