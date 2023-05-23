<?php
require_once 'config/database.php';
require_once 'app/controllers/ProductController.php';
require_once 'app/controllers/UserController.php';
require_once 'app/controllers/CourseController.php';

$product = new App\Controllers\ProductController($conn);
$controller= new App\Controllers\UserController($conn);
$course = new App\Controllers\CourseController($conn);

$action = isset($_GET['action']) ? $_GET['action'] : 'register';
session_start();
switch ($action) {
    case 'products':
        $product->index();
        break;
    case 'create_product':
        $product->create();
        break;
    case 'edit_product':
        $product->edit();
        break;
    case 'update_product':
        $product->update();
        break;
    case 'delete_product':
        $product->delete();
        break;
     case 'users':
         $controller->index();
         $course->index();
        break;
    case 'create_user':
        $controller->create();
        break;
    case 'edit_user':
        $controller->edit();
        break;
    case 'update_user':
         $controller->update();
        break;
    case 'delete_user':
         $controller->delete();
        break; 
    case 'register':
        $controller->register();
        break;
    case 'log_in':
        $controller->log_in();
        break;    
    case 'courses':
        $course->index();
        break;
    case 'create_course':
        $course->create();
        break;      
    case 'buy_course':
        $controller->buy_course();
        break; 
    case 'log_out':
        $controller->log_out();
    case 'delete_course' :
        $course->delete();            
    default:
        $controller->index();
        
}