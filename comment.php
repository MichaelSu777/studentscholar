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
       $post_title = $_POST['title'];
$description = $_POST['description'];
$date = date("y-m-d");
$category = $_POST['category'];
       $comment = $_POST['comment'];
$forum_id = $_POST['forum_id'];
$anonymous = $_POST['anonymous'];
$classurl = $_POST['url'];
$school_id = $_POST['school_id'];
$poster = $_POST['poster'];
$class_id_ = $_GET['classid'];
       if ($comment){
                          if ($query = mysqli_query($con, "UPDATE users SET classes_id='".$classes_id . ','.$class_id_."' WHERE email='".$email."'" )){

               if ($query = mysqli_query($con, "UPDATE forum SET comment_content='".$comment."', comments_datetime='".$date."', comments_username='".$poster."' WHERE forum_id='".$forum_id."'")){
                 //  $query = mysqli_query($con, "UPDATE forum SET (`forum_id`, `class_id`, `title`, `content`, `creator`, `date_created`, `category`, `points`, `comments_id`, `comments_username`, `comments_content`, `comments_datetime`, `comments_parent`, `file_path`) VALUES ('".$form_id."','".$class_id_."','".$post_title."','".$description."','".$poster."','".$date."','".$category."','','','','".$comment."','', '', ".$image_up."')")
              
                   echo "<script>location.replace('class.php?school=$school_id&class=$classurl');</script>";
               } else {
                   echo "Failure";
               }
           
       } else {
           echo "Please fill in all the fields";
       }
   }
?>