<?php
    session_start();
    require("connect.php");
    if ($_SESSION["username"]){
    $username = $_SESSION["username"];
    $check_u = mysqli_query($con, "SELECT * FROM users WHERE email='".$username."'");
    while ($row_u = mysqli_fetch_assoc($check_u)){
        $fname = $row_u['fname'];
        $lname = $row_u['lname'];
        $uname = $row_u['username'];
        $classesConcat = ($row_u['classes_id']);
    }
?>
<!DOCTYPE html>
<html data-wf-domain="studentscholar.webflow.io" data-wf-page="5b5782183038015297cd9e27" data-wf-site="5b52d603ff2e004c39c15224" data-wf-status="1" class="w-mod-js w-mod-touch wf-poppins-n4-active wf-poppins-n5-active wf-poppins-n6-active wf-poppins-n7-active wf-poppins-n8-active wf-active">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Student Scholar</title>
    <?php require 'studentscholar_files/head.php'; ?>
</head>

<body>
    <div class="body-div tall">
        <?php require 'studentscholar_files/header.php'; ?>
        <div class="section gradient-blue">
            <div class="container margin-no-top w-container">
                <h2>Welcome Back <?php echo $fname . ' ' . $lname?>!</h2>
                <div class="notif-welcome-classes">
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
                                <a href="/class.php?school='.$school_id.'&class='.$class_url.'" class="notif-welcome-class-div w-inline-block">
                                    <div>'.$classname.'</div>
                                </a>';
                                    }

                               
                            } 
                           
                    ?>
                   <!--
                    <a href="/school/panthercreekhs/classes/calculusbc" class="notif-welcome-class-div w-inline-block">
                        <div>Calculus BC</div>
                    </a>
                    <a href="/#" class="notif-welcome-class-div w-inline-block">
                        <div>Computer Science</div>
                    </a>
                    <a href="/#" class="notif-welcome-class-div w-inline-block">
                        <div>United States History</div>
                    </a>
                    <a href="/#" class="notif-welcome-class-div w-inline-block">
                        <div>English</div>
                    </a>
                    <a href="/#" class="notif-welcome-class-div w-inline-block">
                        <div>Computer Science Principles</div>
                    </a>-->
                </div>
            </div>
            <div class="container invisible w-container"><img src="./dashboard_files/5b52ea43e5d2a8589d98b019_icons8-sort-down-filled-100.png" width="10" class="notif-min">
                <div class="notification-class-title"><img src="./dashboard_files/5b535ceaeadb587329b81bb7_icons8-search-128 (1).png" width="25">
                    <div class="margin-10l"><strong>Search for Schools</strong></div>
                </div>
                <a href="/#" class="notification-message-div empty w-inline-block">
                    <div class="nav-search"><img src="./dashboard_files/5b535ceaeadb587329b81bb7_icons8-search-128 (1).png" width="32" class="w-hidden-small w-hidden-tiny">
                        <input type="text" class="input w-input" maxlength="256" name="field-3" data-name="Field 3" placeholder="Search for schools" id="field-3" required="">
                    </div>
                </a>
            </div>
            <div class="container invisible w-container"><img src="./dashboard_files/5b52ea43e5d2a8589d98b019_icons8-sort-down-filled-100.png" width="10" class="notif-min">
                <div class="notification-class-title"><img src="./dashboard_files/5b5ee15c89ff9c51a9254d3d_icons8-key-2-64.png" width="25">
                    <div class="margin-10l"><strong>Invites</strong></div>
                </div><img src="./dashboard_files/5b54bb2beadb5834c6b8cce7_icons8-delete-64.png" width="32" data-w-id="938e12ea-bb7f-0346-e4fb-4d505509dd65" class="notif-cancel" style="opacity: 0; transform: translate3d(25px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;">
                <a href="/#" class="notification-message-div margin-5b w-inline-block">
                    <div class="flex-horcent"><img src="./dashboard_files/5b5ee1903a82216c08f07b13_icons8-padlock-64.png" width="32">
                        <div class="semi-bold margin-10l">Bob Bobstein invited you to Civics 101!</div>
                    </div>
                    <div class="message-time margin-10l">5:58 Am</div>
                </a>
                <a href="/#" class="notification-message-div margin-5b w-inline-block">
                    <div class="flex-horcent"><img src="./dashboard_files/5b5ee1903a82216c08f07b13_icons8-padlock-64.png" width="32">
                        <div class="semi-bold margin-10l">Tim Tulip invited you to Microsoft Excel!</div>
                        <div class="message-time margin-10l">5:58 Am</div>
                    </div>
                </a>
            </div>
            <div class="container invisible w-container"><img src="./dashboard_files/5b52ea43e5d2a8589d98b019_icons8-sort-down-filled-100.png" width="10" class="notif-min">
                <div class="notification-class-title"><img src="./dashboard_files/5b64f14ff109cf23cfd77b61_icons8-advertising-64.png" width="25">
                    <div class="margin-10l"><strong>Announcements</strong></div>
                </div><img src="./dashboard_files/5b54bb2beadb5834c6b8cce7_icons8-delete-64.png" width="32" data-w-id="e3d34c18-4650-6a1f-8bae-50fce1f44655" class="notif-cancel" style="opacity: 0; transform: translate3d(25px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;">
                <a href="/#" class="notification-message-div margin-5b w-inline-block">
                    <div class="flex-horcent"><img src="./dashboard_files/5b61f07ca5fc3aa8e8d0f98d_icons8-traditional-school-bus-64.png" width="32">
                        <div class="semi-bold margin-10l">PCHS: Bob Bobstein is now Class of 2019 Student Representative</div>
                    </div>
                    <div class="message-time margin-10l">5:58 Am</div>
                </a>
                <a href="/#" class="notification-message-div margin-5b w-inline-block">
                    <div class="flex-horcent"><img src="./dashboard_files/5b61f07ca5fc3aa8e8d0f98d_icons8-traditional-school-bus-64.png" width="32">
                        <div class="semi-bold margin-10l">PCHS: Anyone seniors interested in being student reps come to Room 1819</div>
                    </div>
                    <div class="message-time margin-10l">3 days ago, 3:14 pm</div>
                </a>
            </div>
            <div class="container invisible w-container"><img src="./dashboard_files/5b52ea43e5d2a8589d98b019_icons8-sort-down-filled-100.png" width="10" class="notif-min">
                <div class="notification-class-title"><img src="./dashboard_files/5b52daf09b226878c62b5276_icons8-secured-letter-100.png" width="25">
                    <div class="margin-10l"><strong>Messages</strong></div>
                </div><img src="./dashboard_files/5b54bb2beadb5834c6b8cce7_icons8-delete-64.png" width="32" data-w-id="88e0ccc6-9ed2-91f2-68df-c9e22f957dea" class="notif-cancel" style="opacity: 0; transform: translate3d(25px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;">
                <a href="/#" class="notification-message-div margin-5b w-inline-block">
                    <div class="flex-horcent"><img src="./dashboard_files/5b5eb0f1c3f7cb760f48e8da_icons8-chat-room-64.png" width="32">
                        <div class="semi-bold margin-10l">19 New Messages</div>
                    </div>
                    <div class="message-time margin-10l">Yesterday, 4:15 pm</div>
                </a>
            </div>
            <div class="container invisible w-container">
                <div class="notification-class-div">
                    <div class="w-clearfix"><img src="./dashboard_files/5b52ea43e5d2a8589d98b019_icons8-sort-down-filled-100.png" width="10" data-w-id="8b882f1b-03e5-b298-99fa-3f04ee2d8fff" class="notif-min">
                        <div class="notification-class-title">
                            <div><a href="/school/panthercreekhs/classes/calculusbc"><strong>Calculus BC</strong></a></div>
                        </div><img src="./dashboard_files/5b54bb2beadb5834c6b8cce7_icons8-delete-64.png" width="32" data-w-id="7373949c-ce86-553d-db87-974f98a06183" class="notif-cancel" style="opacity: 0; transform: translate3d(25px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;">
                        <a href="/#" data-w-id="7e12ea5e-0142-53b3-8970-4fa609ce51cb" class="notification-message-div w-inline-block">
                            <div class="flex-horcent wrap"><img src="./dashboard_files/5b5e7ddee90d4808d9a342d3_icons8-communication-64.png" width="32">
                                <div class="semi-bold margin-10l">3 New Messages</div>
                                <div class="message-time margin-10l">5:58 Am</div>
                            </div>
                            <div class="flex-horcent wrap margin-15l"><img src="./dashboard_files/5b5e7def2461b302e85cc7b4_icons8-news-64.png" width="32">
                                <div class="semi-bold margin-10l">2 New Forum Posts</div>
                                <div class="message-time margin-10l">5:58 Am</div>
                            </div>
                        </a>
                    </div>
                    <div class="margin-5b margin-15l w-clearfix"><img src="./dashboard_files/5b52ea43e5d2a8589d98b019_icons8-sort-down-filled-100.png" width="10" class="notif-min">
                        <div class="notification-class-title teacher">
                            <div><strong>Zimora</strong></div>
                        </div><img src="./dashboard_files/5b54bb2beadb5834c6b8cce7_icons8-delete-64.png" width="32" data-w-id="aef97e34-1370-8bfb-04c3-58a35a59f57e" class="notif-cancel" style="opacity: 0; transform: translate3d(25px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;">
                        <a href="/#" data-w-id="11f84537-0bdb-dfc4-90a0-b7ab0e778e5f" class="notification-message-div w-inline-block">
                            <div class="flex-horcent wrap"><img src="./dashboard_files/5b5e7def2461b302e85cc7b4_icons8-news-64.png" width="32">
                                <div class="semi-bold margin-10l">2 New Forum Posts</div>
                                <div class="message-time margin-10l">5:58 Am</div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="notification-class-div">
                    <div class="w-clearfix"><img src="./dashboard_files/5b52ea43e5d2a8589d98b019_icons8-sort-down-filled-100.png" width="10" class="notif-min">
                        <div class="notification-class-title">
                            <div><strong>Computer Science</strong></div>
                        </div><img src="./dashboard_files/5b54bb2beadb5834c6b8cce7_icons8-delete-64.png" width="32" data-w-id="2b5e3e56-90e4-15d0-9664-c23eb5d267cb" class="notif-cancel" style="opacity: 0; transform: translate3d(25px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;">
                        <a href="/#" class="notification-message-div w-inline-block">
                            <div class="flex-horcent wrap"><img src="./dashboard_files/5b5e7ddee90d4808d9a342d3_icons8-communication-64.png" width="32">
                                <div class="semi-bold margin-10l">3 New Messages</div>
                                <div class="message-time margin-10l">5:58 Am</div>
                            </div>
                            <div class="flex-horcent margin-15l wrap"><img src="./dashboard_files/5b5e7def2461b302e85cc7b4_icons8-news-64.png" width="32">
                                <div class="semi-bold margin-10l">2 New Forum Posts</div>
                                <div class="message-time margin-10l">5:58 Am</div>
                            </div>
                        </a>
                    </div>
                    <div class="margin-5b margin-15l w-clearfix"><img src="./dashboard_files/5b52ea43e5d2a8589d98b019_icons8-sort-down-filled-100.png" width="10" class="notif-min">
                        <div class="notification-class-title teacher">
                            <div><strong>Letts</strong></div>
                        </div><img src="./dashboard_files/5b54bb2beadb5834c6b8cce7_icons8-delete-64.png" width="32" data-w-id="af5ecabf-3d74-dbac-bf6c-3697a1a36131" class="notif-cancel" style="opacity: 0; transform: translate3d(25px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;">
                        <a href="/#" class="notification-message-div w-inline-block">
                            <div class="flex-horcent wrap"><img src="./dashboard_files/5b5e7ddee90d4808d9a342d3_icons8-communication-64.png" width="32">
                                <div class="semi-bold margin-10l">13 New Messages</div>
                                <div class="message-time margin-10l">5:58 Am</div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="notification-class-div">
                    <div class="w-clearfix"><img src="./dashboard_files/5b52ea43e5d2a8589d98b019_icons8-sort-down-filled-100.png" width="10" class="notif-min">
                        <div class="notification-class-title">
                            <div><strong>United States History</strong></div>
                        </div><img src="./dashboard_files/5b54bb2beadb5834c6b8cce7_icons8-delete-64.png" width="32" data-w-id="b0fdfa05-93ed-503c-2d67-fe88fec15e48" class="notif-cancel" style="opacity: 0; transform: translate3d(25px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;">
                        <a href="/#" class="notification-message-div w-inline-block">
                            <div class="flex-horcent wrap"><img src="./dashboard_files/5b5e7ddee90d4808d9a342d3_icons8-communication-64.png" width="32">
                                <div class="semi-bold margin-10l">3 New Messages</div>
                                <div class="message-time margin-10l">5:58 Am</div>
                            </div>
                            <div class="flex-horcent wrap margin-15l"><img src="./dashboard_files/5b5e7def2461b302e85cc7b4_icons8-news-64.png" width="32">
                                <div class="semi-bold margin-10l">2 New Forum Posts</div>
                                <div class="message-time margin-10l">5:58 Am</div>
                            </div>
                        </a>
                    </div>
                    <div class="margin-5b margin-15l w-clearfix"><img src="./dashboard_files/5b52ea43e5d2a8589d98b019_icons8-sort-down-filled-100.png" width="10" class="notif-min">
                        <div class="notification-class-title teacher">
                            <div><strong>Leininger</strong></div>
                        </div><img src="./dashboard_files/5b54bb2beadb5834c6b8cce7_icons8-delete-64.png" width="32" data-w-id="74d54239-1f65-fc0e-67af-4d0686a5368c" class="notif-cancel" style="opacity: 0; transform: translate3d(25px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;">
                        <a href="/#" class="notification-message-div w-inline-block">
                            <div class="flex-horcent wrap"><img src="./dashboard_files/5b5e7def2461b302e85cc7b4_icons8-news-64.png" width="32">
                                <div class="semi-bold margin-10l">2 New Forum Posts</div>
                                <div class="message-time margin-10l">5:58 Am</div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="notification-class-div">
                    <div class="w-clearfix"><img src="./dashboard_files/5b52ea43e5d2a8589d98b019_icons8-sort-down-filled-100.png" width="10" class="notif-min">
                        <div class="notification-class-title">
                            <div><strong>Computer Science Principles</strong></div>
                        </div><img src="./dashboard_files/5b54bb2beadb5834c6b8cce7_icons8-delete-64.png" width="32" data-w-id="bfc0d8ae-da97-67bd-cff3-a8bd90076e86" class="notif-cancel" style="opacity: 0; transform: translate3d(25px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;">
                        <a href="/#" class="notification-message-div w-inline-block">
                            <div class="flex-horcent wrap"><img src="./dashboard_files/5b5e7ddee90d4808d9a342d3_icons8-communication-64.png" width="32">
                                <div class="semi-bold margin-10l">61 New Messages</div>
                                <div class="message-time margin-10l">5:58 Am</div>
                            </div>
                            <div class="flex-horcent wrap margin-15l"><img src="./dashboard_files/5b5e7def2461b302e85cc7b4_icons8-news-64.png" width="32">
                                <div class="semi-bold margin-10l">21 New Forum Posts</div>
                                <div class="message-time margin-10l">5:58 Am</div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="home-container">
