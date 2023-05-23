<?php
namespace App\Models;

// abstract class Model {
//     protected $id;

//     public function getId() {
//         return $this->id;
//     }

//     abstract public function save($conn);
//     abstract public function delete($conn);
//     abstract public function getById($conn,$id);
//     abstract public function getAll($conn);



// }

class Product extends Model {
    private $name;
    private $price;

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getPrice() {
        return $this->price;
    }

    public function setPrice($price) {
        $this->price = $price;
    }

    public static function getAll($conn) {
        $query = "SELECT * FROM products";
        $result = mysqli_query($conn, $query);
        $uproducts = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $product = new Product();
            $product->id = $row['id'];
            $product->setName($row['name']);
            $product->setPrice($row['price']);
            $products[] = $product;
        }
        return $products;
    }

    public static function getById($conn, $id) {
        $query = "SELECT * FROM products WHERE id = '$id'";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);
        $product = new Product();
        $product->id = $row['id'];
        $product->setName($row['name']);
        $product->setPrice($row['price']);
        return $product;
    }

    public function save($conn) {
        if ($this->id) {
            $query = "UPDATE products SET name = '$this->name', price = '$this->price' WHERE id = ' $this->id'";
            $stmt = mysqli_query($conn, $query);

        } else {
            $query = "INSERT INTO products (name,price) VALUES ('$this->name','$this->price')";
            $stmt = mysqli_query($conn, $query);
            
            $this->id = mysqli_insert_id($conn);
        }
    }

    public function delete($conn) {
        $query = "DELETE FROM products WHERE id = '$this->id' ";
        $stmt = mysqli_query($conn, $query);
       
    }
}