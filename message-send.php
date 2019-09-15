<?php
session_start();
require('connect.php');

       
$name = $_POST['name'];
$user = $_POST['user'];
$class_id = $_POST['class_id'];
 $fname = $_POST['fname'];
 $lname = $_POST['lname'];
$date = date("y-m-d");

               if ($query = mysqli_query($con, "INSERT INTO message(`id`, `class_id`, `fname`, `lname`, `content`, `sender`, `time`) VALUES ('','".$class_id."', '".$fname."', '".$lname."', '".$name."','".$user."','".$date."')")){
                   //echo "<script>location.replace('class.php?school=$school_id&class=$classurl');</script>";
         


                  // echo "Failure";
               }
  
//echo $name . $user. $class_d;
?>