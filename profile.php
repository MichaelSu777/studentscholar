<?php
    session_start();
    require("connect.php");
    if ($_SESSION["username"]){
    $username = $_SESSION["username"];
    $check_u = mysqli_query($con, "SELECT * FROM users WHERE email='".$username."'");
        $check_d = mysqli_query($con, $sql = "SELECT * FROM `classes` LIMIT 0, 30 ");
        $check_s = mysqli_query($con, $sql = "SELECT * FROM `schools` LIMIT 0, 30 ");
    while ($row_s = mysqli_fetch_assoc($check_s)){
        $name = $row_s['name'];
        $short = $row_s['short_name'];
        $location = $row_s['location'];
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
<html data-wf-domain="studentscholar.webflow.io" data-wf-page="5b5eeb42e90d48778fa388d0" data-wf-site="5b52d603ff2e004c39c15224" data-wf-status="1" class="w-mod-js w-mod-touch wf-poppins-n4-active wf-poppins-n5-active wf-poppins-n6-active wf-poppins-n7-active wf-poppins-n8-active wf-active">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title><?php echo $fname . ' ' .$lname .' ('.$uname.')'?> - Student Scholar</title>
    <?php require 'studentscholar_files/head.php'; ?>
</head>

<body>
    <div class="body-div tall">
        <?php require 'studentscholar_files/header.php'; ?>
        <div class="section gradient-blue">
            <div class="container account w-container"><img src="./profile_files/5b52dbafe5d2a8e35f98ad0b_icons8-ping-pong-100.png" width="50">
                <div class="account-name-div">
                    <a href="profile.php"><h3 class="account-name"><?php echo $fname . ' ' . $lname; ?></h3>
                    <div>@<?php echo $uname; ?></div></a>
                </div>
                <a href="#" class="icon-button edit w-inline-block"><img src="./profile_files/5b5f662ad9b73f06c9b468f9_icons8-settings-64.png" width="32" height="32"></a>
                <div class="color margin-30l mobile-no">
                    <h4 class="account-name">Position</h4>
                    <div class="semi-bold">Admin</div>
                </div>
                <a href="school.php?school=<?php echo $school_id; ?>"><div class="margin-30l mobile-no">
                    <h4 class="account-name">Panther Creek High School</h4></a>
                    <?php
                        if ($num_school_classes == 1){
                            echo ' <div class="semi-bold">'.$num_school_classes. ' class | 31 posts</div>
                            
                            ';
                        } else {
                             ' <div class="semi-bold">'.$num_school_classes. ' classes | 31 posts</div>';

                        }
                    ?>
                </div>
                <div class="margin-30l mobile-no">
                    <h4 class="account-name">Grade</h4>
                    <div class="semi-bold"><?php echo $grade; ?></div>
                </div>
            </div>
            <!--<div class="container no-padding-bot w-container">
                <div class="notification-class-title trophy"><img src="./profile_files/5b60987062612672dfc358ef_icons8-trophy-64.png" width="25">
                    <div class="margin-10l"><strong>Trophies</strong></div>
                    <div class="trophy-div">
                        <div class="trophy-indiv-div"><img src="./profile_files/5b6097d1a351717bf52f8ba7_icons8-leaderboard-64.png" width="32">
                            <div class="margin-5l">Pioneer</div>
                        </div>
                        <div class="trophy-indiv-div"><img src="./profile_files/5b609ee896a939319aa7996c_icons8-health-calendar-64.png" width="32">
                            <div class="margin-5l">1 Year Club</div>
                        </div>
                    </div>
                </div>
            </div>-->
            <div class="container account-notif w-container"><img src="./profile_files/5b5e7ddee90d4808d9a342d3_icons8-communication-64.png" width="50">
                <h4>Messaging</h4><a href="#" data-w-id="2e8bbe59-3214-07e0-fd26-d2592b349bab" class="button account w-button">Chrome Notifications</a><a href="#" data-w-id="35c2c6a5-c3c6-2dff-34ca-afa01aba7a1f" class="button account margin-15l w-button">Home Page Notifications</a></div>
            <div class="container account-notif w-container"><img src="./profile_files/5b54faafeadb5848d0b8fa50_icons8-working-with-papers-64.png" width="50">
                <h4 class="margin-15l flex-stretch">Calculus BC</h4><a href="#" data-w-id="f14dffbf-7a91-10dd-f345-11b902f6ce6a" class="button account margin-15l w-button">Chrome Notifications</a><a href="#" data-w-id="f14dffbf-7a91-10dd-f345-11b902f6ce6c" class="button account margin-15l w-button">Home Page Notifications</a></div>
            <div class="container account-notif w-container"><img src="./profile_files/5b54faafeadb5848d0b8fa50_icons8-working-with-papers-64.png" width="50">
                <h4 class="margin-15l flex-stretch">Computer Science</h4><a href="#" data-w-id="5aabda68-6a45-739a-81d0-f771b2adaf2c" class="button account margin-15l w-button">Chrome Notifications</a><a href="#" data-w-id="5aabda68-6a45-739a-81d0-f771b2adaf2e" class="button account margin-15l w-button">Home Page Notifications</a></div>
            <div class="container account-notif w-container"><img src="./profile_files/5b54faafeadb5848d0b8fa50_icons8-working-with-papers-64.png" width="50">
                <h4 class="margin-15l flex-stretch">United States History</h4><a href="#" data-w-id="7f7dd2bd-d2a1-a32d-b81e-4149852b27f5" class="button account margin-15l w-button">Chrome Notifications</a><a href="#" data-w-id="7f7dd2bd-d2a1-a32d-b81e-4149852b27f7" class="button account margin-15l w-button">Home Page Notifications</a></div>
            <div class="container account-notif w-container"><img src="./profile_files/5b54faafeadb5848d0b8fa50_icons8-working-with-papers-64.png" width="50">
                <h4 class="margin-15l flex-stretch">Computer Science Principles</h4><a href="#" data-w-id="9ac41b35-b076-5b67-2aac-07b0707d7f56" class="button account margin-15l w-button">Chrome Notifications</a><a href="#" data-w-id="9ac41b35-b076-5b67-2aac-07b0707d7f58" class="button account margin-15l w-button">Home Page Notifications</a></div>
            <div class="container w-container">
                <div class="notification-class-title"><img src="./profile_files/5b5e7def2461b302e85cc7b4_icons8-news-64.png" width="25">
                    <div class="margin-10l"><strong>Post History</strong></div>
                </div>
                

             
                <div class="post-history-div-2">
                    <div class="post-history-title-div">
                        <div>United States History</div>
                        <div class="message-time red margin-5l">-2 points</div>
                        <div class="message-time margin-10l">3:51 Am</div>
                    </div>
                    <div class="post-history-title"><img src="./profile_files/5b5ead84e90d48a043a35a77_icons8-attach-64.png" width="25" class="margin-5ri opacity-0">
                        <div class="semi-bold">It's 4 AM, why am I awake?</div>
                        <div class="subtitle margin-5l">Question</div>
                    </div>
                    <p class="margin-5b"> I spent the whole night studying</p>
                    <div class="post-history-footer-div">
                        <div>2 Comments</div>
                    </div>
                </div>
                <div class="post-history-div-2">
                    <div class="post-history-title-div">
                        <div>United States History</div>
                        <div class="message-time red margin-5l">17 points</div>
                        <div class="message-time margin-10l">5:58 Am</div>
                    </div>
                    <div class="post-history-title"><img src="./profile_files/5b5ead84e90d48a043a35a77_icons8-attach-64.png" width="25" class="margin-5ri">
                        <div class="semi-bold">Here's everything you need to know for reading quiz</div>
                        <div class="subtitle margin-5l">Helpful</div>
                    </div>
                    <p class="margin-5b">George Washington (1732-99) was commander in chief of the Continental Army during the American Revolutionary War (1775-83) and served two terms as the first U.S. president, from 1789 to 1797. The son of a prosperous planter, Washington was raised in colonial Virginia.</p>
                    <div class="post-history-footer-div">
                        <div>8 Comments</div>
                    </div>
                </div>
                <div class="post-history-div-2">
                    <div class="post-history-title-div">
                        <div>Computer Science Principles</div>
                        <div class="margin-10l">Chudasama</div>
                        <div class="message-time red margin-5l">30 points</div>
                        <div class="message-time margin-10l">5:58 Am</div>
                    </div>
                    <div class="post-history-title"><img src="./profile_files/5b5ead84e90d48a043a35a77_icons8-attach-64.png" width="25" class="margin-5ri opacity-0">
                        <div class="semi-bold">Surviv.io code</div>
                        <div class="subtitle margin-5l">Tips and Tricks</div>
                    </div>
                    <p class="margin-5b">http://surviv.io/#HAr0</p>
                    <div class="post-history-footer-div">
                        <div>1 Comments</div>
                    </div>
                </div>
            </div>
            <div class="container w-container">
                <div class="notification-class-title"><img src="./profile_files/5b61fd23509255a66e380751_icons8-chair-64.png" width="25">
                    <div class="margin-10l"><strong>Classes</strong></div>
                </div>
                <div class="user-class-div">
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

                            for ($i = 0; $i < $unique_id_array_length + 1; $i++){
                                $check_classes = mysqli_query($con, "SELECT * FROM `classes` WHERE id LIKE '".$unique_id_array[$i]."'");
                                while ($class_data = mysqli_fetch_assoc($check_classes)){
                                    $classname = $class_data['name'];
                                      $school_id = $class_data['school_id'];
                                    $class_url =  $class_data['class_type'];
                                  
                                    echo '
                                        <div>
                                            <div class="admin margin-10l">'.$position.'</div>
                                            <h4 class="user-class-link"><a href="/class.php?school='.$school_id.'&class='.$class_url.'" class="link">'.$classname.'</a></h4>
                                        </div>';
                                    }

                               
                            } 
                           
                    ?>
                    
                </div>
            </div>
            <div class="container w-container">
                <div class="notification-class-title"><img src="./profile_files/5b64ab50c899f50620b744a0_icons8-sport-badge-64.png" width="25">
                    <div class="margin-10l"><strong>Clubs</strong></div>
                </div>
                <div class="user-class-div">
                    <div>
                        <div class="admin margin-10l">Admin</div>
                        <h4 class="user-class-link"><a href="#" class="link">Chess Club</a></h4></div>
                    <div>
                        <h4 class="user-class-link"><a href="#" class="link">Key Club</a></h4></div>
                    <div>
                        <h4 class="user-class-link">TSA</h4></div>
                    <div>
                        <h4 class="user-class-link"><a href="#" class="link">Science Club</a></h4></div>
                    <div>
                        <div class="admin margin-10l">Admin</div>
                        <h4 class="user-class-link"><a href="#" class="link">Web Design Club</a></h4></div>
                </div>
            </div>
        </div>
    </div>
    <script src="./profile_files/jquery-3.3.1.min.js.download" type="text/javascript" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="./profile_files/webflow.35742d8f7.js.download" type="text/javascript"></script>
    <!--[if lte IE 9]><script src="//cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif]-->

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