<?php 
namespace App\Models;
class Course extends Model
{
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
        public  function save($conn){
            if ($this->id) {
                $query = "UPDATE courses SET name = '$this->name', price = '$this->price' WHERE id = ' $this->id'";
                $stmt = mysqli_query($conn, $query);
    
            } else {
                $query = "INSERT INTO courses (name,price) VALUES ('$this->name','$this->price')";
                $stmt = mysqli_query($conn, $query);
                
                $this->id = mysqli_insert_id($conn);
            }
        }
        public function delete($conn){
            $query = "DELETE FROM courses WHERE id = '$this->id' ";
            $stmt = mysqli_query($conn, $query);
        }
        public static function getAll($conn) {
            $query = "SELECT * FROM courses";
            $result = mysqli_query($conn, $query);
            $courses = array();
            while ($row = mysqli_fetch_assoc($result)) {
                $course = new Course();
                $course->id = $row['id'];
                $course->setName($row['name']);
                $course->setPrice($row['price']);
                $courses[] = $course;
            }
            return $courses;
        }
        public static function getById($conn, $id)
        { $query="SELECT * FROM courses WHERE id='$id'";
            $result=mysqli_query($conn,$query);
            while ($row = mysqli_fetch_assoc($result)) {
                $course = new Course();
                $course->id = $row['id'];
                $course->setName($row['name']);
                $course->setPrice($row['price']);
                return $course;
        }
    
}
}