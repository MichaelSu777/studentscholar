<?php require('connect.php'); ?>
  <?php
    $fname = $_POST['FirstName'];
    $lname = $_POST['LastName'];
    $password = $_POST['Password'];
    $email = $_POST['Email'];
  $pass_en = sha1($password);
    if (isset($_POST['submit'])){
        if($fname && $lname && $password && $email){
            if (strlen($password) >= 6){
                if($password){
                      if($query = mysqli_query("INSERT INTO users (`id`, `email`, `password`, `icon`, `fname`, `lname`) VALUES ('', '".$email."', '".$pass_en."', '', '".$fname."', '".$lname."')")){
                         echo "You have been registered as $username. Click <a href='login.php'>here</a> to login";
                     } else {
                         echo "Failure";
                     }
                } else {
                    
                }
            } else {
                if (strlen($password) < 6){
                    echo "The password must be at least 6 characters long.";
                }
                
            }
        }else {
            echo "Please fill in all the fields";
        }
   
    }
?>