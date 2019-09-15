<?php
session_start();
require('connect.php');
?>
<!DOCTYPE html>
<!-- saved from url=(0044)http://studentscholar.webflow.io/signup/page -->
<html data-wf-domain="studentscholar.webflow.io" data-wf-page="5b690f7a234a18455e1c513c" data-wf-site="5b52d603ff2e004c39c15224" data-wf-status="1" class="w-mod-js w-mod-touch wf-poppins-n4-active wf-poppins-n5-active wf-poppins-n6-active wf-poppins-n7-active wf-poppins-n8-active wf-active">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Log in - Student Scholar</title>
    <meta content="Welcome back to Student Scholar. Type in your username and password or log-in with Google." name="description">
        <meta name="google-signin-scope" content="profile email">
    <meta name="google-signin-client_id" content="113236466841-pibkvm2jeh03d9p21k2ch3obc27g19lu.apps.googleusercontent.com">
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <?php require 'studentscholar_files/head.php'; ?>
       <script>
      function onSignIn(googleUser) {
        // Useful data for your client-side scripts:
        var profile = googleUser.getBasicProfile();
        console.log("ID: " + profile.getId()); // Don't send this directly to your server!
        console.log('Full Name: ' + profile.getName());
        console.log('Given Name: ' + profile.getGivenName());
        console.log('Family Name: ' + profile.getFamilyName());
        console.log("Image URL: " + profile.getImageUrl());
        console.log("Email: " + profile.getEmail());

        // The ID token you need to pass to your backend:
        var id_token = googleUser.getAuthResponse().id_token;
        console.log("ID Token: " + id_token);
      };
    </script>
</head>

<body>
    <div class="body-div">
    <?php require 'studentscholar_files/header.php'; ?>

        <div class="section about gradient-blue">
            <div class="form-1-container w-container">
                <div class="flex-horcent portrait w-row">
                    <div class="w-col w-col-6">
                        <h1 class="home-title about">Log In<strong class="color"></strong></h1>
                        <p class="paragraph">Welcome back to Student Scholar</p>
                    </div>
                    <div class="w-col w-col-6">
                        <a href="http://studentscholar.webflow.io/signup/page#" class="w-inline-block"></a>
                        <div class="g-signin2" data-onsuccess="onSignIn" data-theme="dark"></div>

                        <div class="message-date-div">
                            
                            <div class="message-date-line"></div>
                            <div class="message-date">OR</div>
                            <div class="message-date-line"></div>
                        </div>
                        <div class="margin-10t w-form">
                            <form action="login.php" method="post" id="email-form" name="email-form" data-name="Email Form" data-redirect="/lhome-log-in" redirect="/lhome-log-in">
                                <input type="text" class="input standard w-input" maxlength="256" name="Username" data-name="Username" placeholder="Email" id="Username" required="">
                                <input type="password" class="input standard w-input" maxlength="256" name="Password" data-name="Email 2" placeholder="Password" id="email-2" required="">
                                <div class="flex-horleft">
                                    <input type="submit" value="Submit" name="submit" data-wait="Please wait..." data-w-id="23e33733-0323-a717-fef8-3858e9cc973a" class="button color verse w-button">
                                    <div class="margin-15l"><a href="sign-up.php" data-w-id="23e33733-0323-a717-fef8-3858e9cc973c">Don't have an account?</a></div>
                                </div>
                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php require 'studentscholar_files/javascript.php'; ?>
    <!--[if lte IE 9]><script src="//cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif]-->
<script>
     document.querySelector('.icon-button').style.display = 'none';
     document.querySelector('.margin-15l').style.display = 'none';
     document.querySelector('.nav-user').style.display = 'none';

     
     </script>
</body>

</html>
<?php
session_start();

  $username = $_POST['Username'];
  $password = $_POST['Password'];
  
  if(isset($_POST['submit'])){
      if ($username && $password){
          $check = mysqli_query($con, "SELECT * FROM users WHERE email='".$username."'");
          $rows = mysqli_num_rows($check);
          if ($rows != 0){
              while($row = mysqli_fetch_assoc($check)){
                  $db_username = $row['email'];
                  $db_password = $row['password'];
              }
              if ($username == $db_username && sha1($password) == $db_password){
                  $_SESSION["username"] = $username;
                  
                  echo "<script> location.replace('dashboard.php'); </script>";
              } else {
                  echo "Your password is wrong";
              }
          } else {
              die("Couldn't find user");
          }
      } else {
          echo "Please fill in all the fields";
      }
  }
?>