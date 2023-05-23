<?php 
namespace App\Models;
abstract class Model{
protected $id;

public function getId() {
    return $this->id;
}

abstract public function save($conn);
abstract public function delete($conn);
abstract static public function getById($conn,$id);
abstract  static public function getAll($conn);



}