<?php
 $check = mysqli_query($con, "SELECT * FROM classes");
                            $num_classes = mysqli_num_rows($check);
                                                        for ($i = 0; $i < $unique_id_array_length + 1; $i++){

                            if ($num_classes % 2 == 0){
                                $first_half_amount = $num_classes / 2;
                                $second_half_amount = $num_classes / 2;
                                 $firstHalfClasses = mysqli_query($con, "SELECT * FROM `classes` WHERE id LIKE '".$unique_id_array[$i]."' LIMIT 0, $first_half_amount");
                                $secondHalfClasses = mysqli_query($con, "SELECT * FROM `classes` WHERE id LIKE '".$unique_id_array[$i]."' LIMIT $first_half_amount, $num_classes");
                                while ($row_e = mysqli_fetch_assoc($firstHalfClasses)){
                                    $school_id = $row_e['school_id'];
                                    $class_url =  $row_e['class_type'];
                                    $class_name = $row_e['name'];
                                    $teacherfinal = ucwords(str_replace("_", "", strstr($row_e['class_type'], '_'))); //remove everything behind _, then replace _ with nothing, then capitalize ucwords
                                    $bio = $row_e['bio'];
                                    echo '<div class="home-class-subdiv">
                                        <a href="/class.php?school='.$school_id.'&class='.$class_url.'" class="home-class-div w-inline-block">
                                            <h4 class="class-logo home">'.$class_name.' <strong class="class-logo teacher margin-5l">'.$teacherfinal.'</strong></h4>
                                            <p class="home-paragraph">'.$bio.'</p>
                                            <div class="home-announcement-div">
                                            <img src="./dashboard_files/5ba920e429384e855a3da2da_icons8-commercial-24.png" width="16" class="notif-image">
                                            <div class="color margin-10l">Unit 1 Test</div><div class="flex-stretch"></div>
                                            <div class="message-time margin-10l"><strong>Tuesday, Feb 3rd</strong></div>
                                            </div>
                                            <div class="home-announcement-div">
                                            <img src="./dashboard_files/5ba920e429384e855a3da2da_icons8-commercial-24.png" width="16" class="notif-image">
                                            <div class="color margin-10l">Study Guide Due</div>
                                            <div class="flex-stretch"></div>
                                            <div class="message-time margin-10l"><strong>Tuesday, Feb 3rd</strong></div></div><div class="home-announcement-div">
                                            <img src="./dashboard_files/5ba920e429384e855a3da2da_icons8-commercial-24.png" width="16" class="notif-image">
                                            <div class="color margin-10l">Pg. 31 - 32 #1-15 Odds</div><div class="flex-stretch"></div>
                                            <div class="message-time margin-10l"><strong>Monday, Feb 2nd</strong></div></div></a>

                                    </div>
                                    ';
                                }
                                
                            } else {
                                $first_half_amount = round($num_classes / 2);
                                $second_half_amount = $num_classes / 2;
                                 $firstHalfClasses = mysqli_query($con, "SELECT * FROM `classes` WHERE id LIKE '".$unique_id_array[$i]."' LIMIT 0, $first_half_amount");
                                $secondHalfClasses = mysqli_query($con, "SELECT * FROM `classes` WHERE id LIKE '".$unique_id_array[$i]."' LIMIT $first_half_amount, $num_classes");
                                while ($row_e = mysqli_fetch_assoc($firstHalfClasses)){
                                     $school_id = $row_e['school_id'];
                                    $class_url =  $row_e['class_type'];
                                    $class_name = $row_e['name'];
                                    $teacherfinal = ucwords(str_replace("_", "", strstr($row_e['class_type'], '_'))); //remove everything behind _, then replace _ with nothing, then capitalize ucwords
                                    $bio = $row_e['bio'];
                                    echo '<div class="home-class-subdiv">
                                        <a href="/class.php?school='.$school_id.'&class='.$class_url.'" class="home-class-div w-inline-block">
                                            <h4 class="class-logo home">'.$class_name.' <strong class="class-logo teacher margin-5l">'.$teacherfinal.'</strong></h4>
                                            <p class="home-paragraph">'.$bio.'</p>
                                            <div class="home-announcement-div">
                                            <img src="./dashboard_files/5ba920e429384e855a3da2da_icons8-commercial-24.png" width="16" class="notif-image">
                                            <div class="color margin-10l">Unit 1 Test</div><div class="flex-stretch"></div>
                                            <div class="message-time margin-10l"><strong>Tuesday, Feb 3rd</strong></div>
                                            </div>
                                            <div class="home-announcement-div">
                                            <img src="./dashboard_files/5ba920e429384e855a3da2da_icons8-commercial-24.png" width="16" class="notif-image">
                                            <div class="color margin-10l">Study Guide Due</div>
                                            <div class="flex-stretch"></div>
                                            <div class="message-time margin-10l"><strong>Tuesday, Feb 3rd</strong></div></div><div class="home-announcement-div">
                                            <img src="./dashboard_files/5ba920e429384e855a3da2da_icons8-commercial-24.png" width="16" class="notif-image">
                                            <div class="color margin-10l">Pg. 31 - 32 #1-15 Odds</div><div class="flex-stretch"></div>
                                            <div class="message-time margin-10l"><strong>Monday, Feb 2nd</strong></div></div></a>

                                    </div>
                                    ';
                                }
                            }
                                                        }
                            $first_half_amount = $num_classes / 2;
