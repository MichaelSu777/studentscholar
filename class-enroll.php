<?php
session_start();
require('connect.php');


    if ($_SESSION["username"]){
$username = $_SESSION["username"];
 $GLOBALS['check_u'] = mysqli_query($con, "SELECT * FROM users WHERE email='".$username."'"); //gets the logged in user
    while ($row_u = mysqli_fetch_assoc($check_u)){
        $fname = $row_u['fname'];
        $lname = $row_u['lname'];
        $uname = $row_u['username'];
        $classes_id = $row_u['classes_id'];
        $email = $row_u['email'];
    }
   if (isset($_POST['submit'])){
       $poster = $_POST['poster'];
$class_code = $_POST['class-code'];
       $classurl = $_POST['url'];
        $class_id_ = $_POST['id'];
        $school_id = $_POST['school-id'];
            $GLOBALS['check_classes'] = mysqli_query($con, "SELECT * FROM classes WHERE id='".$class_id_."'"); 
  while ($check_classes_data = mysqli_fetch_assoc($check_classes)){
        $class_code_database = $check_classes_data['class_code'];
    }
        if($class_code == $class_code_database){
             if ($query = mysqli_query($con, "UPDATE users SET classes_id='".$classes_id . ','.$class_id_."' WHERE email='".$email."'" )){
           echo "<script>location.replace('class.php?school=$school_id&class=$classurl');</script>";
       } else {
           echo "Failure";
       }
        } else {
            echo "invalid";
        }
      
   }
    }
?>