<?php
$con = mysqli_connect("localhost","root","","users");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>

<?php
if (isset($_POST['submit'])){
    $username = $_POST['username'];
    $bio = $_POST['bio'];
  
        if($username){
    echo 'test';
    }else {
        echo "Please fill in all the fields";
    }

}
?>