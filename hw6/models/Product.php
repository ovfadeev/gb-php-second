<?php
namespace fadeev\php2\models;
use fadeev\php2\models\DB;

class Product extends DBModel
{
  public $id;
  public $category_id;
  public $name;
  public $image;
  public $image_small;
  public $image_slider;
  public $description;
  public $price;
  public $size_id;
  public $color_id;
  public $status;
  public $view;
  public $count;

  private $privateColumns = array();

  public function __construct($id = null, $category_id = null, $name = null, $image = null, $image_small = null, $image_slider = null, $description = null, $price = null, $size_id = null, $color_id = null, $status = null, $view = null, $count = null)
  {
    parent::__construct();
    $this->id = $id;
    $this->category_id = $category_id;
    $this->name = $name;
    $this->image = $image;
    $this->image_small = $image_small;
    $this->image_slider = $image_slider;
    $this->description = $description;
    $this->price = $price;
    $this->size_id = $size_id;
    $this->color_id = $color_id;
    $this->status = $status;
    $this->view = $view;
    $this->count = $count;
  }

  public static function GetTableName()
  {
    return DB_PREFIX_TABLE."catalog_products";
  }

  public function PrivateColumns()
  {
    return array_merge(parent::PrivateColumns(), $this->privateColumns);
  }
}
?>