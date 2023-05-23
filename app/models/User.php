<?php
namespace App\Models;
class User extends Model {
    private $name;
    private $email;
    private $type;


    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }
    public function getType() {
        return $this->type;
    }

    public function setType($type) {
        $this->type = $type;
    }

    public static function getAll($conn) {
        $query = "SELECT * FROM users";
        $result = mysqli_query($conn, $query);
        $users = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $user = new User();
            $user->id = $row['id'];
            $user->setName($row['name']);
            $user->setEmail($row['email']);
            $users[] = $user;
        }
        return $users;
    }

    public static function getById($conn,$id) {
        $query = "SELECT * FROM users WHERE id = $id";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);
        $user = new User();
        $user->id = $row['id'];
        $user->setName($row['name']);
        $user->setEmail($row['email']);
        return $user;
    }

    public function save($conn) {
        if ($this->id) {
            $query = "UPDATE users SET name = '$this->name', email = '$this->email' WHERE id = ' $this->id'";
            $stmt = mysqli_query($conn, $query);

        } else {
            $query = "INSERT INTO users (name, email,type) VALUES ('$this->name','$this->email','user')";
            $stmt = mysqli_query($conn, $query);
            
            $this->id = mysqli_insert_id($conn);
        }
    }

    
    public function delete($conn) {
        $query = "DELETE FROM users WHERE id = '$this->id' ";
        $stmt = mysqli_query($conn, $query);
       
    }
    public static function log_in($conn,$name,$email){

        $query="SELECT * FROM users WHERE name='$name' AND email='$email' ";
        $result=mysqli_query($conn,$query);
        if($row = mysqli_fetch_assoc($result))
      {  $user = new User();
        // $user->id = $row['id'];
    //     $user->setName($row['name']);
    //     $user->setEmail($row['email']);
    //     $user=compact('user');
        // $_SESSION['name']=$user['name'];
        // $_SESSION['email']=$user['email'];
        // $_SESSION['id']=$user['id'];
        // $_SESSION['type']=$user['type'];
          $_SESSION['name']=$row['name'];
        $_SESSION['email']=$row['email'];
        $_SESSION['id']=$row['id'];
        $_SESSION['type']=$row['type'];

        return true; }
        else{return false;}
                
        
}
public  function checked($conn,$name,$email)
{
    $query="SELECT * FROM users WHERE name='$name' AND  email='$email' ";
    $result=mysqli_query($conn,$query);
    $user=mysqli_fetch_assoc($result);
   if($user)
   {
    return true;
   }   
   else 
   return false;

}

}