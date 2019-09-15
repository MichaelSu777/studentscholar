<?php
session_start();
require('connect.php');
$poster = $_POST['poster'];
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
       $classurl = $_POST['url'];
        $school_id = $_POST['id'];

       if ($query = mysqli_query($con, "UPDATE users SET school_id='".$school_id."' WHERE email='".$email."'" )){
           echo "<script>location.replace('school.php?school=$school_id');</script>";
       } else {
           echo "Failure";
       }
   }
    }
?>