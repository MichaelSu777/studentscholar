<?php
    session_start();
    require("connect.php");
    if ($_SESSION["username"]){
    $username = $_SESSION["username"];
    $schoolurl = $_GET['school'];//gets url
    $checkschools = mysqli_query($con, "SELECT * FROM `schools` WHERE id='".$schoolurl."'");//gets class entry in database
    while ($school_data = mysqli_fetch_assoc($checkschools)){
        $id = $school_data['id'];
        $school_name = $school_data['name'];
        $school_name_shrt = $school_data['short_name'];
        $school_location = $school_data['location'];
    }
    if ($schoolurl == $id && $schoolurl > 0){
    $check_u = mysqli_query($con, "SELECT * FROM users WHERE email='".$username."'");
        $check_d = mysqli_query($con, $sql = "SELECT * FROM `classes`");
        

     while ($row_d = mysqli_fetch_assoc($check_d)){
        $school = $row_d['school_name'];
        $class = $row_d['name'];
        $teacher = $row_d['id'];
        
    }
    while ($row_u = mysqli_fetch_assoc($check_u)){
        $fname = $row_u['fname'];
        $lname = $row_u['lname'];
        $uname = $row_u['username'];
    }
   
?>
<!DOCTYPE html>
<html data-wf-domain="studentscholar.webflow.io" data-wf-page="5b65d4d95b239d2ed234987e" data-wf-site="5b52d603ff2e004c39c15224" data-wf-status="1" class="w-mod-js w-mod-touch wf-poppins-n4-active wf-poppins-n5-active wf-poppins-n6-active wf-poppins-n7-active wf-poppins-n8-active wf-active">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Panther Creek High School - Student Scholar</title>
    <meta content="Welcome to Panther Creek High School! View the student representatives, the announcements, and the different classes." name="description">
    <?php require 'studentscholar_files/head.php'; ?>
</head>

<body>
    <div class="body-div tall">
        <?php require 'studentscholar_files/header.php'; ?>
        <div class="section gradient-blue">
            <div class="container margin-no-top w-container">
                <div class="school-title-div contain">
                    <div class="school-title-div">
                        <h2><?php echo $school_name; ?></h2>
                        <h3 class="school-subtitle margin-5l"><?php echo $school_name_shrt; ?></h3></div>
                        <form action="school-enroll.php" method="post" data-w-id="cf7c43f1-a69b-e894-f888-8065a96f365b" class="button color school w-button">
                    <input type="hidden" name="id" value="<?php echo $schoolurl; ?>">
                                <input type="hidden" name="url" value="<?php echo $classurl; ?>">
                                <input type="hidden" name="poster" value="<?php echo $email; ?>">

                    <?php 
                    
                     $check_u = mysqli_query($con, "SELECT * FROM users WHERE email='".$username."'");
                  
                     while ($row_u = mysqli_fetch_assoc($check_u)){
                        $fname = $row_u['fname'];
                        $lname = $row_u['lname'];
                        $uname = $row_u['username'];
                        $school_id = $row_u['school_id'];
                        
                     }
                     if ($schoolurl == $school_id){
                         echo '<div>Enrolled</div>';
                     } else {
                         echo '<button type="submit" name="submit" style="background-color: #2476b6; width: 100%; height: 100%;">Enroll</button>';
                     }
                    ?>
                </form>
                  </div>
                <div class="notif-welcome-classes school">
                    <?php 
                        $check_u = mysqli_query($con, "SELECT * FROM users WHERE school_id='".$id."'");
                        $num_of_students = mysqli_num_rows($check_u);
                        while ($row_u = mysqli_fetch_assoc($check_u)){
                                $fname = $row_u['fname'];
                                $lname = $row_u['lname'];
                                $uname = $row_u['username'];
                        }
                    ?>
                    <a href="http://studentscholar.webflow.io/panthercreekhs-calculusbc" class="message-name-div school w-inline-block"><img src="./school_files/5b52dbafe5d2a8e35f98ad0b_icons8-ping-pong-100.png" width="32" height="32">
                        <div><?php echo $fname . ' ' .$lname ; ?></div>
                        <div class="message-time">PCHS President</div>
                    </a>
                   
                </div>
                <div class="post-history-footer-div search-15r">
                    <div><?php echo $school_location; ?></div>
                    <?php 
                    if ($num_of_students == 1){
                        echo '
                            <div class="color margin-10l">'.$num_of_students.' student</div>

                        ';
                    } else if ($num_of_students < 1 || $num_of_students > 1){
                        echo '
                            <div class="color margin-10l">'.$num_of_students.' students</div>

                        ';
                    }
                    ?>
                </div>
            </div>
            <div class="container w-container"><img src="./school_files/5b52ea43e5d2a8589d98b019_icons8-sort-down-filled-100.png" width="10" class="notif-min">
                <div class="notification-class-title"><img src="./school_files/5b64f14ff109cf23cfd77b61_icons8-advertising-64.png" width="25">
                    <div class="margin-10l"><strong>Announcements</strong></div>
                </div>
                <a href="#" class="notification-message-div w-inline-block">
                    <div class="flex-horcent"><img src="./school_files/5b61f07ca5fc3aa8e8d0f98d_icons8-traditional-school-bus-64.png" width="32">
                        <div class="semi-bold margin-10l">Bob Bobstein is now Class of 2019 Student Representative</div>
                    </div>
                    <div class="message-time margin-10l">5:58 Am</div>
                </a>
                <a href="#" class="notification-message-div margin-5b w-inline-block">
                    <div class="flex-horcent"><img src="./school_files/5b61f07ca5fc3aa8e8d0f98d_icons8-traditional-school-bus-64.png" width="32">
                        <div class="semi-bold margin-10l">Anyone seniors interested in being senior student reps come to Room 1819</div>
                    </div>
                    <div class="message-time margin-10l">3 days ago, 3:14 pm</div>
                </a>
            </div>
            <div class="container school w-container">
                <div class="notification-class-div solo w-clearfix"><img src="./school_files/5b52ea43e5d2a8589d98b019_icons8-sort-down-filled-100.png" width="10" data-w-id="6a552625-d0a0-c8ac-77f5-fc7739b4c64c" style="transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(180deg) skew(0deg, 0deg); transform-style: preserve-3d;" class="school-min">
                    <div class="notification-class-title">
                        <div><strong>Clubs</strong></div>
                    </div>
                    <div style="transform: translate3d(0px, -50px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); opacity: 0; transform-style: preserve-3d;" class="min-div inverse">
                        <div class="school-class-main-div">
                            <a href="#" class="school-class-div w-inline-block"><img src="./school_files/5b6113197eaecbbaf1de75e0_icons8-back-to-64.png" width="32" class="a">
                                <div class="semi-bold margin-10l">Chess Club</div>
                                <div class="message-time margin-10l">23 Students</div>
                            </a>
                            <a href="#" class="school-class-div w-inline-block"><img src="./school_files/5b6113197eaecbbaf1de75e0_icons8-back-to-64.png" width="32" class="a">
                                <div class="semi-bold margin-10l">Web Design Club</div>
                                <div class="message-time margin-10l">31 Students</div>
                            </a>
                            <a href="#" class="school-class-div w-inline-block"><img src="./school_files/5b6113197eaecbbaf1de75e0_icons8-back-to-64.png" width="32" class="a">
                                <div class="semi-bold margin-10l">Car Club</div>
                                <div class="message-time margin-10l">23 Students</div>
                            </a>
                            <a href="#" class="school-class-div w-inline-block"><img src="./school_files/5b6113197eaecbbaf1de75e0_icons8-back-to-64.png" width="32" class="a">
                                <div class="semi-bold margin-10l">Key Club</div>
                                <div class="message-time margin-10l">23 Students</div>
                            </a>
                            <a href="#" class="school-class-div w-inline-block"><img src="./school_files/5b6113197eaecbbaf1de75e0_icons8-back-to-64.png" width="32" class="a">
                                <div class="semi-bold margin-10l">Science Club</div>
                                <div class="message-time margin-10l">23 Students</div>
                            </a>
                            <a href="#" class="school-class-div w-inline-block"><img src="./school_files/5b6113197eaecbbaf1de75e0_icons8-back-to-64.png" width="32" class="a">
                                <div class="semi-bold margin-10l">TSA</div>
                                <div class="message-time margin-10l">103 Students</div>
                            </a>
                            <a href="#" class="school-class-div w-inline-block"><img src="./school_files/5b6113197eaecbbaf1de75e0_icons8-back-to-64.png" width="32" class="a">
                                <div class="semi-bold margin-10l">Programming Club</div>
                                <div class="message-time margin-10l">23 Students</div>
                            </a>
                            <a href="#" class="school-class-div w-inline-block"><img src="./school_files/5b6113197eaecbbaf1de75e0_icons8-back-to-64.png" width="32" class="a">
                                <div class="semi-bold margin-10l">Math Club</div>
                                <div class="message-time margin-10l">23 Students</div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container school w-container">
                    <?php
                             $check_classes = mysqli_query($con, $sql = "SELECT * FROM `classes` WHERE school_id='".$id."' AND category='math'");
                            $num_school_classes = mysqli_num_rows($check_classes);
                            if ($num_school_classes > 0){
                                
                            
                       ?>
                <div class="notification-class-div w-clearfix"><img src="./school_files/5b52ea43e5d2a8589d98b019_icons8-sort-down-filled-100.png" width="10" data-w-id="e3d1ba30-9ed2-2c9a-0879-c79588ffefca" style="transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(180deg) skew(0deg, 0deg); transform-style: preserve-3d;" class="school-min">
                    <div class="notification-class-title">
                        <div><strong>Math</strong></div>
                    </div>
                    <div data-w-id="d71840dd-b494-12c5-780e-6c2d260dcc19" style="transform: translate3d(0px, -50px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); opacity: 0; transform-style: preserve-3d;" class="min-div inverse">
                        <div class="school-class-main-div">
                            <?php 
                            $checkschools = mysqli_query($con, "SELECT * FROM `schools` WHERE id='".$schoolurl."'");//gets class entry in database
                            $num_school_classes = mysqli_num_rows($checkschools);

                            while ($school_data = mysqli_fetch_assoc($checkschools)){
                                $id = $school_data['id'];
                                $school_name = $school_data['name'];
                                $school_name_shrt = $school_data['short_name'];
                                $school_location = $school_data['location'];
                            }
                             $check_classes = mysqli_query($con, $sql = "SELECT * FROM `classes` WHERE school_id='".$id."' AND category='math'");

                             while ($class_data = mysqli_fetch_assoc($check_classes)){
                                $school = $class_data['school_name'];
                                $class = $class_data['name'];
                                $teacher = $class_data['id'];
                                $school_id = $class_data['school_id'];
                                $teacher_name = $class_data['class_type'];
                                $teachername = ucwords(str_replace("_", "", strstr($teacher_name, '_'))); //remove everything behind _, then replace _ with nothing, then capitalize ucwords    
                                if ($teachername == null){
                                echo '
                                <a href="#" class="school-class-div w-inline-block"><img src="./school_files/5b6113197eaecbbaf1de75e0_icons8-back-to-64.png" width="32" class="a">
                                    <div class="semi-bold margin-10l">'.$class.'</div>
                                    <div class="message-time margin-10l">23 Students</div>
                                </a>
                                
                                ';
                                }
                            }
                            ?>
                            
                            
                        </div>
                    </div>
                </div><?php } ?>
                    <?php
                             $check_classes = mysqli_query($con, $sql = "SELECT * FROM `classes` WHERE school_id='".$id."' AND category='english'");
                            $num_school_classes = mysqli_num_rows($check_classes);
                            if ($num_school_classes > 0){
                                
                            
                       ?>
                <div class="notification-class-div w-clearfix"><img src="./school_files/5b52ea43e5d2a8589d98b019_icons8-sort-down-filled-100.png" width="10" class="school-min" style="transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(180deg) skew(0deg, 0deg); transform-style: preserve-3d;">
                    <div class="notification-class-title">
                        <div><strong>English</strong></div>
                    </div>
                    <div class="min-div inverse" style="transform: translate3d(0px, -50px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d; opacity: 0;">
                        <div class="school-class-main-div">
                              <?php 
                            $checkschools = mysqli_query($con, "SELECT * FROM `schools` WHERE id='".$schoolurl."'");//gets class entry in database
                            while ($school_data = mysqli_fetch_assoc($checkschools)){
                                $id = $school_data['id'];
                                $school_name = $school_data['name'];
                                $school_name_shrt = $school_data['short_name'];
                                $school_location = $school_data['location'];
                            }
                             $check_classes = mysqli_query($con, $sql = "SELECT * FROM `classes` WHERE school_id='".$id."' AND category='english'");

                             while ($class_data = mysqli_fetch_assoc($check_classes)){
                                $school = $class_data['school_name'];
                                $class = $class_data['name'];
                                $teacher = $class_data['id'];
                                $school_id = $class_data['school_id'];
                                $teacher_name = $class_data['class_type'];
                                $teachername = ucwords(str_replace("_", "", strstr($teacher_name, '_'))); //remove everything behind _, then replace _ with nothing, then capitalize ucwords    
                                if ($teachername == null){
                                echo '
                                <a href="#" class="school-class-div w-inline-block"><img src="./school_files/5b6113197eaecbbaf1de75e0_icons8-back-to-64.png" width="32" class="a">
                                    <div class="semi-bold margin-10l">'.$class.'</div>
                                    <div class="message-time margin-10l">23 Students</div>
                                </a>
                                
                                ';
                                }
                            }
                            ?>
                            
                            
                        </div>
                    </div>
                </div><?php } ?>
                    <?php
                             $check_classes = mysqli_query($con, $sql = "SELECT * FROM `classes` WHERE school_id='".$id."' AND category='science'");
                            $num_school_classes = mysqli_num_rows($check_classes);
                            if ($num_school_classes > 0){
                                
                            
                       ?>
                <div class="notification-class-div w-clearfix"><img src="./school_files/5b52ea43e5d2a8589d98b019_icons8-sort-down-filled-100.png" width="10" data-w-id="1db9e2d9-e8e6-6e87-c063-ed26fbcf33e6" style="transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(180deg) skew(0deg, 0deg); transform-style: preserve-3d;" class="school-min">
                    <div class="notification-class-title">
                        <div><strong>Science</strong></div>
                    </div>
                    <div style="transform: translate3d(0px, -50px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); opacity: 0; transform-style: preserve-3d;" class="min-div inverse">
                        <div class="school-class-main-div">
                              <?php 
                            $checkschools = mysqli_query($con, "SELECT * FROM `schools` WHERE id='".$schoolurl."'");//gets class entry in database
                            while ($school_data = mysqli_fetch_assoc($checkschools)){
                                $id = $school_data['id'];
                                $school_name = $school_data['name'];
                                $school_name_shrt = $school_data['short_name'];
                                $school_location = $school_data['location'];
                            }
                             $check_classes = mysqli_query($con, $sql = "SELECT * FROM `classes` WHERE school_id='".$id."' AND category='science'");

                             while ($class_data = mysqli_fetch_assoc($check_classes)){
                                $school = $class_data['school_name'];
                                $class = $class_data['name'];
                                $teacher = $class_data['id'];
                                $school_id = $class_data['school_id'];
                                $teacher_name = $class_data['class_type'];
                                $teachername = ucwords(str_replace("_", "", strstr($teacher_name, '_'))); //remove everything behind _, then replace _ with nothing, then capitalize ucwords    
                                if ($teachername == null){
                                echo '
                                <a href="#" class="school-class-div w-inline-block"><img src="./school_files/5b6113197eaecbbaf1de75e0_icons8-back-to-64.png" width="32" class="a">
                                    <div class="semi-bold margin-10l">'.$class.'</div>
                                    <div class="message-time margin-10l">23 Students</div>
                                </a>
                                
                                ';
                                }
                            }
                            ?>
                            
                           
                           
                        </div>
                    </div>
                </div><?php } ?>
                   <?php
                             $check_classes = mysqli_query($con, $sql = "SELECT * FROM `classes` WHERE school_id='".$id."' AND category='social_studies'");
                            $num_school_classes = mysqli_num_rows($check_classes);
                            if ($num_school_classes > 0){
                                
                            
                       ?>
                <div class="notification-class-div w-clearfix"><img src="./school_files/5b52ea43e5d2a8589d98b019_icons8-sort-down-filled-100.png" width="10" data-w-id="8f0f2c22-cdb3-0885-5d63-b00df69a7293" style="transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(180deg) skew(0deg, 0deg); transform-style: preserve-3d;" class="school-min">
                    <div class="notification-class-title">
                        <div><strong>Social Studies</strong></div>
                    </div>
                    <div style="transform: translate3d(0px, -50px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); opacity: 0; transform-style: preserve-3d;" class="min-div inverse">
                    
                       
                        <div class="school-class-main-div">
                              <?php 
                            $checkschools = mysqli_query($con, "SELECT * FROM `schools` WHERE id='".$schoolurl."'");//gets class entry in database
                            $num_school_classes = mysqli_num_rows($checkschools);

                            while ($school_data = mysqli_fetch_assoc($checkschools)){
                                $id = $school_data['id'];
                                $school_name = $school_data['name'];
                                $school_name_shrt = $school_data['short_name'];
                                $school_location = $school_data['location'];
                            }
                             $check_classes = mysqli_query($con, $sql = "SELECT * FROM `classes` WHERE school_id='".$id."' AND category='social_studies'");

                             while ($class_data = mysqli_fetch_assoc($check_classes)){
                                $school = $class_data['school_name'];
                                $class = $class_data['name'];
                                $teacher = $class_data['id'];
                                $school_id = $class_data['school_id'];
                                $teacher_name = $class_data['class_type'];
                                $teachername = ucwords(str_replace("_", "", strstr($teacher_name, '_'))); //remove everything behind _, then replace _ with nothing, then capitalize ucwords    
                                if ($teachername == null){
                                echo '
                                <a href="#" class="school-class-div w-inline-block"><img src="./school_files/5b6113197eaecbbaf1de75e0_icons8-back-to-64.png" width="32" class="a">
                                    <div class="semi-bold margin-10l">'.$class.'</div>
                                    <div class="message-time margin-10l">23 Students</div>
                                </a>
                                
                                ';
                                }
                            }
                            ?>
                            
                        </div>
                        
                    </div>
                </div>
                <?php 
                            }
                        ?>
                            <?php
                             $check_classes = mysqli_query($con, $sql = "SELECT * FROM `classes` WHERE school_id='".$id."' AND category='healthful_living'");
                            $num_school_classes = mysqli_num_rows($check_classes);
                            if ($num_school_classes > 0){
                                
                            
                       ?>
                <div class="notification-class-div w-clearfix"><img src="./school_files/5b52ea43e5d2a8589d98b019_icons8-sort-down-filled-100.png" width="10" data-w-id="04d17c05-9d0d-10a8-65b6-b691854c7bc4" style="transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(180deg) skew(0deg, 0deg); transform-style: preserve-3d;" class="school-min">
                    <div class="notification-class-title">
                        <div><strong>Healthful Living</strong></div>
                    </div>
                    <div style="transform: translate3d(0px, -50px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); opacity: 0; transform-style: preserve-3d;" class="min-div inverse">
                        <div class="school-class-main-div">
                              <?php 
                            $checkschools = mysqli_query($con, "SELECT * FROM `schools` WHERE id='".$schoolurl."'");//gets class entry in database
                            while ($school_data = mysqli_fetch_assoc($checkschools)){
                                $id = $school_data['id'];
                                $school_name = $school_data['name'];
                                $school_name_shrt = $school_data['short_name'];
                                $school_location = $school_data['location'];
                            }
                             $check_classes = mysqli_query($con, $sql = "SELECT * FROM `classes` WHERE school_id='".$id."' AND category='healthful_living'");

                             while ($class_data = mysqli_fetch_assoc($check_classes)){
                                $school = $class_data['school_name'];
                                $class = $class_data['name'];
                                $teacher = $class_data['id'];
                                $school_id = $class_data['school_id'];
                                $teacher_name = $class_data['class_type'];
                                $teachername = ucwords(str_replace("_", "", strstr($teacher_name, '_'))); //remove everything behind _, then replace _ with nothing, then capitalize ucwords    
                                if ($teachername == null){
                                echo '
                                <a href="#" class="school-class-div w-inline-block"><img src="./school_files/5b6113197eaecbbaf1de75e0_icons8-back-to-64.png" width="32" class="a">
                                    <div class="semi-bold margin-10l">'.$class.'</div>
                                    <div class="message-time margin-10l">23 Students</div>
                                </a>
                                
                                ';
                                }
                            }
                            ?>
                            
                        </div>
                    </div>
                </div><?php } ?>
                    <?php
                             $check_classes = mysqli_query($con, $sql = "SELECT * FROM `classes` WHERE school_id='".$id."' AND category='world_language'");
                            $num_school_classes = mysqli_num_rows($check_classes);
                            if ($num_school_classes > 0){
                                
                            
                       ?>
                <div class="notification-class-div w-clearfix"><img src="./school_files/5b52ea43e5d2a8589d98b019_icons8-sort-down-filled-100.png" width="10" data-w-id="200ce5e8-e1e0-046c-6c19-7dc3cde0e0aa" style="transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(180deg) skew(0deg, 0deg); transform-style: preserve-3d;" class="school-min">
                    <div class="notification-class-title">
                        <div><strong>World Language</strong></div>
                    </div>
                    <div style="transform: translate3d(0px, -50px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); opacity: 0; transform-style: preserve-3d;" class="min-div inverse">
                        <div class="school-class-main-div">
                            <a href="#" class="school-class-div w-inline-block"><img src="./school_files/5b6113197eaecbbaf1de75e0_icons8-back-to-64.png" width="32" class="a">
                                <div class="semi-bold margin-10l">Math I</div>
                                <div class="message-time margin-10l">23 Students</div>
                            </a>
                            <a href="#" class="school-class-div w-inline-block"><img src="./school_files/5b6113197eaecbbaf1de75e0_icons8-back-to-64.png" width="32" class="a">
                                <div class="semi-bold margin-10l">Math II</div>
                                <div class="message-time margin-10l">31 Students</div>
                            </a>
                            <a href="#" class="school-class-div w-inline-block"><img src="./school_files/5b6113197eaecbbaf1de75e0_icons8-back-to-64.png" width="32" class="a">
                                <div class="semi-bold margin-10l">Math III</div>
                                <div class="message-time margin-10l">23 Students</div>
                            </a>
                            <a href="#" class="school-class-div w-inline-block"><img src="./school_files/5b6113197eaecbbaf1de75e0_icons8-back-to-64.png" width="32" class="a">
                                <div class="semi-bold margin-10l">Pre-Calculus</div>
                                <div class="message-time margin-10l">23 Students</div>
                            </a>
                            <a href="#" class="school-class-div w-inline-block"><img src="./school_files/5b6113197eaecbbaf1de75e0_icons8-back-to-64.png" width="32" class="a">
                                <div class="semi-bold margin-10l">Calculus AB</div>
                                <div class="message-time margin-10l">23 Students</div>
                            </a>
                            <a href="#" class="school-class-div w-inline-block"><img src="./school_files/5b6113197eaecbbaf1de75e0_icons8-back-to-64.png" width="32" class="a">
                                <div class="semi-bold margin-10l">Calculus BC</div>
                                <div class="message-time margin-10l">23 Students</div>
                            </a>
                            <a href="#" class="school-class-div w-inline-block"><img src="./school_files/5b6113197eaecbbaf1de75e0_icons8-back-to-64.png" width="32" class="a">
                                <div class="semi-bold margin-10l">ICM</div>
                                <div class="message-time margin-10l">23 Students</div>
                            </a>
                            <a href="#" class="school-class-div w-inline-block"><img src="./school_files/5b6113197eaecbbaf1de75e0_icons8-back-to-64.png" width="32" class="a">
                                <div class="semi-bold margin-10l">Statistics</div>
                                <div class="message-time margin-10l">23 Students</div>
                            </a>
                        </div>
                    </div>
                </div><?php } ?>
                    <?php
                             $check_classes = mysqli_query($con, $sql = "SELECT * FROM `classes` WHERE school_id='".$id."' AND category='arts_education'");
                            $num_school_classes = mysqli_num_rows($check_classes);
                            if ($num_school_classes > 0){
                                
                            
                       ?>
                <div class="notification-class-div w-clearfix"><img src="./school_files/5b52ea43e5d2a8589d98b019_icons8-sort-down-filled-100.png" width="10" data-w-id="2cc5e6b2-c44e-48f4-f6f6-2deaaaf2169a" style="transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(180deg) skew(0deg, 0deg); transform-style: preserve-3d;" class="school-min">
                    <div class="notification-class-title">
                        <div><strong>Arts Education</strong></div>
                    </div>
                    <div style="transform: translate3d(0px, -50px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); opacity: 0; transform-style: preserve-3d;" class="min-div inverse">
                        <div class="school-class-main-div">
                              <?php 
                            $checkschools = mysqli_query($con, "SELECT * FROM `schools` WHERE id='".$schoolurl."'");//gets class entry in database
                            while ($school_data = mysqli_fetch_assoc($checkschools)){
                                $id = $school_data['id'];
                                $school_name = $school_data['name'];
                                $school_name_shrt = $school_data['short_name'];
                                $school_location = $school_data['location'];
                            }
                             $check_classes = mysqli_query($con, $sql = "SELECT * FROM `classes` WHERE school_id='".$id."' AND category='art_education'");

                             while ($class_data = mysqli_fetch_assoc($check_classes)){
                                $school = $class_data['school_name'];
                                $class = $class_data['name'];
                                $teacher = $class_data['id'];
                                $school_id = $class_data['school_id'];
                                $teacher_name = $class_data['class_type'];
                                $teachername = ucwords(str_replace("_", "", strstr($teacher_name, '_'))); //remove everything behind _, then replace _ with nothing, then capitalize ucwords    
                                if ($teachername == null){
                                echo '
                                <a href="#" class="school-class-div w-inline-block"><img src="./school_files/5b6113197eaecbbaf1de75e0_icons8-back-to-64.png" width="32" class="a">
                                    <div class="semi-bold margin-10l">'.$class.'</div>
                                    <div class="message-time margin-10l">23 Students</div>
                                </a>
                                
                                ';
                                }
                            }
                            ?>
                            
                        </div>
                    </div>
                </div><?php } ?>
                    <?php
                             $check_classes = mysqli_query($con, $sql = "SELECT * FROM `classes` WHERE school_id='".$id."' AND category='cte'");
                            $num_school_classes = mysqli_num_rows($check_classes);
                            if ($num_school_classes > 0){
                                
                            
                       ?>
                <div class="notification-class-div w-clearfix"><img src="./school_files/5b52ea43e5d2a8589d98b019_icons8-sort-down-filled-100.png" width="10" data-w-id="9d49610c-abfb-ce0b-6afa-15cc751642a2" style="transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(180deg) skew(0deg, 0deg); transform-style: preserve-3d;" class="school-min">
                    <div class="notification-class-title">
                        <div><strong>CTE</strong></div>
                    </div>
                    <div style="transform: translate3d(0px, -50px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); opacity: 0; transform-style: preserve-3d;" class="min-div inverse">
                        <div class="school-class-main-div">
                              <?php 
                            $checkschools = mysqli_query($con, "SELECT * FROM `schools` WHERE id='".$schoolurl."'");//gets class entry in database
                            while ($school_data = mysqli_fetch_assoc($checkschools)){
                                $id = $school_data['id'];
                                $school_name = $school_data['name'];
                                $school_name_shrt = $school_data['short_name'];
                                $school_location = $school_data['location'];
                            }
                             $check_classes = mysqli_query($con, $sql = "SELECT * FROM `classes` WHERE school_id='".$id."' AND category='cte'");

                             while ($class_data = mysqli_fetch_assoc($check_classes)){
                                $school = $class_data['school_name'];
                                $class = $class_data['name'];
                                $teacher = $class_data['id'];
                                $school_id = $class_data['school_id'];
                                $teacher_name = $class_data['class_type'];
                                $teachername = ucwords(str_replace("_", "", strstr($teacher_name, '_'))); //remove everything behind _, then replace _ with nothing, then capitalize ucwords    
                                if ($teachername == null){
                                echo '
                                <a href="#" class="school-class-div w-inline-block"><img src="./school_files/5b6113197eaecbbaf1de75e0_icons8-back-to-64.png" width="32" class="a">
                                    <div class="semi-bold margin-10l">'.$class.'</div>
                                    <div class="message-time margin-10l">23 Students</div>
                                </a>
                                
                                ';
                                }
                            }
                            ?>
                            
                        </div>
                    </div>
                </div><?php } ?>
                    <?php
                             $check_classes = mysqli_query($con, $sql = "SELECT * FROM `classes` WHERE school_id='".$id."' AND category='special_ed'");
                            $num_school_classes = mysqli_num_rows($check_classes);
                            if ($num_school_classes > 0){
                                
                            
                       ?>
                <div class="notification-class-div w-clearfix"><img src="./school_files/5b52ea43e5d2a8589d98b019_icons8-sort-down-filled-100.png" width="10" data-w-id="1f121cfb-328f-a951-be1a-076b14663838" style="transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(180deg) skew(0deg, 0deg); transform-style: preserve-3d;" class="school-min">
                    <div class="notification-class-title">
                        <div><strong>Special Ed</strong></div>
                    </div>
                    <div style="transform: translate3d(0px, -50px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); opacity: 0; transform-style: preserve-3d;" class="min-div inverse">
                        <div class="school-class-main-div">
                             <?php 
                            $checkschools = mysqli_query($con, "SELECT * FROM `schools` WHERE id='".$schoolurl."'");//gets class entry in database
                            while ($school_data = mysqli_fetch_assoc($checkschools)){
                                $id = $school_data['id'];
                                $school_name = $school_data['name'];
                                $school_name_shrt = $school_data['short_name'];
                                $school_location = $school_data['location'];
                            }
                             $check_classes = mysqli_query($con, $sql = "SELECT * FROM `classes` WHERE school_id='".$id."' AND category='special_ed'");

                             while ($class_data = mysqli_fetch_assoc($check_classes)){
                                $school = $class_data['school_name'];
                                $class = $class_data['name'];
                                $teacher = $class_data['id'];
                                $school_id = $class_data['school_id'];
                                $teacher_name = $class_data['class_type'];
                                $teachername = ucwords(str_replace("_", "", strstr($teacher_name, '_'))); //remove everything behind _, then replace _ with nothing, then capitalize ucwords    
                                if ($teachername == null){
                                echo '
                                <a href="#" class="school-class-div w-inline-block"><img src="./school_files/5b6113197eaecbbaf1de75e0_icons8-back-to-64.png" width="32" class="a">
                                    <div class="semi-bold margin-10l">'.$class.'</div>
                                    <div class="message-time margin-10l">23 Students</div>
                                </a>
                                
                                ';
                                }
                            }
                            ?>
                            
                        </div>
                    </div>
                </div><?php } ?>
                    <?php
                             $check_classes = mysqli_query($con, $sql = "SELECT * FROM `classes` WHERE school_id='".$id."' AND category='esl'");
                            $num_school_classes = mysqli_num_rows($check_classes);
                            if ($num_school_classes > 0){
                                
                            
                       ?>
                <div class="notification-class-div w-clearfix"><img src="./school_files/5b52ea43e5d2a8589d98b019_icons8-sort-down-filled-100.png" width="10" data-w-id="42302b10-79dc-a0a1-6eba-b24a5547a2ce" style="transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(180deg) skew(0deg, 0deg); transform-style: preserve-3d;" class="school-min">
                    <div class="notification-class-title">
                        <div><strong>ESL</strong></div>
                    </div>
                    <div style="transform: translate3d(0px, -50px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); opacity: 0; transform-style: preserve-3d;" class="min-div inverse">
                        <div class="school-class-main-div">
                             <?php 
                            $checkschools = mysqli_query($con, "SELECT * FROM `schools` WHERE id='".$schoolurl."'");//gets class entry in database
                            while ($school_data = mysqli_fetch_assoc($checkschools)){
                                $id = $school_data['id'];
                                $school_name = $school_data['name'];
                                $school_name_shrt = $school_data['short_name'];
                                $school_location = $school_data['location'];
                            }
                             $check_classes = mysqli_query($con, $sql = "SELECT * FROM `classes` WHERE school_id='".$id."' AND category='esl'");

                             while ($class_data = mysqli_fetch_assoc($check_classes)){
                                $school = $class_data['school_name'];
                                $class = $class_data['name'];
                                $teacher = $class_data['id'];
                                $school_id = $class_data['school_id'];
                                $teacher_name = $class_data['class_type'];
                                $teachername = ucwords(str_replace("_", "", strstr($teacher_name, '_'))); //remove everything behind _, then replace _ with nothing, then capitalize ucwords    
                                if ($teachername == null){
                                echo '
                                <a href="#" class="school-class-div w-inline-block"><img src="./school_files/5b6113197eaecbbaf1de75e0_icons8-back-to-64.png" width="32" class="a">
                                    <div class="semi-bold margin-10l">'.$class.'</div>
                                    <div class="message-time margin-10l">23 Students</div>
                                </a>
                                
                                ';
                                }
                            }
                            ?>
                            
                        </div>
                    </div>
                </div><?php } ?>
            </div>
        </div>
    </div>
    <script src="./school_files/jquery-3.3.1.min.js.download" type="text/javascript" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="./school_files/webflow.35742d8f7.js.download" type="text/javascript"></script>
    <!--[if lte IE 9]><script src="//cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif]-->

</body>

</html>
<?php
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
    ?>