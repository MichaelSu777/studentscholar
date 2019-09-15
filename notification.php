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
<!DOCTYPE html>
<html data-wf-domain="studentscholar.webflow.io" data-wf-page="5ba83e2cf49b772246f0ff4f" data-wf-site="5b52d603ff2e004c39c15224" data-wf-status="1" class="w-mod-js w-mod-touch wf-poppins-n4-active wf-poppins-n5-active wf-poppins-n6-active wf-poppins-n7-active wf-poppins-n8-active wf-active">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Student Scholar</title>
    <?php require 'studentscholar_files/head.php'; ?>
</head>

<body>
    <div class="body-div tall">
        <?php require('studentscholar_files/header.php') ?>
        <div class="section gradient-blue">
            <div class="container notif w-container">
                <div class="notification-class-title"><img src="./notification_files/5b5ef0392461b343595d2066_icons8-jingle-bell-64.png" width="25">
                    <div class="margin-10l"><strong>Notifications</strong></div>
                </div>
                <?php
                    
                     $checkclasses = mysqli_query($con, "SELECT * FROM `users`");//gets class entry in database
                            while ($school_data = mysqli_fetch_assoc($checkclasses)){
                                $id = $school_data['classes_id'];
                                $position = $school_data['position'];
                                
                            }
                            //start of code that turns classes_id string into array
                            $id_array = explode(",",$id);
                            $unique_id_array = array_unique($id_array); //removes duplicates
                            $unique_id_array_length = count($unique_id_array);
 $forumQuery = mysqli_query($con, "SELECT * FROM `forum`"); //$forumQuery
 while ($forumdata = mysqli_fetch_assoc($forumQuery)){
                    $forum_post_title = $forumdata['title'];
                    $forum_post_creator = $forumdata['creator'];
                    $forum_post_content = $forumdata['content'];
                    $forum_post_dateCreated = $forumdata['date_created'];
                    $forum_post_category = $forumdata['category'];
                    $forum_post_points = $forumdata['points'];
                    $forum_comments_id = $forumdata['comments_id'];
                    $forum_comments_username = $forumdata['comments_username'];
                    $forum_comment_datetime = $forumdata['comments_datetime'];
                    $forum_comments_replies = $forumdata['comments_reply'];
                    $forum_file_path = $forumdata['file_path'];
                    $comments_content = $forumdata['comments_content'];
                           
                            for ($i = 0; $i < $unique_id_array_length + 1; $i++){
                                
                                $check_classes = mysqli_query($con, "SELECT * FROM `classes` WHERE id LIKE '".$unique_id_array[$i]."'");
                             
                                while ($class_data = mysqli_fetch_assoc($check_classes)){
                                    $classname = $class_data['name'];
                                    $school_id = $class_data['school_id'];
                                    $class_url =  $class_data['class_type'];
                                     $id=$class_data['id'];

                                    $teachername = ucwords(str_replace("_", "", strstr($class_url, '_'))); //remove everything behind _, then replace _ with nothing, then capitalize ucwords    
                                  
                                                 echo '
                                                    <div class="post-history-div-3">
                    <div class="post-history-title-div _2"><img src="./notification_files/5ba91fe9f05e9e219eaf6756_icons8-discussion-forum-24.png" width="16" class="notif-image">
                        <a href="/class.php?school='.$school_id.'&class='.$class_url.'" class="color margin-10l">'.$classname. ' '.$teachername.'</a>
                        <div class="margin-10l">Forum</div>
                        <a href="/class.php?school='.$school_id.'&class='.$class_url.'" class="message-time light-blue margin-5l"><strong>"'.$forum_post_title.'"</strong></a>
                        <div class="flex-stretch"></div>
                        <div class="message-time"><a href="#" class="invis-mobile">Expand</a></div>
                    </div>
                    <div class="notif-div">
                        <p class="margin-15l _2"><strong class="semi-bold">'.$forum_post_creator. ': '.$forum_post_content.'</strong></p>
                        <div class="notif-time">'.$forum_post_dateCreated.'</div>
                    </div>
                    
                </div>
                

                                ';
                                    }

                               
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