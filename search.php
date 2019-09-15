
<?php
    session_start();
    require("connect.php");
    if ($_SESSION["username"]){
    $username = $_SESSION["username"];
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

?>
       <?php 
if(isset($_POST['searching']))
{
    $search = $_POST['search'];
    $schoolurl = $_GET['school'];//gets url
    
    $checkschools = mysqli_query($con, "SELECT * FROM `schools` WHERE name LIKE '%".$search."%' OR short_name LIKE '%".$shrt_name."%'");//gets class entry in database

   
}
?>
<!DOCTYPE html>

<html data-wf-domain="studentscholar.webflow.io" data-wf-page="5b61e953f40d76e6e3e51dca" data-wf-site="5b52d603ff2e004c39c15224" data-wf-status="1" class="w-mod-js w-mod-touch wf-poppins-n4-active wf-poppins-n5-active wf-poppins-n6-active wf-poppins-n7-active wf-poppins-n8-active wf-active">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Search Results: <?php echo $search; ?> - Student Scholar</title>
    <meta content="View the different classes and schools for your search of &quot;Example Search&quot;. View, join, or enroll in these classes and schools." name="description">
    <?php require 'studentscholar_files/head.php'; ?>
</head>

<body>
    <div class="body-div tall">
        <?php require 'studentscholar_files/header.php'; ?>
        <div class="section gradient-blue">
            <div class="container margin-no-top w-container">
                <div class="notification-class-title"><img src="./search_files/5b535ceaeadb587329b81bb7_icons8-search-128 (1).png" width="25">
                    <div class="bold margin-10l">Search Results for&nbsp;<strong class="color"><?php echo $search; ?></strong></div>
                </div>
                <?php
             while ($school_data = mysqli_fetch_assoc($checkschools)){
        $school_id = $school_data['id'];
        $school_name = $school_data['name'];
        $short_name = $school_data['short_name'];
        $school_location = $school_data['location'];
        $school_description = $school_data['school_description'];
               echo '
                
                                <div class="post-history-div-2">
                    <div class="post-history-title-div">
                        <div>School</div>
                        <div class="message-time red margin-5l">63 classes</div>
                        <div class="message-time margin-10l">210 Students</div>
                    </div>
                    <div class="post-history-title search">
                        <div class="flex-horleft vert-mob"><img src="./search_files/5b61f07ca5fc3aa8e8d0f98d_icons8-traditional-school-bus-64.png" width="25" class="margin-5ri">
                            <div class="semi-bold">'.$school_name.'</div>
                            <div class="subtitle margin-5l">'.$short_name.'</div>
                        </div><a href="#" class="button search w-button">Enrolled</a></div>
                    <p class="margin-5b">'.$school_description.'</p>
                    <div class="post-history-footer-div search">
                        <div>'.$school_location.'</div>
                        <div class="color margin-10l">'.$school_name.'</div>
                    </div>
                </div>

        
        ';
    }

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

             echo '
                        <div class="post-history-div-2">
                    <div class="post-history-title-div">
                        <div>Class</div>
                        <div class="message-time red margin-5l">4 teachers</div>
                        <div class="message-time margin-10l">52 Students</div>
                    </div>
                    <div class="post-history-title search">
                        <div class="flex-horleft vert-mob"><img src="./search_files/5b61fd23509255a66e380751_icons8-chair-64.png" width="25" class="margin-5ri">
                            <div class="semi-bold">'.$class. ' '.$teachername.'</div>
                            <div class="subtitle margin-5l">'.$short_name_checked.'</div>
                        </div><a href="/class.php?school='.$school_id_checked.'&class='.$clas.'" class="button color enroll w-button">Join Class</a></div>
                    <p class="margin-5b">'.$bio.'</p>
                    <div class="post-history-footer-div search">
                        <div>'.$school_location_checked.'</div>
                        <div class="color margin-10l">'.$school_name_checked.'</div>
                    </div>
                </div>

        ';
        }
    
    }
    
        
                ?>
                
            </div>
        </div>
    </div>
    <?php require 'studentscholar_files/javascript.php'; ?>
</body>

</html>
<?php
     echo "<script>
     document.querySelector('.w-nav-menu').style.display = 'none';
     
     
     </script>";} else {
        echo "not logged in";
        echo "<script>
     document.querySelector('.w-nav-menu').style.display = 'block';
     
     
     </script>";
    }
?>