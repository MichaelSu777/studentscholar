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
<html data-wf-domain="studentscholar.webflow.io" data-wf-page="5b5f761591ad16e6761c2a0a" data-wf-site="5b52d603ff2e004c39c15224" data-wf-status="1" class="w-mod-js w-mod-touch wf-poppins-n4-active wf-poppins-n5-active wf-poppins-n6-active wf-poppins-n7-active wf-poppins-n8-active wf-active">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Private Message - Student Scholar</title>
    <meta content="Privately message other students here! Either search up their name or select their profile from the options above." name="description">
    <?php require 'studentscholar_files/head.php'; ?>
</head>

<body>
    <div class="body-div message">
            <?php require 'studentscholar_files/header.php'; ?>

        <div class="section message gradient-blue">
            <div class="row-div">
                <div class="column">
                    <div class="message-title-div">
                        <h3>Messaging</h3>
                        <a href="http://studentscholar.webflow.io/messaging/page#" data-w-id="4a294abd-a25b-ac6b-2650-13f9433e584b" class="message-add-div w-inline-block"><img src="./message_files/5baabb59f6a378e8ef8131b2_icons8-add-48.png" width="36" data-w-id="b9fa6cd4-46c4-0501-8b03-d02d211e1e3a" class="message-add-button"><img src="./message_files/5baabcb66af7fb1613ba441f_icons8-minus-sign-48.png" width="36" data-w-id="27d0ddb8-602c-db4a-c6d6-d747c3106bbb" class="message-add-button _2"></a>
                    </div>
                    <div data-w-id="987b1146-09c4-880b-ea0f-ac013d96e5ec" class="nav-search message">
                        <a class="w-inline-block"><img src="./message_files/5b535ceaeadb587329b81bb7_icons8-search-128 (1).png" width="32"></a>
                        <input type="text" class="input w-input" maxlength="256" name="field-7" data-name="Field 7" placeholder="Search for students/usernames" id="field-7" required="">
                    </div>
                    <a href="http://studentscholar.webflow.io/messaging/page#" class="messaging-contact-div w-inline-block"><img src="./message_files/5b53f738e5d2a86ec499452d_icons8-lettuce-64.png" width="32" height="32">
                        <div class="messaging-contact-name-duv">
                            <div><strong>Bob Bobstein</strong></div>
                            <div>You: Thanks</div>
                        </div>
                    </a>
                    <a href="http://studentscholar.webflow.io/messaging/page#" class="messaging-contact-div w-inline-block"><img src="./message_files/5b6b9579e5d6e25271e7961f_share.png" width="32" height="32" class="circle">
                        <div class="messaging-contact-name-duv">
                            <div><strong>English Project</strong></div>
                            <div>Bob:&nbsp;I just turned it in</div>
                        </div>
                    </a>
                    <a href="http://studentscholar.webflow.io/messaging/page#" class="messaging-contact-div w-inline-block"><img src="./message_files/5b6b9579e5d6e25271e7961f_share.png" width="32" height="32" class="circle">
                        <div class="messaging-contact-name-duv">
                            <div><strong>Unnamed Group</strong></div>
                            <div>You: What about Max?</div>
                        </div>
                    </a>
                    <a href="http://studentscholar.webflow.io/messaging/page#" class="messaging-contact-div w-inline-block"><img src="./message_files/5b53f743ff2e00b45bc1ea50_icons8-pumpkin-64.png" width="32" height="32">
                        <div class="messaging-contact-name-duv">
                            <div><strong>Tim Tulip</strong></div>
                            <div>Tim: I've never been more excited!</div>
                        </div>
                    </a>
                    
                    <a href="http://studentscholar.webflow.io/messaging/page#" data-w-id="4fdba3e3-16a4-60f2-e675-105d8df93786" style="opacity: 0;" class="message-add-group w-inline-block">
                        <div class="message-add">Add</div>
                    </a>
                </div>
                <div class="column _2">
                    <div class="notification-class-title">
                        <div class="message-name-div bot">
                            <a href="http://studentscholar.webflow.io/messaging/page#" class="visible-mobile-2 w-inline-block"><img src="./message_files/5ba99c7615ee3219f3156315_icons8-go-back-48.png"></a><img src="./message_files/5b53f738e5d2a86ec499452d_icons8-lettuce-64.png" width="25" class="margin-10l">
                            <div class="margin-10l"><a href="http://studentscholar.webflow.io/messaging/page#"><strong>Bob Bobstein</strong></a></div>
                            <div class="forum-write-div profile green">
                                <div class="profile-image-div">
                                    <div class="hor-top"><img src="./message_files/5b53f738e5d2a86ec499452d_icons8-lettuce-64.png" width="50" class="profile-image">
                                        <div class="margin-15l dsa">
                                            <div class="logo">Bob Bobstein</div>
                                            <div>@bobostein</div>
                                        </div>
                                    </div>
                                    <div class="profile-mobile-buttons">
                                        <a href="http://studentscholar.webflow.io/messaging/page#" class="icon-button _32 margin-50l w-inline-block"><img src="./message_files/5b5dfd0ec3f7cb076f48860d_icons8-chat-64.png" width="32" height="32"></a>
                                    </div>
                                </div>
                                <div class="profile-school">Panther Creek High School</div>
                                <div>4 classes | 52 posts</div>
                            </div>
                        </div>
                        <div class="margin-10l">@bobstein</div>
                    </div>
                    <div class="messaging-div message">
                        <div class="flex-stretch message">
                            <div class="message-date-div">
                                <div class="message-date-line"></div>
                                <div class="message-date">Apr 5</div>
                                <div class="message-date-line"></div>
                            </div>
                            <div class="message-div self">
                                <div class="message-data-div margin-5l self">
                                    <div class="message-name-div">
                                        <div><a href="http://studentscholar.webflow.io/messaging/page#"><strong>You</strong></a></div>
                                        <div class="message-time margin-10l">2:57 pm</div>
                                    </div>
                                    <div class="text first self">
                                        <div>Hi Bob</div>
                                    </div>
                                    <div class="text self last">
                                        <div>Hi</div>
                                    </div>
                                </div>
                            </div>
                            <div class="message-div">
                                <a href="http://studentscholar.webflow.io/messaging/page#" class="w-inline-block"><img src="./message_files/5b53f738e5d2a86ec499452d_icons8-lettuce-64.png" width="32" height="32"></a>
                                <div class="message-data-div margin-5l">
                                    <div class="message-name-div">
                                        <div><strong>Bob Bobstein</strong></div>
                                        <div class="message-time margin-10l">2:57 pm</div>
                                    </div>
                                    <div class="text first">
                                        <div>Hi</div>
                                    </div>
                                    <div class="text last">
                                        <div>Hey</div>
                                    </div>
                                </div>
                            </div>
                            <div class="message-date-div">
                                <div class="message-date-line"></div>
                                <div class="message-date">Jun 9</div>
                                <div class="message-date-line"></div>
                            </div>
                            <div class="message-div">
                                <a href="http://studentscholar.webflow.io/messaging/page#" class="w-inline-block"><img src="./message_files/5b53f738e5d2a86ec499452d_icons8-lettuce-64.png" width="32" height="32"></a>
                                <div class="message-data-div margin-5l">
                                    <div class="message-name-div">
                                        <div><strong>Bob Bobstein</strong></div>
                                        <div class="message-time margin-10l">5:03 pm</div>
                                    </div>
                                    <div class="text first">
                                        <div>Hey</div>
                                    </div>
                                    <div class="text">
                                        <div>Are you doing the review session</div>
                                    </div>
                                    <div class="text last">
                                        <div>It's tomorrow</div>
                                    </div>
                                </div>
                            </div>
                            <div class="message-div self">
                                <div class="message-data-div margin-5l self">
                                    <div class="message-name-div">
                                        <div><a href="http://studentscholar.webflow.io/messaging/page#"><strong>You</strong></a></div>
                                        <div class="message-time margin-10l">2:57 pm</div>
                                    </div>
                                    <div class="text first self">
                                        <div>Yeah</div>
                                    </div>
                                </div>
                            </div>
                            <div class="message-date-div">
                                <div class="message-date-line"></div>
                                <div class="message-date">Jun 10</div>
                                <div class="message-date-line"></div>
                            </div>
                            <div class="message-div">
                                <a href="http://studentscholar.webflow.io/messaging/page#" class="w-inline-block"><img src="./message_files/5b53f738e5d2a86ec499452d_icons8-lettuce-64.png" width="32" height="32"></a>
                                <div class="message-data-div margin-5l">
                                    <div class="message-name-div">
                                        <div><strong>Bob Bobstein</strong></div>
                                        <div class="message-time margin-10l">5:13 Am</div>
                                    </div>
                                    <div class="text first">
                                        <div>Ok I added you</div>
                                    </div>
                                </div>
                            </div>
                            <div class="message-div self">
                                <div class="message-data-div margin-5l self">
                                    <div class="message-name-div">
                                        <div><a href="http://studentscholar.webflow.io/messaging/page#"><strong>You</strong></a></div>
                                        <div class="message-time margin-10l">5:14 Am</div>
                                    </div>
                                    <div class="text first self">
                                        <div>Thanks</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="message-input-div messaging">
                            <input type="text" class="input w-input" maxlength="256" name="field-6" data-name="Field 6" placeholder="Type a message" id="field-6" required="">
                            <a href="http://studentscholar.webflow.io/messaging/page#" class="icon-button w-inline-block"><img src="./message_files/5b5ead84e90d48a043a35a77_icons8-attach-64.png" width="32" height="32"></a>
                        </div>
                    </div>
                </div>
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