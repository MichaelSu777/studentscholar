<?php
    session_start(); //begins user session via c o o k i e s
    require("connect.php"); // connects to database
 
    if ($_SESSION["username"]){ //if user session = username then go to the page. else break
    $username = $_SESSION["username"]; // set variable to the session when user session is confirmed
            $category_sort = $_GET['category'];

    $classurl = $_GET['class'];//gets url
  
    $checkclasses = mysqli_query($con, "SELECT * FROM `classes` WHERE class_type='".$classurl."'");//gets class entry in database
    $schoolurl = $_GET['school'];//gets url
    $checkschools = mysqli_query($con, "SELECT * FROM `schools` WHERE id='".$schoolurl."'");//gets class entry in database
    while ($school_data = mysqli_fetch_assoc($checkschools)){
        $school_id = $school_data['id'];
        
    }
    while ($test = mysqli_fetch_assoc($checkclasses)){
        $id=$test['id'];
        $class_school_id = $test['school_id'];
        $clas = $test['class_type'];
        $class = $test['name'];
        $teachername = ucwords(str_replace("_", "", strstr($clas, '_'))); //remove everything behind _, then replace _ with nothing, then capitalize ucwords    
    }
    
    if ($classurl == $clas && $classurl != null && $schoolurl == $school_id && $schoolurl > 0 && $class_school_id == $school_id || $classurl == $clas && $classurl != null && $schoolurl == $school_id && $schoolurl > 0 && $class_school_id == $school_id && $category_sort != null){ // checks for url (will change url format later)

    $GLOBALS['check_u'] = mysqli_query($con, "SELECT * FROM users WHERE email='".$username."'"); //gets the logged in user
    
    while ($row_u = mysqli_fetch_assoc($check_u)){
        $fname = $row_u['fname'];
        $lname = $row_u['lname'];
        $uname = $row_u['username'];
        $classes_id = $row_u['classes_id'];
        $email = $row_u['email'];
        $user_id = $row_u['id'];
        
    }


    $strid = strval($id);//converts id to string
    $strclasses_id = strval($classes_id);
    if (strpos($strclasses_id, $strid) === FALSE and $teachername != null){
            require 'studentscholar_files/head.php';

        echo '
           <div class="modal-div _3">
        <div class="container modal _3">
            <h3 class="center">Class Code Required</h3>
            <div class="center">In order to access '.$class.' - '.$teachername.', you need a class code. Contact the moderator of the class in order to get one.</div>
            <div class="margin-10t w-form">
                <form id="email-form" name="email-form" data-name="Email Form" action="class-enroll.php" method="post">
                <input type="hidden" name="id" value="'.$strid.'">
                                <input type="hidden" name="url" value="'.$classurl.'">
                                <input type="hidden" name="poster" value="'.$email.'">
                                <input type="hidden" name="school-id" value="'.$school_id.'">
                    <div class="margin-5b"><strong>Class Code</strong></div>
                    <input type="text" class="input standard w-input" maxlength="256" name="class-code" data-name="Username 2" placeholder="Enter Class Code" id="Username-2" required="">
                    <div class="console-text">Invalid email or password.</div>
                    <div class="flex-horleft">
                        <input type="submit" value="Submit" name="submit" data-w-id="a99ed3e8-dd2e-94ad-72c3-433a713e30bf" class="button color verse w-button">
                    </div>
                </form>

            </div>
            <a href="dashboard.php" class="cancel-div back w-inline-block"><img src="./code modal_files/5ba99c7615ee3219f3156315_icons8-go-back-48.png" width="24"></a>
        </div>
    </div>
        ';
    } else {
?>

<!DOCTYPE html>
<html data-wf-domain="studentscholar.webflow.io" data-wf-page="5b52d603ff2e002b96c15225" data-wf-site="5b52d603ff2e004c39c15224" data-wf-status="1" class="w-mod-js w-mod-touch wf-poppins-n4-active wf-poppins-n5-active wf-poppins-n6-active wf-poppins-n7-active wf-poppins-n8-active wf-active">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Student Scholar</title>

    <?php require 'studentscholar_files/head.php'; ?>
</head>

<body>
    <div class="body-div main">
    <?php require 'studentscholar_files/header.php'; ?>
        <div data-collapse="none" data-animation="default" data-duration="400" class="navbar class w-nav">
            <div class="class-nav-info">
                <?php 
                    $classurl = $_GET['class'];//gets url
                    $check_d = mysqli_query($con, $sql = "SELECT * FROM `classes` WHERE class_type='".$classurl."'");
                    
                    while ($row_d = mysqli_fetch_assoc($check_d)){
                        $school_id = $row_d['school_id']; //replace this with the school name from the school's database.
                        
                        $check_schools = mysqli_query($con, "SELECT * FROM `schools` WHERE id='".$school_id."'");
                        
                        while ($getschool = mysqli_fetch_assoc($check_schools)){
                            $school_short_name = $getschool['short_name'];
                        }
                        $class = $row_d['name'];
                        $teacherfinal = ucwords(str_replace("_", "", strstr($row_d['class_type'], '_'))); //remove everything behind _, then replace _ with nothing, then capitalize ucwords
                        
                        echo '  <div class="class-logo school mobile w-hidden-tiny">'.$school_short_name.'</div>
                                <div class="class-logo mobile">'.$class.'</div>
                                <div class="class-logo teacher margin-5l mobile w-hidden-tiny">'. $teacherfinal.'</div>';
                    }
                        
                ?>
            
            </div>
            <?php
            $checkclasses = mysqli_query($con, "SELECT * FROM `classes` WHERE class_type='".$classurl."'");//gets class entry in database
            $schoolurl = $_GET['school'];//gets url
            $checkschools = mysqli_query($con, "SELECT * FROM `schools` WHERE id='".$schoolurl."'");//gets class entry in database
            while ($school_data = mysqli_fetch_assoc($checkschools)){
                $school_id = $school_data['id'];
                
            }
            while ($test = mysqli_fetch_assoc($checkclasses)){
                $class_id=$test['id'];
                $class_school_id = $test['school_id'];
                $clas = $test['class_type'];
                $teachername = ucwords(str_replace("_", "", strstr($clas, '_'))); //remove everything behind _, then replace _ with nothing, then capitalize ucwords    
            }
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
                                $check_classes = mysqli_query($con, "SELECT * FROM `users` WHERE id LIKE '".$class_id."'");
                                while ($class_data = mysqli_fetch_assoc($check_classes)){
                                    
                                $num_students = mysqli_num_rows($check_classes);
                               
                            } 
                }
             
            ?>
            <div class="w-hidden-tiny"><strong><?php echo $num_students . ' '; ?> students</strong></div>
            <div class="class-nav-button-div margin-5l">
                <a href="#" data-w-id="09f51597-0d13-e391-4ad0-cc95bdf302db" class="icon-button mobile-tabs w-inline-block"><img src="./class_files/5b5e7def2461b302e85cc7b4_icons8-news-64.png" width="32" data-w-id="09f51597-0d13-e391-4ad0-cc95bdf302dc"><img src="./class_files/5b5e7ddee90d4808d9a342d3_icons8-communication-64.png" width="32" data-w-id="5d1bb173-f59a-7150-ad0d-fec335feee7f" class="mobiile-tab-image"></a>
                <a href="#" data-w-id="cf7c43f1-a69b-e894-f888-8065a96f3641" class="icon-button margin-10l w-inline-block"><img src="./class_files/5b52ed6245c6a398234a00b0_icons8-conference-128.png" width="32"></a>
                <a href="#" data-w-id="cf7c43f1-a69b-e894-f888-8065a96f3643" class="button flex-stretch margin-5l teacher w-inline-block">
                    <div class="invis-mobile">Teacher</div><img src="./class_files/5b6c8685b3323e6214ffee1c_icons8-businessman-64.png" width="32" class="teacher-image"><img src="./class_files/5b52ea43e5d2a8589d98b019_icons8-sort-down-filled-100.png" width="10" class="drop-down-image margin-5l">
                    <div class="nav-user-drop-down">
                        <?php 
                            $classurl = $_GET['class'];//gets url

                            $check_d = mysqli_query($con, $sql = "SELECT * FROM `classes`");
    
                            //Get's URL. After /school1
                            while ($row_d = mysqli_fetch_assoc($check_d)){
                                $school = $row_d['school_name']; //replace this with the school name from the school's database.
                                $class = $row_d['name'];
                                $teachercode = $row_d['class_type'];
                                $var =  strtok($teachercode, "_");
                                $classurlshrt =  strtok($classurl, "_");
                                $teacherfinal = ucwords(str_replace("_", "", strstr($row_d['class_type'], '_'))); //remove everything behind _, then replace _ with nothing, then capitalize ucwords
                                
                                if ($var == $classurlshrt && $teacherfinal != null){
                                    echo    
                                    "<script>
                                        function navigateUrl() {
                                            window.location.href='/class.php?class=$teachercode';
                                        }
                                    </script>";
                                    
                                    echo '
                                        <div class="nav-user-drop-down-item teacher" onclick="navigateUrl();" >
                                            <img src="./class_files/5b54faafeadb5848d0b8fa50_icons8-working-with-papers-64.png" width="32" class="w-hidden-medium w-hidden-small w-hidden-tiny">
                                            <div class="semi-bold teacher">'.$teacherfinal.'</div>
                                        </div>
                                        <div class="nav-user-drop-down-line"></div>';
                                } 
                            }
                        ?>
                    </div>
                </a>
                
                <form action="join.php" method="post" data-w-id="cf7c43f1-a69b-e894-f888-8065a96f365b" class="button flex-stretch margin-5l w-inline-block">
                    <input type="hidden" name="id" value="<?php echo $strid; ?>">
                                <input type="hidden" name="url" value="<?php echo $classurl; ?>">
                                <input type="hidden" name="poster" value="<?php echo $email; ?>">
                                <input type="hidden" name="school-id" value="<?php echo $school_id; ?>">

                    <?php 
                     $checkclasses = mysqli_query($con, "SELECT * FROM `users` WHERE email='".$username."'");//gets class entry in database
                            while ($school_data = mysqli_fetch_assoc($checkclasses)){
                                $id = $school_data['classes_id'];
                                $position = $school_data['position'];

                            }
                            //start of code that turns classes_id string into array
                            $id_array = explode(",",$id);
                            $unique_id_array = array_unique($id_array); //removes duplicates
                            $unique_id_array_length = count($unique_id_array);
                            $i = 0;
                            
                                   while($strid != $unique_id_array[$i]){
                                $i++;
                            }

                                if ($strid == $unique_id_array[$i]){
                                    echo '<div>Joined</div>';
                                } else {
                                    echo '<button type="submit" name="submit" style="background-color: #d8ebfa; width: 100%; height: 100%;">Join</button>';
                                }
                     ?>
                </form>
            </div>
            <nav role="navigation" class="nav-menu w-nav-menu"><a href="#" class="w-nav-link">Home</a><a href="#" class="w-nav-link">About</a><a href="#" class="w-nav-link">Contact</a></nav>
            <div class="w-nav-button">
                <div class="w-icon-nav-menu"></div>
            </div>
            <div class="w-nav-overlay" data-wf-ignore=""></div>
        </div>
        <div data-w-id="cf7c43f1-a69b-e894-f888-8065a96f3669" style="display: none; transform: translate3d(0px, 0%, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;" class="members-list gradient-blue">
                   <?php
            $checkclasses = mysqli_query($con, "SELECT * FROM `classes` WHERE class_type='".$classurl."'");//gets class entry in database
            $schoolurl = $_GET['school'];//gets url
            $checkschools = mysqli_query($con, "SELECT * FROM `schools` WHERE id='".$schoolurl."'");//gets class entry in database
            while ($school_data = mysqli_fetch_assoc($checkschools)){
                $school_id = $school_data['id'];
                
            }
            while ($test = mysqli_fetch_assoc($checkclasses)){
                $class_id=$test['id'];
                $class_school_id = $test['school_id'];
                $clas = $test['class_type'];
                $teachername = ucwords(str_replace("_", "", strstr($clas, '_'))); //remove everything behind _, then replace _ with nothing, then capitalize ucwords    
            }
            $checkclasses = mysqli_query($con, "SELECT * FROM `users`");//gets class entry in database
                while ($school_data = mysqli_fetch_assoc($checkclasses)){
                    $id = $school_data['classes_id'];
                    $position = $school_data['position'];
                    $user_id = $school_data['id'];
                }

                //start of code that turns classes_id string into array
                $id_array = explode(",",$id);
                $unique_id_array = array_unique($id_array); //removes duplicates
                $unique_id_array_length = count($unique_id_array);
                
                                $check_classes = mysqli_query($con, "SELECT * FROM `users` WHERE id LIKE '".$class_id."'");
                                while ($class_data = mysqli_fetch_assoc($check_classes)){
                                    $fname = $class_data['fname'];
                                    $lname = $class_data['lname'];
                                    $user_id = $class_data['id'];

                                    echo '
                                    
                                    <a href="#" class="message-name-div school class w-inline-block"><img src="./class_files/5b52dbafe5d2a8e35f98ad0b_icons8-ping-pong-100.png" width="32" height="32">
                                        <div><strong>'.$fname . ' ' .$lname.'</strong></div>
                                    </a>
                                            ';
                                
                               
                            } 
                
             
            ?>
            
        
        </div>
        <div class="class-row-c">
            <div data-w-id="cf7c43f1-a69b-e894-f888-8065a96f3693" class="class-column">
                <div data-collapse="none" data-animation="default" data-duration="400" class="navbar forum w-nav">
                    <div class="text-caps w-hidden-small w-hidden-tiny">Sort</div>
                    <div data-w-id="cf7c43f1-a69b-e894-f888-8065a96f3697" class="nav-user forum w-hidden-small w-hidden-tiny"><img src="./class_files/5b5363df4486f8606f8ba902_icons8-rocket-64.png" width="25">
                        <div class="text-caps color-dark margin-5l flex-stretch">Best</div><img src="./class_files/5b52ea43e5d2a8589d98b019_icons8-sort-down-filled-100.png" width="10" class="drop-down-image">
                        <div class="nav-user-drop-down forum">
                            <div class="nav-user-drop-down-item forum"><img src="./class_files/5b5363df4486f8606f8ba902_icons8-rocket-64.png" width="25">
                                <div class="forum-drop-down margin-5l">Best</div>
                            </div>
                            <div class="nav-user-drop-down-line forum"></div>
                            <div class="nav-user-drop-down-item forum"><img src="./class_files/5b5364804486f8799d8ba9b8_icons8-confetti-64.png" width="25">
                                <div class="forum-drop-down margin-5l">New</div>
                            </div>
                            <div class="nav-user-drop-down-line forum"></div>
                            <div class="nav-user-drop-down-item forum"><img src="./class_files/5b5367ec4486f8e1df8bb216_icons8-boxing-glove-64.png" width="25">
                                <div class="forum-drop-down margin-5l">Controversial</div>
                            </div>
                        </div>
                    </div>
                    <div class="text-caps margin-15l">Filter</div>
                    <div data-w-id="cf7c43f1-a69b-e894-f888-8065a96f36ad" class="nav-user forum"><img src="./class_files/5b5363df4486f8606f8ba902_icons8-rocket-64.png" width="25">
                        <div class="text-caps color-dark margin-5l flex-stretch">All</div><img src="./class_files/5b52ea43e5d2a8589d98b019_icons8-sort-down-filled-100.png" width="10" class="drop-down-image">
                        <div class="nav-user-drop-down forum">
                            <?php 
                            
                            ?>
                        
                            <a href="class.php?school=<?php echo $school_id; ?>&class=<?php echo $classurl;?>&category=all" class="nav-user-drop-down-item forum">
                                <div class="forum-drop-down margin-5l">All</div>
                            </a>
                            <div class="nav-user-drop-down-line forum"></div>
                            <a href="class.php?school=<?php echo $school_id; ?>&class=<?php echo $classurl;?>&category=helpful" class="nav-user-drop-down-item forum">
                                <div class="forum-drop-down margin-5l">Helpful</div>
                            </a>
                            <div class="nav-user-drop-down-line forum"></div>
                            <a href="class.php?school=<?php echo $school_id; ?>&class=<?php echo $classurl;?>&category=Question" class="nav-user-drop-down-item forum">
                                <div class="forum-drop-down margin-5l">Question</div>
                            </a>
                            <div class="nav-user-drop-down-line forum"></div>
                            <a href="class.php?school=<?php echo $school_id; ?>&class=<?php echo $classurl;?>&category=Tips%20and%20Tricks" class="nav-user-drop-down-item forum">
                                <div class="forum-drop-down margin-5l">Tips and Tricks</div>
                            </a>
                        </div>
                    </div>
                    
                    <nav role="navigation" class="nav-menu w-nav-menu"><a href="#" class="w-nav-link">Home</a><a href="#" class="w-nav-link">About</a><a href="#" class="w-nav-link">Contact</a></nav>
                    <div class="w-nav-button">
                        <div class="w-icon-nav-menu"></div>
                    </div>
                    <div class="w-nav-overlay" data-wf-ignore=""></div>
                </div>
                <div class="flex-stretch forum">
                    <div class="forum-label-div w-hidden-small w-hidden-tiny">
                        <div class="forum-label points">
                            <div>Points</div>
                        </div>
                        <div class="forum-label user">
                            <div>User</div>
                        </div>
                        <div class="forum-label post">
                            <div>Title</div>
                        </div>
                        <div class="forum-label category">
                            <div>category</div>
                        </div>
                        <div class="forum-label date">
                            <div>date</div>
                        </div>
                        <div class="forum-label replies">
                            <div>replies</div>
                        </div>
                    </div>
        
        <?php
         $checkclasses = mysqli_query($con, "SELECT * FROM `classes` WHERE class_type='".$classurl."'");
                                        $GLOBALS['check_u'] = mysqli_query($con, "SELECT * FROM users WHERE email='".$username."'"); //gets logged in user
                                      while ($row_u = mysqli_fetch_assoc($check_u)){
                                            $fname = $row_u['fname'];
                                            $lname = $row_u['lname'];
                                            
                                        }
                                        while ($test = mysqli_fetch_assoc($checkclasses)){
                                            $id=$test['id'];
                                    }
        $category_sort = $_GET['category'];
        if ($category_sort != null && $category_sort != "all"){
                    $forumQuery = mysqli_query($con, "SELECT * FROM `forum` WHERE category='".$category_sort."'"); //$forumQuery
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
                    $forum_id = $forumdata['forum_id'];

                    echo '
                    
                    <a href="#" class="forum-post '.$forum_id.' w-inline-block">
                            <div class="forum-sub-title choose">
                                <div class="flex-horbot">
                                    <div class="vote"><img src="./class_files/5b54627b9b226854d72c1ba9_icons8-upward-arrow-64.png" width="32" class="vote-image"><img src="./class_files/5b5463d0eadb5814beb89a20_icons8-upward-arrow-64 (1).png" width="32" class="forum-vote-color"></div>
                                    <div class="vote"><img src="./class_files/5b5462b2ff2e0086c1c20aab_icons8-below-64.png" width="32" class="vote-image"><img src="./class_files/5b546355e5d2a84241996d17_icons8-below-64 (1).png" width="32" class="forum-vote-color"></div>
                                </div>
                                <div class="semi-bold">'.$forum_post_points.'</div>
                            </div>
                            <div class="forum-sub-title user"><img src="./class_files/5b52dbafe5d2a8e35f98ad0b_icons8-ping-pong-100.png" width="32" height="32">
                                <div><strong>'.$forum_post_creator.'</strong></div>
                                <div class="forum-write-div profile">
                                    <div class="profile-image-div">
                                        <div class="hor-top"><img src="./class_files/5b52dbafe5d2a8e35f98ad0b_icons8-ping-pong-100.png" width="50" class="profile-image">
                                            <div class="margin-15l dsa">
                                                <div class="logo">'.$forum_post_creator.'</div>
                                                <div>@'.$username.'</div>
                                            </div>
                                        </div>
                                        <div class="profile-mobile-buttons">
                                            <div class="icon-button _32 margin-50l"><img src="./class_files/5b5dfd0ec3f7cb076f48860d_icons8-chat-64.png" width="32" height="32"></div>
                                        </div>
                                    </div>
                                    <div class="profile-school">Panther Creek High School</div>
                                    <div>4 classes | 52 posts</div>
                                </div>
                            </div>
                            <div class="forum-sub-title title">
                                <div class="flex-stretch">'.$forum_post_title.'</div><img src="./class_files/5b5ead84e90d48a043a35a77_icons8-attach-64.png" width="32" class="attachment"></div>
                            <div class="forum-sub-title category">
                                <div class="text-caps">'.$forum_post_category.'</div>
                            </div>
                            <div class="forum-sub-title date">
                                <div>'.$forum_post_dateCreated.'</div>
                            </div>
                            <div class="forum-sub-title replies">
                                <div class="text-caps">'.$forum_comments_replies.'</div>
                            </div>
                        </a>
           
                           <div class = "modal-div cl'.$forum_id.' _2" id="forum-popup">
                        
                            <div class="container w-container">
                                <div class="post-top-div">
                                    <div class="forum-post-vote-div">
                                        <div class="vote"><img src="./post_files/5b54627b9b226854d72c1ba9_icons8-upward-arrow-64.png" width="24" class="vote-image"><img src="./post_files/5b5463d0eadb5814beb89a20_icons8-upward-arrow-64 (1).png" width="24" class="forum-vote-color"></div>
                                        <div class="semi-bold">'.$forum_post_points.'</div>
                                        <div class="vote"><img src="./post_files/5b5462b2ff2e0086c1c20aab_icons8-below-64.png" width="24" class="vote-image"><img src="./post_files/5b546355e5d2a84241996d17_icons8-below-64 (1).png" width="32" class="forum-vote-color"></div>
                                    </div>
                                    <div class="post-title-div">
                                        <div class="post-info-wrapper w-clearfix">
                                            <div data-w-id="c4b3b889-8777-96e9-24d7-f4f313751772" class="post-info-title"><img src="./post_files/5b52dbafe5d2a8e35f98ad0b_icons8-ping-pong-100.png" width="16" class="margin-5ri">
                                                <div><strong>Adi Bhujle</strong></div>
                                                <div class="text-caps margin-5l">'.$forum_post_category.'</div>
                                                <div class="message-time margin-10l">'.$forum_post_dateCreated.'</div>
                                                <div class="forum-write-div profile">
                                                    <div class="profile-image-div">
                                                        <div class="hor-top"><img src="./post_files/5b52dbafe5d2a8e35f98ad0b_icons8-ping-pong-100.png" width="50" class="profile-image">
                                                            <div class="margin-15l dsa">
                                                                <div class="logo">'.$forum_post_creator.'</div>
                                                                <div>@'.$username.'</div>
                                                            </div>
                                                        </div>
                                                        <div class="profile-mobile-buttons">
                                                            <a href="#" class="icon-button _32 margin-50l w-inline-block"><img src="./post_files/5b5dfd0ec3f7cb076f48860d_icons8-chat-64.png" width="32" height="32"></a>
                                                        </div>
                                                    </div>
                                                    <div class="profile-school">Panther Creek High School</div>
                                                    <div>4 classes | 21 posts</div>
                                                </div>
                                            </div>
                                            <a href="#" id="close" class="close'.$forum_id.' float-right w-inline-block"><img src="./post_files/5b54bb2beadb5834c6b8cce7_icons8-delete-64.png" width="32" class="x-absolute"></a>
                                        </div>
                                        <div class="flex-horleft margin-10b"><img src="./post_files/5b5ead84e90d48a043a35a77_icons8-attach-64.png" width="24" class="margin-5ri">
                                            <div class="post-title">'.$forum_post_title.'</div>
                                        </div>
                                        <p>'.$forum_post_content.'</p>
                                        <a href="'.$forum_file_path.'" class="trophy-indiv-div post w-inline-block"><img src="./post_files/5b5ead84e90d48a043a35a77_icons8-attach-64.png" width="24" class="margin-5ri">
                                            <div>'.$forum_file_path.'</div>
                                        </a>
                                    </div>
                                </div>
                                        <div class="post-comment-main-div">
            <div class="w-form">
                <form id="comment_form'.$forum_id.'" method="POST">
                    <div class="small">Comment as '.$fname . ' ' .$lname.'</div>
                         <input type="hidden" name="comment_name" id="comment_name'.$forum_id.'" value="'.$fname . ' ' .$lname.'"/>

                    <textarea name="comment_content" id="comment_content"  placeholder="What do you have to say?" maxlength="5000" class="input post margin-5b w-input"></textarea>
                        <input type="hidden" name="comment_id" id="comment_id'.$forum_id.'" value="0" />
                        <input type="hidden" name="forum_id" value="'.$forum_id.'"/>
                    <input type="submit" value="Submit" name="submit" class="button media w-button">
                       <span id="comment_message'.$forum_id.'"></span>
   <br />
                 <div class="post-comment-sort">
                                        <div class="text-caps w-hidden-small w-hidden-tiny">Sort</div>
                                        <div data-w-id="1a9cb803-4081-9345-0e0a-27a527fdd050" class="nav-user forum w-hidden-small w-hidden-tiny"><img src="./post_files/5b6097d1a351717bf52f8ba7_icons8-leaderboard-64.png" width="25">
                                            <div class="text-caps color-dark margin-5l flex-stretch">Best</div><img src="./post_files/5b52ea43e5d2a8589d98b019_icons8-sort-down-filled-100.png" width="10" class="drop-down-image">
                                            <div class="nav-user-drop-down forum">
                                                <div class="nav-user-drop-down-item forum"><img src="./post_files/5b6097d1a351717bf52f8ba7_icons8-leaderboard-64.png" width="25">
                                                    <div class="forum-drop-down margin-5l">Best</div>
                                                </div>
                                                <div class="nav-user-drop-down-line forum"></div>
                                                <div class="nav-user-drop-down-item forum"><img src="./post_files/5b5364804486f8799d8ba9b8_icons8-confetti-64.png" width="25">
                                                    <div class="forum-drop-down margin-5l">New</div>
                                                </div>
                                                <div class="nav-user-drop-down-line forum"></div>
                                                <div class="nav-user-drop-down-item forum"><img src="./post_files/5b5367ec4486f8e1df8bb216_icons8-boxing-glove-64.png" width="25">
                                                    <div class="forum-drop-down margin-5l">Controversial</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
   <div id="display_comment'.$forum_id.'"></div>
                </form>
                
            </div>

                            
                                                            </div>
                                             
                </div>
                                            <style>
        .cl'.$forum_id.'{
            display: none;
            
        }
        
    </style>
                 <script>
                
                $(".'.$forum_id.'").on("click", function(){
                   $(".cl'.$forum_id.'").css("display", "block"); 
                });
                $(".close'.$forum_id.'").on("click", function(){
                    $(".cl'.$forum_id.'").css("display", "none");
                });
                
  
    </script>
            <script>
              $(document).ready(function(){
 
 $("#comment_form'.$forum_id.'").on("submit", function(event){
  event.preventDefault();
  var form_data = $(this).serialize();
  $.ajax({
   url:"add_comment.php",
   method:"POST",
   data:form_data,
   dataType:"JSON",
   success:function(data)
   {
    if(data.error != "")
    {
     $("#comment_form'.$forum_id.'")[0].reset();
     $("#comment_message'.$forum_id.'").html(data.error);
     $("#comment_id'.$forum_id.'").val("0");
     load_comment();
    }
   }
  })
 });

 load_comment();

 function load_comment()
 {
  $.ajax({
   url:"fetch_comment.php?url='.$forum_id.'",
   method:"POST",
   success:function(data)
   {
    $("#display_comment'.$forum_id.'").html(data);
   }
  })
 }

 $(document).on("click", ".reply", function(){
  var comment_id = $(this).attr("id");
  $("#comment_id'.$forum_id.'").val(comment_id);
  $("#comment_content").focus();
 });
 
});
</script>
                        ';
 }
        } else {
              $id_array = explode(",",$id);
                            $unique_id_array = array_unique($id_array); //removes duplicates
                            $unique_id_array_length = count($unique_id_array);
            $forumQuery = mysqli_query($con, "SELECT * FROM `forum` WHERE class_id='".$id."'"); //$forumQuery
            
            while ($forumdata = mysqli_fetch_assoc($forumQuery)){
                    $forum_post_title = $forumdata['title'];
                    $forum_post_creator = $forumdata['creator'];
                    $forum_post_dateCreated = $forumdata['date_created'];
                    $forum_post_category = $forumdata['category'];
                    $forum_post_points = $forumdata['points'];
                    $forum_comments_id = $forumdata['comments_id'];
                    $forum_comments_username = $forumdata['comments_username'];
                    $forum_comment_datetime = $forumdata['comments_datetime'];
                    $forum_comments_replies = $forumdata['comments_reply'];
                    $forum_file_path = $forumdata['file_path'];
                    $forum_id = $forumdata['forum_id'];
             /*       $connect = new PDO('mysql:host=127.0.0.1;dbname=studentscholar', 'msu242', '');
            $forumQueryy = mysqli_query($connect, "SELECT * FROM tbl_comment WHERE parent_comment_id = '0' AND forum_id = '".$forum_id."' ORDER BY comment_id DESC"); //$forumQuery
   
            while ($dataa = mysqli_fetch_assoc($forumQueryy)){
                $comment_forum_id = $dataa['forum_id'];
            }*/
                    echo '<a href="#" class="forum-post '.$forum_id.' w-inline-block">
                            <div class="forum-sub-title choose">
                                <div class="flex-horbot">
                                    <div class="vote"><img src="./class_files/5b54627b9b226854d72c1ba9_icons8-upward-arrow-64.png" width="32" class="vote-image"><img src="./class_files/5b5463d0eadb5814beb89a20_icons8-upward-arrow-64 (1).png" width="32" class="forum-vote-color"></div>
                                    <div class="vote"><img src="./class_files/5b5462b2ff2e0086c1c20aab_icons8-below-64.png" width="32" class="vote-image"><img src="./class_files/5b546355e5d2a84241996d17_icons8-below-64 (1).png" width="32" class="forum-vote-color"></div>
                                </div>
                                <div class="semi-bold">'.$forum_post_points.'</div>
                            </div>
                            <div class="forum-sub-title user"><img src="./class_files/5b52dbafe5d2a8e35f98ad0b_icons8-ping-pong-100.png" width="32" height="32">
                                <div><strong>'.$forum_post_creator.'</strong></div>
                                <div class="forum-write-div profile">
                                    <div class="profile-image-div">
                                        <div class="hor-top"><img src="./class_files/5b52dbafe5d2a8e35f98ad0b_icons8-ping-pong-100.png" width="50" class="profile-image">
                                            <div class="margin-15l dsa">
                                                <div class="logo">'.$forum_post_creator.'</div>
                                                <div>@'.$username.'</div>
                                            </div>
                                        </div>
                                        <div class="profile-mobile-buttons">
                                            <div class="icon-button _32 margin-50l"><img src="./class_files/5b5dfd0ec3f7cb076f48860d_icons8-chat-64.png" width="32" height="32"></div>
                                        </div>
                                    </div>
                                    <div class="profile-school">Panther Creek High School</div>
                                    <div>4 classes | 52 posts</div>
                                </div>
                            </div>
                            <div class="forum-sub-title title">
                                <div class="flex-stretch">'.$forum_post_title.'</div><img src="./class_files/5b5ead84e90d48a043a35a77_icons8-attach-64.png" width="32" class="attachment"></div>
                            <div class="forum-sub-title category">
                                <div class="text-caps">'.$forum_post_category.'</div>
                            </div>
                            <div class="forum-sub-title date">
                                <div>'.$forum_post_dateCreated.'</div>
                            </div>
                            <div class="forum-sub-title replies">
                                <div class="text-caps">'.$forum_comments_replies.'</div>
                            </div>
                        </a>
           
                           <div class = "modal-div cl'.$forum_id.' _2" id="forum-popup">
                        
                            <div class="container w-container">
                                <div class="post-top-div">
                                    <div class="forum-post-vote-div">
                                        <div class="vote"><img src="./post_files/5b54627b9b226854d72c1ba9_icons8-upward-arrow-64.png" width="24" class="vote-image"><img src="./post_files/5b5463d0eadb5814beb89a20_icons8-upward-arrow-64 (1).png" width="24" class="forum-vote-color"></div>
                                        <div class="semi-bold">'.$forum_post_points.'</div>
                                        <div class="vote"><img src="./post_files/5b5462b2ff2e0086c1c20aab_icons8-below-64.png" width="24" class="vote-image"><img src="./post_files/5b546355e5d2a84241996d17_icons8-below-64 (1).png" width="32" class="forum-vote-color"></div>
                                    </div>
                                    <div class="post-title-div">
                                        <div class="post-info-wrapper w-clearfix">
                                            <div data-w-id="c4b3b889-8777-96e9-24d7-f4f313751772" class="post-info-title"><img src="./post_files/5b52dbafe5d2a8e35f98ad0b_icons8-ping-pong-100.png" width="16" class="margin-5ri">
                                                <div><strong>Adi Bhujle</strong></div>
                                                <div class="text-caps margin-5l">'.$forum_post_category.'</div>
                                                <div class="message-time margin-10l">'.$forum_post_dateCreated.'</div>
                                                <div class="forum-write-div profile">
                                                    <div class="profile-image-div">
                                                        <div class="hor-top"><img src="./post_files/5b52dbafe5d2a8e35f98ad0b_icons8-ping-pong-100.png" width="50" class="profile-image">
                                                            <div class="margin-15l dsa">
                                                                <div class="logo">'.$forum_post_creator.'</div>
                                                                <div>@'.$username.'</div>
                                                            </div>
                                                        </div>
                                                        <div class="profile-mobile-buttons">
                                                            <a href="#" class="icon-button _32 margin-50l w-inline-block"><img src="./post_files/5b5dfd0ec3f7cb076f48860d_icons8-chat-64.png" width="32" height="32"></a>
                                                        </div>
                                                    </div>
                                                    <div class="profile-school">Panther Creek High School</div>
                                                    <div>4 classes | 21 posts</div>
                                                </div>
                                            </div>
                                            <a href="#" id="close" class="close'.$forum_id.' float-right w-inline-block"><img src="./post_files/5b54bb2beadb5834c6b8cce7_icons8-delete-64.png" width="32" class="x-absolute"></a>
                                        </div>
                                        <div class="flex-horleft margin-10b"><img src="./post_files/5b5ead84e90d48a043a35a77_icons8-attach-64.png" width="24" class="margin-5ri">
                                            <div class="post-title">'.$forum_post_title.'</div>
                                        </div>
                                        <p>'.$forum_post_content.'</p>
                                        <a href="'.$forum_file_path.'" class="trophy-indiv-div post w-inline-block"><img src="./post_files/5b5ead84e90d48a043a35a77_icons8-attach-64.png" width="24" class="margin-5ri">
                                            <div>'.$forum_file_path.'</div>
                                        </a>
                                    </div>
                                </div>
                                        <div class="post-comment-main-div">
            <div class="w-form">
                <form id="comment_form'.$forum_id.'" method="POST">
                    <div class="small">Comment as '.$fname . ' ' .$lname.'</div>
                         <input type="hidden" name="comment_name" id="comment_name'.$forum_id.'" value="'.$fname . ' ' .$lname.'"/>

                    <textarea name="comment_content" id="comment_content"  placeholder="What do you have to say?" maxlength="5000" class="input post margin-5b w-input"></textarea>
                        <input type="hidden" name="comment_id" id="comment_id'.$forum_id.'" value="0" />
                        <input type="hidden" name="forum_id" value="'.$forum_id.'"/>
                    <input type="submit" value="Submit" name="submit" class="button media w-button">
                       <span id="comment_message'.$forum_id.'"></span>
   <br />
                 <div class="post-comment-sort">
                                        <div class="text-caps w-hidden-small w-hidden-tiny">Sort</div>
                                        <div data-w-id="1a9cb803-4081-9345-0e0a-27a527fdd050" class="nav-user forum w-hidden-small w-hidden-tiny"><img src="./post_files/5b6097d1a351717bf52f8ba7_icons8-leaderboard-64.png" width="25">
                                            <div class="text-caps color-dark margin-5l flex-stretch">Best</div><img src="./post_files/5b52ea43e5d2a8589d98b019_icons8-sort-down-filled-100.png" width="10" class="drop-down-image">
                                            <div class="nav-user-drop-down forum">
                                                <div class="nav-user-drop-down-item forum"><img src="./post_files/5b6097d1a351717bf52f8ba7_icons8-leaderboard-64.png" width="25">
                                                    <div class="forum-drop-down margin-5l">Best</div>
                                                </div>
                                                <div class="nav-user-drop-down-line forum"></div>
                                                <div class="nav-user-drop-down-item forum"><img src="./post_files/5b5364804486f8799d8ba9b8_icons8-confetti-64.png" width="25">
                                                    <div class="forum-drop-down margin-5l">New</div>
                                                </div>
                                                <div class="nav-user-drop-down-line forum"></div>
                                                <div class="nav-user-drop-down-item forum"><img src="./post_files/5b5367ec4486f8e1df8bb216_icons8-boxing-glove-64.png" width="25">
                                                    <div class="forum-drop-down margin-5l">Controversial</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
   <div id="display_comment'.$forum_id.'"></div>
                </form>
                
            </div>

                            
                   
                            </div>
                                             
                </div>
                                            <style>
        .cl'.$forum_id.'{
            display: none;
            
        }
        
    </style>
                 <script>
                
                $(".'.$forum_id.'").on("click", function(){
                   $(".cl'.$forum_id.'").css("display", "block"); 
                });
                $(".close'.$forum_id.'").on("click", function(){
                    $(".cl'.$forum_id.'").css("display", "none");
                });
                
  
    </script>
            <script>
              $(document).ready(function(){
 
 $("#comment_form'.$forum_id.'").on("submit", function(event){
  event.preventDefault();
  var form_data = $(this).serialize();
  $.ajax({
   url:"add_comment.php",
   method:"POST",
   data:form_data,
   dataType:"JSON",
   success:function(data)
   {
    if(data.error != "")
    {
     $("#comment_form'.$forum_id.'")[0].reset();
     $("#comment_message'.$forum_id.'").html(data.error);
     $("#comment_id'.$forum_id.'").val("0");
     load_comment();
    }
   }
  })
 });

 load_comment();

 function load_comment()
 {
  $.ajax({
   url:"fetch_comment.php?url='.$forum_id.'",
   method:"POST",
   success:function(data)
   {
    $("#display_comment'.$forum_id.'").html(data);
   }
  })
 }

 $(document).on("click", ".reply", function(){
  var comment_id = $(this).attr("id");
  $("#comment_id'.$forum_id.'").val(comment_id);
  $("#comment_content").focus();
 });
 
});
</script>
                        ';
                        
            }
        }
        ?>
  
  
                </div>   
         
                <a href="#" data-w-id="cf7c43f1-a69b-e894-f888-8065a96f38f1" class="button forum w-inline-block">
                    <div>Create Post</div>
                </a>
              
                <div data-w-id="cf7c43f1-a69b-e894-f888-8065a96f38f4" style="opacity: 0;" class="forum-write-blur teacher">
                    <div data-w-id="cf7c43f1-a69b-e894-f888-8065a96f38f5" style="transform: translate3d(0px, 100%, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;" class="forum-write-div">
                        <div class="forum-write-title-div">
                            <div class="logo color">Create a Post</div><img src="./class_files/5b54bb2beadb5834c6b8cce7_icons8-delete-64.png" width="32" data-w-id="cf7c43f1-a69b-e894-f888-8065a96f38f9" class="x-absolute"></div>
                        <div class="w-form">
                                   <?php
                
                                     $classurl = $_GET['class'];//gets url
                                     $checkclasses = mysqli_query($con, "SELECT * FROM `classes` WHERE class_type='".$classurl."'");
                                        $GLOBALS['check_u'] = mysqli_query($con, "SELECT * FROM users WHERE email='".$username."'"); //gets logged in user
                                      while ($row_u = mysqli_fetch_assoc($check_u)){
                                            $fname = $row_u['fname'];
                                            $lname = $row_u['lname'];
                                            
                                        }
                                        while ($test = mysqli_fetch_assoc($checkclasses)){
                                            $id=$test['id'];
                                    }
                                    $_SESSION['url'] =  $classurl;
                                    $poster = $fname . '' .$lname;
                                  
                                ?>
                                <?php
                                 $check_d = mysqli_query($con, $sql = "SELECT * FROM `classes` WHERE class_type='".$classurl."'");
                    
                    while ($row_d = mysqli_fetch_assoc($check_d)){
                        $school_id = $row_d['school_id']; //replace this with the school name from the school's database.
                        
                        $check_schools = mysqli_query($con, "SELECT * FROM `schools` WHERE id='".$school_id."'");
                        $class_id_message = $row_d['id'];
                        while ($getschool = mysqli_fetch_assoc($check_schools)){
                            $school_short_name = $getschool['short_name'];
                        }
                    }
                   
                                ?>
                            <form id="email-form" name="email-form" data-name="Email Form" class="vert-cent" action="form_process.php?classid=<?php echo $id ?>" method="post">
                         

                                <input type="hidden" name="url" value="<?php echo $classurl; ?>">
                                <input type="hidden" name="poster" value="<?php echo $poster; ?>">
                                <input type="hidden" name="school_id" value="<?php echo $school_id; ?>">
                                <input type="text" class="input forum w-input" maxlength="256" name="title" data-name="Name 3" placeholder="Title" id="name-3" required="">
                                <textarea id="field-3" name="description" placeholder="Text (optional)" maxlength="5000" class="input forum area w-input"></textarea>
                            <select id="field-4" name="category" required="" class="input forum select w-select">
                                    <option value="">Select Category</option>
                                    <option value="Helpful">Helpful</option>
                                    <option value="Question">Question</option>
                                    <option value="Tips and Tricks">Tips And Tricks</option>
                                </select>
                                <div class="radio-button w-radio">
                                    <input type="radio" id="radio" name="anonymous" value="Anonymous" data-name="Anonymous?" class="w-radio-input">
                                    <label for="radio" class="w-form-label">Post Anonymously</label>
                                </div>
                                <a href="#" class="button media w-inline-block"><img src="./class_files/5b54cdb845c6a343184ae757_icons8-document-64.png" width="32" class="w-hidden-small w-hidden-tiny">
                                    <div class="margin-10l">Share Photos and Documents</div>
                                </a>
                                <input type="submit" value="Post" name="submit" class="button color w-button">
                            </form>
                          
                        </div>
                    </div>
                </div>
            </div>
            <?php
             $GLOBALS['check_u'] = mysqli_query($con, "SELECT * FROM users WHERE email='".$username."'"); //gets the logged in user
    
    while ($row_u = mysqli_fetch_assoc($check_u)){
        $fname = $row_u['fname'];
        $lname = $row_u['lname'];
        $uname = $row_u['username'];
        $classes_id = $row_u['classes_id'];
        $email = $row_u['email'];
        $user_id = $row_u['id'];
        
    }
            ?>
            <div data-w-id="cf7c43f1-a69b-e894-f888-8065a96f390e" class="class-column line" id="comments-container">
                <div class="flex-stretch message">
                    <div class="message-date-div">
                        <div class="message-date-line"></div>
                        <div class="message-date">June 8</div>
                        <div class="message-date-line"></div>
                    </div>
                    
                    <?php
                    
                    ?>
                    <div id="new_comments"></div>
                    <!--
                    <div class="message-div">
                        <a href="#" class="w-inline-block"><img src="./class_files/5b53f743ff2e00b45bc1ea50_icons8-pumpkin-64.png" width="32" height="32"></a>
                        <div class="message-data-div margin-5l">
                            <div class="message-name-div">
                                <div><a href="#"><strong>Tim Tulip</strong></a></div>
                                <div class="message-time margin-10l">2:57 pm</div>
                                <div class="forum-write-div profile tim">
                                    <div class="profile-image-div">
                                        <div class="hor-top"><img src="./class_files/5b53f743ff2e00b45bc1ea50_icons8-pumpkin-64.png" width="50" class="profile-image">
                                            <div class="margin-15l dsa">
                                                <div class="logo">Tim Tulip</div>
                                                <div>@flowerpower</div>
                                            </div>
                                        </div>
                                        <div class="profile-mobile-buttons">
                                            <a href="#" class="icon-button _32 margin-50l w-inline-block"><img src="./class_files/5b5dfd0ec3f7cb076f48860d_icons8-chat-64.png" width="32" height="32"></a>
                                        </div>
                                    </div>
                                    <div class="profile-school">Panther Creek High School</div>
                                    <div>3 classes | 16 posts</div>
                                </div>
                            </div>
                            <div class="text first">
                                <div>Bob are you doing another review session?</div>
                            </div>
                            <div class="text last">
                                <div>Like last time?</div>
                            </div>
                        </div>
                    </div>
                    <div class="message-date-div">
                        <div class="message-date-line"></div>
                        <div class="message-date">Jun 9</div>
                        <div class="message-date-line"></div>
                    </div>
                    <div class="message-div">
                        <a href="#" class="w-inline-block"><img src="./class_files/5b53f738e5d2a86ec499452d_icons8-lettuce-64.png" height="32"></a>
                        <div class="message-data-div margin-5l">
                            <div class="message-name-div">
                                <div><a href="#"><strong>Bob Bobstein</strong></a></div>
                                <div class="message-time margin-10l">5:03 pm</div>
                                <div class="forum-write-div profile green">
                                    <div class="profile-image-div">
                                        <div class="hor-top"><img src="./class_files/5b53f738e5d2a86ec499452d_icons8-lettuce-64.png" width="50" class="profile-image">
                                            <div class="margin-15l dsa">
                                                <div class="logo">Bob Bobstein</div>
                                                <div>@bobostein</div>
                                            </div>
                                        </div>
                                        <div class="profile-mobile-buttons">
                                            <a href="#" class="icon-button _32 margin-50l w-inline-block"><img src="./class_files/5b5dfd0ec3f7cb076f48860d_icons8-chat-64.png" width="32" height="32"></a>
                                        </div>
                                    </div>
                                    <div class="profile-school">Panther Creek High School</div>
                                    <div>4 classes | 52 posts</div>
                                </div>
                            </div>
                            <div class="text first">
                                <div>PM me your number if you want to join the review session</div>
                            </div>
                            <div class="text">
                                <div>It's a group pjone call</div>
                            </div>
                            <div class="text last">
                                <div>*phone</div>
                            </div>
                        </div>
                    </div>
                    <div class="message-div self">
                        <div class="message-data-div margin-5l self">
                            <div class="message-name-div">
                                <div><a href="#"><strong>You</strong></a></div>
                                <div class="message-time margin-10l">2:57 pm</div>
                            </div>
                            <div class="text first self">
                                <div>That was good</div>
                            </div>
                            <div class="text self">
                                <div>Hopefully that was enough to get a high B for me</div>
                            </div>
                            <div class="text last self">
                                <div>That's all I need</div>
                            </div>
                        </div>
                    </div>
                    <div class="message-date-div">
                        <div class="message-date-line"></div>
                        <div class="message-date">Jul 22</div>
                        <div class="message-date-line"></div>
                    </div>
                    <div class="message-div">
                        <a href="#" class="w-inline-block"><img src="./class_files/5b53f738e5d2a86ec499452d_icons8-lettuce-64.png" width="32" height="32"></a>
                        <div class="message-data-div margin-5l">
                            <div class="message-name-div">
                                <div><a><strong>Bob Bobstein</strong></a></div>
                                <div class="message-time margin-10l">5:13 Am</div>
                                <div class="forum-write-div profile green">
                                    <div class="profile-image-div">
                                        <div class="hor-top"><img src="./class_files/5b53f738e5d2a86ec499452d_icons8-lettuce-64.png" width="50" class="profile-image">
                                            <div class="margin-15l dsa">
                                                <div class="logo">Bob Bobstein</div>
                                                <div>@bobostein</div>
                                            </div>
                                        </div>
                                        <div class="profile-mobile-buttons">
                                            <a href="#" class="icon-button _32 margin-50l w-inline-block"><img src="./class_files/5b5dfd0ec3f7cb076f48860d_icons8-chat-64.png" width="32" height="32"></a>
                                        </div>
                                    </div>
                                    <div class="profile-school">Panther Creek High School</div>
                                    <div>4 classes | 52 posts</div>
                                </div>
                            </div>
                            <div class="text first">
                                <div>Ayy I got a 93</div>
                            </div>
                            <div class="text">
                                <div>Thought I did way worse</div>
                            </div>
                            <div class="text last">
                                <div>The curve actually helped</div>
                            </div>
                        </div>
                    </div>
                    <div class="message-div self">
                        <div class="message-data-div margin-5l self">
                            <div class="message-name-div">
                                <div><a href="#"><strong>You</strong></a></div>
                                <div class="message-time margin-10l">5:14 Am</div>
                            </div>
                            <div class="text first self">
                                <div  id="msg"></div>
                            </div>
                        </div>
                    </div>-->
                </div> 
                         <script>
                         


     function chk(){
         var name = document.getElementById('field-6').value;
         var user = document.getElementById('user').value;
         var class_id  = document.getElementById('class_id').value;
  
             $.ajax({
            type: "POST",
            data: {'name' :name, 'user' : user, 'class_id' : class_id},
            url: "message-send.php",
            cache: false,
           
             success:function(data)
               {
               }
                });
/*  $(document).ajaxStop(function(){
    window.location.reload();
});*/
     }
   

     function load_comment()
 {
  $.ajax({
   url:"fetch_messages.php",
   method:"POST",
   success:function(data)
   {
    $("#new_comments").html(data);
   }
  })
 }

            document.onkeydown=function(evt){
        var keyCode = evt ? (evt.which ? evt.which : evt.keyCode) : event.keyCode;
        if(keyCode == 13)
        {
           load_messages();
        }
    }
  $(document).ready(function(){
        
     });
    </script>
                <form class="message-input-div"><img src="./class_files/5b543ef42da7ddfa4cf04264_icons8-paper-plane-64.png" width="32">
              
                    <?php
                    echo '
                       <input type="hidden" name="id" value="'.$strid.'">
                       <input type="hidden" id="fname" name="fname" value="'.$fname .'">
                       <input type="hidden" id="lname" name="lname" value="'.$lname.'">
                                <input type="hidden" name="url" value="'.$classurl.'">
                                <input type="hidden" name="poster" value="'.$email.'">
                                <input type="hidden" name="school-id" id="school-id" value="'.$school_id.'">
                                <input type="hidden" name="class-code" id="classurl" value="'.$classurl.'">
                                <input type="hidden" name="userid" id="userid" value="'.$user_id.'">
                    ';
                    
                    ?>
                        <input type="hidden" name="user" id="user" value="<?php echo $user_id;?>">
                                <input type="hidden" name="class_id" id="class_id" value="<?php echo $class_id_message;?>">
             
                    <input type="text" class="input w-input" maxlength="256" name="field-6" data-name="Field 6" placeholder="Send a message here" id="field-6" required="">
                    <a class="icon-button w-inline-block"><img src="./class_files/5b5ead84e90d48a043a35a77_icons8-attach-64.png" width="32" height="32"></a>
      <input name="submit" type="submit" value="Submit">
                </div>
                <p></p>
            </div>
        </form>
                  <script>
              $(document).ready(function(){
                   
 $(".message-input-div").on("submit", function(){
  event.preventDefault();
  var form_data = $(this).serialize();
    var name = document.getElementById('field-6').value;
         var user = document.getElementById('user').value;
         var class_id  = document.getElementById('class_id').value;
  var classurl = document.getElementById('classurl').value;
    var schoolid = document.getElementById('school-id').value;
      var fname = document.getElementById('fname').value;
  var lname = document.getElementById('lname').value;

             $.ajax({
            type: "POST",
            data: {'name' :name, 'user' : user, 'class_id' : class_id, 'classurl': classurl, 'school-id': schoolid, 'fname': fname, 'lname': lname},
            url: "/message-send.php",
            cache: false,
           
             success:function(data)
               {
                                                       load_messages();

               }
                });

                
 })

     function load_messages()
 {
  $.ajax({

   url:"/fetch_messages.php?school=<?php echo $school_id; ?>&class=<?php echo $classurl; ?>&user=<?php echo $user_id; ?>",
   cache: false,
   
   success:function(data)
   {
       
    $('#new_comments').html(data);
   }
  })
 }
                                    load_messages();

              })

              
  </script>
      
        <!--<div data-w-id="cf7c43f1-a69b-e894-f888-8065a96f3ccc" class="forum-write-blur teacher" style="opacity: 0;" action="class.php" method="post">
            <div data-w-id="cf7c43f1-a69b-e894-f888-8065a96f3ccd" class="forum-write-div teacher" style="transform: translate3d(0px, 100%, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;">
                <div class="forum-write-title-div">
                    <div class="logo color">Classroom Code</div><img src="./class_files/5b54bb2beadb5834c6b8cce7_icons8-delete-64.png" width="32" data-w-id="cf7c43f1-a69b-e894-f888-8065a96f3cd1" class="x-absolute"></div>
                <div class="w-form">
                    <form id="email-form" name="email-form" data-name="Email Form" class="vert-cent" action="class.php" method="post">
                        <div class="teacher-class-code">In order to access this teacher class, you need a class code.</div>
                        <input type="text" class="input forum w-input" maxlength="256" name="classcode" data-name="Name 2" placeholder="Enter your class code." id="name-2" required="">
                        <input type="submit" value="Join Class" name="submit" class="button small color w-button">
                    </form>
                  
                </div>
            </div>
        </div>-->
    </div>
    <script src="./class_files/jquery-3.3.1.min.js.download" type="text/javascript" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="./class_files/webflow.4d33a0b81.js.download" type="text/javascript"></script>
    
   
    <!--[if lte IE 9]><script src="//cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif]-->
</body>

</html>
<?php

}
} else {
             echo "<script>location.replace('dashboard.php');</script>";

}

     echo "<script>
     document.querySelector('.w-nav-menu').style.display = 'none';
     
     
     </script>";} else {
        echo "not logged in";
        echo "<script>
     document.querySelector('.w-nav-menu').style.display = 'block';
     
     
     </script>";
    }
     /*if(isset($_POST['submit'])){
         $classcode = $_POST['classcode'];
         echo "<script>alert(<?php echo $classcode; ?>)</script>";
          $check = mysqli_query($con, "SELECT * FROM classes WHERE id='".$classcode."'");
          $rows = mysqli_num_rows($check);
        if ($rows != 0){
            echo "successfully registered";
        }
        else {
            echo "code not found";
        }
     }*/
?>
