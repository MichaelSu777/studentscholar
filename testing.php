<?php
session_start();
    require("connect.php");
    if ($_SESSION["username"]){
    $username = $_SESSION["username"];
    $search = $_REQUEST["q"];

    $check_u = mysqli_query($con, "SELECT * FROM users WHERE email='".$username."'");
        $check_d = mysqli_query($con, $sql = "SELECT * FROM `classes`");
        $check_s = mysqli_query($con, $sql = "SELECT * FROM `schools`");
    while ($row_s = mysqli_fetch_assoc($check_s)){
        $name = $row_s['name'];
        $short = $row_s['short_name'];
        $location = $row_s['location'];
        $shrt_name= $row_d['short_name'];
    }

     while ($row_d = mysqli_fetch_assoc($check_d)){
        $school = $row_d['school_name'];
        $class = $row_d['name'];
        $teacher = $row_d['id'];
        $school_id = $row_d['school_id'];
        
    }
    while ($row_u = mysqli_fetch_assoc($check_u)){
        $fname = $row_u['fname'];
        $lname = $row_u['lname'];
        $uname = $row_u['username'];
        $grade = $row_u['grade'];
    }
     $check_classes = mysqli_query($con, $sql = "SELECT * FROM `users` WHERE school_id='".$school_id."'");
        $num_school_classes = mysqli_num_rows($check_classes);
            $checkschools = mysqli_query($con, "SELECT * FROM `schools` WHERE name LIKE '%".$search."%' OR short_name LIKE '%".$shrt_name."%'");//gets class entry in database

 while ($school_data = mysqli_fetch_assoc($checkschools)){
        $school_id = $school_data['id'];
        $school_name = $school_data['name'];
        $short_name = $school_data['short_name'];
        $school_location = $school_data['location'];
        $school_description = $school_data['school_description'];
        
 }
// Output "no suggestion" if no hint was found or output correct values 
$checkclasses = mysqli_query($con, "SELECT * FROM `classes` WHERE name LIKE '%".$search."%'");//gets class entry in database

     $check_classes = mysqli_query($con, "SELECT * FROM `classes` WHERE school_id='".$school_id."'");
    while ($checking_classes = mysqli_fetch_assoc($check_classes)){
       
    }
    while ($test = mysqli_fetch_assoc($checkclasses)){
        $id=$test['id'];
        $class_school_id = $test['school_id'];
        $clas = $test['class_type'];
        $class = $test['name'];
        $bio = $test['bio'];
        $teachername = ucwords(str_replace("_", "", strstr($clas, '_'))); //remove everything behind _, then replace _ with nothing, then capitalize ucwords    
         if ($class_school_id == $school_id){
      
        }
        $checkschools2 = mysqli_query($con, "SELECT * FROM `schools` WHERE id='".$class_school_id."'");//gets class entry in database
        while ($checking2 = mysqli_fetch_assoc($checkschools2)){
             $school_id_checked = $checking2['id'];
        $school_name_checked = $checking2['name'];
        $short_name_checked = $checking2['short_name'];
        $school_location_checked = $checking2['location'];
        $school_description_checked = $checking2['school_description'];
        }
    }
    echo $class ;
    }

?>
