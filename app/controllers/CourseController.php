<?php 
namespace App\Controllers;
require_once 'BaseController.php';
require_once __DIR__ . '/../models/Course.php';
require_once __DIR__ . '/../models/Model.php';
use App\Models\Course;
class CourseController extends BaseController{
    public function index() {
        // if($_SESSION['type']=='user'){
            $courses = Course::getAll($this->conn);
            $this->render('course/index', compact('courses'));
        // }
        // else{
        //     $courses = Course::getAll($this->conn);
        //     $this->render('course/index2', compact('courses'));
        // }
       
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $course = new Course();
            $course->setName($_POST['name']);
            $course->setPrice($_POST['price']);
            $course->save($this->conn);
            header('Location: /darrebni/new-mvc/?action=courses');
            exit;
        } else {
            $this->render('course/create');
        }
    }
 public function delete() {
    $id = $_POST['id'];
    $course = Course::getById($this->conn, $id);
    $course->delete($this->conn);
    header('Location: /darrebni/new-mvc/?action=courses');
    exit;
}
    
 }
