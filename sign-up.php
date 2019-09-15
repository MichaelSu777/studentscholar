<?php
require('connect.php');
?>
<!DOCTYPE html>
<!-- saved from url=(0043)http://studentscholar.webflow.io/login/page -->
<html data-wf-domain="studentscholar.webflow.io" data-wf-page="5b6656e4dc6fa86afb121418" data-wf-site="5b52d603ff2e004c39c15224" data-wf-status="1" class="w-mod-js w-mod-touch wf-poppins-n4-active wf-poppins-n5-active wf-poppins-n6-active wf-poppins-n7-active wf-poppins-n8-active wf-active">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Create an Account - Student Scholar</title>
        <meta name="google-signin-scope" content="profile email">
    <meta name="google-signin-client_id" content="113236466841-pibkvm2jeh03d9p21k2ch3obc27g19lu.apps.googleusercontent.com">
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <meta content="Welcome to the community! Create and customize your account here, then pick your school and connect with your peers." name="description">
    <?php require 'studentscholar_files/head.php'; ?>
</head>

<body>
    <div class="body-div">
    <?php require 'studentscholar_files/header.php'; ?>

        <div class="section color-change">
            <div data-w-id="6ae78d46-6d4c-8f1a-f19b-7a0730d8fec4" class="form-1-container w-container">
                <div class="flex-horcent portrait w-row">
                    <div class="w-col w-col-6">
                        <h1 class="home-title about">Create an account<strong class="color"></strong></h1>
                        <p class="paragraph">Connect with ease for free</p>
                    </div>
                    <div class="w-col w-col-6">
                        <a class="w-inline-block"></a>
                                                <div class="g-signin2" data-onsuccess="onSignIn" data-theme="dark"></div>

                        <div class="message-date-div">
                            <div class="message-date-line"></div>
                            <div class="message-date">OR</div>
                            <div class="message-date-line"></div>
                        </div>
                        <div class="margin-10t">
                        <form action="sign-up.php" method="post">
                            <div class="flex-horcent">
                                <div class="flex-stretch">
                                    <input type="text" class="input standard w-input" maxlength="256" name="FirstName" data-name="Field 5" placeholder="First Name" id="field-5" required="">
                                </div>
                                <div class="flex-stretch margin-10l">
                                    <input type="text" class="input standard w-input" maxlength="256" name="LastName" data-name="Field 6" placeholder="Last Name" id="field-6" required="">
                                </div>
                            </div>
                            <input type="text" class="input standard w-input" maxlength="256" name="Email" data-name="Field 3" placeholder="Email" id="field-3" required="">
                            <input type="password" class="input standard w-input" maxlength="256" name="Password" data-name="Field 4" placeholder="Password" id="field-4" required="">
                            <div class="flex-horleft"><button  type="submit" name="submit" class="button color verse w-button">Submit</button>
                                <div class="margin-15l"><a href="#log-in">Already have an account?</a></div>
                            </div>
    </form>
                        </div>
                    </div>
                </div>
            </div>
    
  
          
        <div data-w-id="8a102773-a860-49bf-7533-dffb17510781" class="blue-transition"></div>
        <div data-w-id="eb46d400-2f64-67d0-d19d-9b4d63a5b5cf" class="white-transition"></div>
    </div>
    <?php
   
    if (isset($_POST['submit'])){
        $fname = $_POST['FirstName'];
        $lname = $_POST['LastName'];
        $password = $_POST['Password'];
        $email = $_POST['Email'];
        $a = array();
        $username;
        $bio;
      $pass_en = sha1($password);
        if($fname && $lname && $password && $email){
            if (strlen($password) >= 6){
                if($password){
                  if($query = mysqli_query($con, "INSERT INTO users (`id`, `username`, `fname`, `lname`, `email`, `password`, `school_id`, `classes_id`, `icon`, `grade`, `color1`, `color2`, `position`) VALUES ('', '', '".$fname."', '".$lname."', '".$email."','".$pass_en."', '', '', '', '', '', '', '' )")){                      echo "You have been successfully registered. Click <a href='login.php'>here</a> to <a href='login.php'>login</a>";
                  } else {
                      echo "there was an issue with you registration";
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
    <?php require 'studentscholar_files/javascript.php'; ?>
    <script>
     document.querySelector('.icon-button').style.display = 'none';
     document.querySelector('.margin-15l').style.display = 'none';
     document.querySelector('.nav-user').style.display = 'none';

     
     </script>
</body>

</html>