<?php
namespace App\Controllers;
require_once 'BaseController.php';
require_once __DIR__ . '/../models/User.php';
use App\Models\User;

class UserController extends BaseController {
    public function index() {
        $users = User::getAll($this->conn);
        $this->render('user/index', compact('users'));
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user = new User();
            $user->setName($_POST['name']);
            $user->setEmail($_POST['email']);
            $user->save($this->conn);
            header('Location: /darrebni/new-mvc/?action=users');
            exit;
        } else {
            $this->render('user/create');
        }
    }

    public function edit() {
        $id = $_GET['id'];
        $user = User::getById($this->conn, $id);
        $this->render('user/edit', compact('user'));
    }

    public function update() {
        $id = $_POST['id'];
        $user = User::getById($this->conn, $id);
        $user->setName($_POST['name']);
        $user->setEmail($_POST['email']);
        $user->save($this->conn);
        header('Location: /darrebni/new-mvc/?action=users');
        exit;
    }

    public function delete() {
        $id = $_POST['id'];
        $user = User::getById($this->conn, $id);
        $user->delete($this->conn);
        header('Location: /darrebni/new-mvc/?action=users');
        exit;
    }

    public function log_in()
    {if ($_SERVER['REQUEST_METHOD'] === 'POST')
        {  
            $name=$_POST['name'];
            $email=$_POST['email'];
           $user= User::log_in($this->conn,$name,$email);
        //    $user=compact('user');
        //     if($user){
        //         session_start();
        //         $_SESSION['name']=$user['name'];
        //         $_SESSION['email']=$user['email'];
        if($user){
            if($_SESSION['type']=='user')
              {   header('Location: /darrebni/new-mvc/?action=courses');
              }  
            elseif($_SESSION['type']=='admin') 
              {  header('Location: /darrebni/new-mvc/?action=users');}
                 
            else{
                $this->render('user/register');

            }

        if (isset($_POST['remember']))
          {   
        setcookie("user", $name, time() + (86400 * 30)); 
        setcookie("pass", $email, time() + (86400 * 30)); 
          }
          }

        
        }
    else {
        $this->render('user/register');
    }
    }
    public function register()
    {if ($_SERVER['REQUEST_METHOD'] === 'POST')
        {
            $user= new User();
            $user->setName($_POST['name']);
            $user->setEmail($_POST['email']);
            $check=$user->checked($this->conn,$user->getName(),$user->getEmail());
            if($check)
            {
                // echo"this email is used ";
                $this->render('user/log_in');

            }
            else{
                $user->save($this->conn);
                $this->render('user/log_in');

            }
        
        }
    else{
      $this->render('user/register');
    }
    }
    public  function log_out() {

    if (isset($_COOKIE["name"]) AND isset($_COOKIE["email"])){
       setcookie("name", '', time() - (86400 * 30));
       setcookie("email", '', time() - (86400 * 30));
      }
       header('Location:/darrebni/new-mvc/?action=log_in');
      }
    

    public function buy_course()
{ //      session_start();
        $user_id=$_SESSION['id'];
        $course_id=$_GET['id'];
        $query="INSERT INTO buy_course(course_id,user_id) VALUES('$course_id','$user_id')";
        $result=mysqli_query($this->conn,$query);
}
}