?>
            
            </div>
            <div class="container-divide"></div>
            <div class="home-container">
                <div class="home-class-subdiv"><a href="/#" class="home-class-div w-inline-block"><h4 class="class-logo home">Chess Club</h4><p class="home-paragraph">Meetings every Monday and Friday A Half Room 2319</p><div class="home-announcement-div"><img src="./dashboard_files/5ba920e429384e855a3da2da_icons8-commercial-24.png" width="16" class="notif-image"><div class="color margin-10l">Memberships Dues</div><div class="flex-stretch"></div><div class="message-time margin-10l"><strong>Tuesday, Feb 10th</strong></div></div></a></div>
                <div class="home-class-subdiv"><a href="/#" class="home-class-div w-inline-block"><h4 class="class-logo home">Key Club</h4><p class="home-paragraph">Meetings every Monday and Friday A Half Room 2319</p><div class="home-announcement-div"><img src="./dashboard_files/5ba920e429384e855a3da2da_icons8-commercial-24.png" width="16" class="notif-image"><div class="color margin-10l">Memberships Dues</div><div class="flex-stretch"></div><div class="message-time margin-10l"><strong>Tuesday, Feb 10th</strong></div></div><div class="home-announcement-div"><img src="./dashboard_files/5ba920e429384e855a3da2da_icons8-commercial-24.png" width="16" class="notif-image"><div class="color margin-10l">New Activites on Website</div><div class="flex-stretch"></div><div class="message-time margin-10l"><strong>Tuesday, Feb 10th</strong></div></div><div class="home-announcement-div"><img src="./dashboard_files/5ba920e429384e855a3da2da_icons8-commercial-24.png" width="16" class="notif-image"><div class="color margin-10l">Mandatory Meeting</div><div class="flex-stretch"></div><div class="message-time margin-10l"><strong>Wednesday, Feb 18th</strong></div></div></a></div>
            </div>
        </div>
        <div class="footer">
            <div class="flex-horleft margin-5b">
                <a href="/index" class="flex-horbot w-nav-brand"><img src="./dashboard_files/5b52d767ff2e00f966c15246_icons8-student-male-100.png" width="32" class="logo-image">
                    <div class="logo w-hidden-tiny">Student Scholar</div>
                </a>
                <div class="flex-stretch"></div>
                <div class="flex-horleft">
                    <a href="/index" class="nav-link w-inline-block">
                        <div>Home</div>
                    </a>
                    <a href="/about" class="nav-link w-inline-block">
                        <div>About</div>
                    </a>
                    <a href="/contact" class="nav-link w-inline-block">
                        <div>Contact</div>
                    </a>
                </div>
            </div>
            <div class="footer-bot-div">
                <div>© 2018, Student Scholar All Rights Reserved.</div>
                <div class="margin-15l">Icons by <a href="/#" class="icons8-link">Icons8</a></div>
                <div class="flex-stretch"></div>
                <div class="flex-horleft">
                    <a href="http://facebook.com/studentscholar" class="nav-link sm w-inline-block"><img src="./dashboard_files/5b6635bd0512e9a9f2b37b9a_icons8-facebook-48.png" width="24"></a>
                    <a href="https://www.linkedin.com/company/student-scholar" class="nav-link sm w-inline-block"><img src="./dashboard_files/5b6635bddc6fa80be411cc08_icons8-linkedin-48.png" width="24"></a>
                    <a href="http://twitter.com/studentscholar" class="nav-link sm w-inline-block"><img src="./dashboard_files/5b6635bd884ddb159ba258fb_icons8-twitter-48.png" width="24"></a>
                </div>
            </div>
        </div>
    </div>
    <script src="./dashboard_files/jquery-3.3.1.min.js.download" type="text/javascript" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="./dashboard_files/webflow.35742d8f7.js.download" type="text/javascript"></script>
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