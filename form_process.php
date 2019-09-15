<?php
session_start();
require('connect.php');

$errors = array();
$allowed_e = array('png', 'jpg', 'jpeg');

$file_name = $_FILES['image']['name'];
$file_e = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
$file_s = $_FILES['image']['size'];
$file_tmp = $_FILES['image']['tmp_name'];
            
            if(in_array($file_e, $allowed_e) === false){
                $errors[] = 'This file extension is not allowed.';
            }
            if ($file_s > 2097152){
                $errors[] = 'File must be under 2mb';
            }
            if (empty($errors)){
                move_uploaded_file($file_tmp, 'images/'.$file_name);
                $image_up = 'images/' .$file_name;
          
              
            } 
   if (isset($_POST['submit'])){
       $classurl = $_POST['url'];
$poster = $_POST['poster'];
$class_id_ = $_GET['classid'];
$school_id = $_POST['school_id'];
       $post_title = $_POST['title'];
$description = $_POST['description'];
$date = date("y-m-d");
$category = $_POST['category'];
$anonymous = $_POST['anonymous'];
       if ($post_title && $category){
           if (strlen($post_title) >= 5 && strlen($post_title) <= 70){
               if ($anonymous){
                   $poster = $anonymous;
               }
               if ($query = mysqli_query($con, "INSERT INTO forum(`forum_id`, `class_id`, `title`, `content`, `creator`, `date_created`, `category`, `points`, `comments_id`, `comments_username`, `comments_datetime`, `comments_parent`, `file_path`) VALUES ('','".$class_id_."','".$post_title."','".$description."','".$poster."','".$date."','".$category."','','','','','','".$image_up."')")){
                   echo "<script>location.replace('class.php?school=$school_id&class=$classurl');</script>";
               } else {
                   echo "Failure";
               }
           } else {
               echo "Topic name must be between 5 and 70 characters long";
           }
       } else {
           echo "Please fill in all the fields";
       }
   }
?>