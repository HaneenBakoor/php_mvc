<?php
namespace App\Controllers;
require_once 'BaseController.php';
require_once __DIR__ . '/../models/Model.php';
use App\Models\Product;

class ProductController extends BaseController {
    public function index() {
        $products = Product::getAll($this->conn);
        $this->render('product/index', compact('products'));
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $product = new Product();
            $product->setName($_POST['name']);
            $product->setPrice($_POST['price']);
            $product->save($this->conn);
            header('Location: /darrebni/new-mvc/?action=products');
            exit;
        } else {
            $this->render('product/create');
        }
    }

    public function edit() {
        $id = $_GET['id'];
        $product = Product::getById($this->conn, $id);
        $this->render('product/edit', compact('product'));
    }

    public function update() {
        $id = $_GET['id'];
        $product = Product::getById($this->conn, $id);
        $product->setName($_POST['name']);
        $product->setPrice($_POST['price']);
        $product->save($this->conn);
        header('Location: /darrebni/new-mvc/?action=products');
        exit;
    }

    public function delete() {
        
            if(isset($_POST['delete']))
            { $id = $_POST['id'];
            $product = Product::getById($this->conn, $id);
            $product->delete($this->conn);
            header('Location: /darrebni/new-mvc/?action=products');
             exit;}
            elseif(isset($_POST['notdelete']))
            {header('Location: /darrebni/new-mvc/?action=products');
            exit;}
            else{ $id = $_GET['id'];
            $product = Product::getById($this->conn, $id);
            $this->render('product/delete',compact('product'));}
       
    
    }
}