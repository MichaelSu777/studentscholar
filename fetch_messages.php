

     
                    <?php
                    session_start();
require('connect.php');
                     $category_sort = $_GET['category'];

    $classurl = $_GET['class'];//gets url
  $user = $_GET['user'];
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
    


   
         
    
                
                                  
                              
                                 $check_d = mysqli_query($con, $sql = "SELECT * FROM `classes` WHERE class_type='".$classurl."'");
                    
                    while ($row_d = mysqli_fetch_assoc($check_d)){
                        $school_id = $row_d['school_id']; //replace this with the school name from the school's database.
                        
                        $check_schools = mysqli_query($con, "SELECT * FROM `schools` WHERE id='".$school_id."'");
                        $class_id_message = $row_d['id'];
                        while ($getschool = mysqli_fetch_assoc($check_schools)){
                            $school_short_name = $getschool['short_name'];
                        }
                    }
                   
                            $output = '';
                        
                    $message_qy = mysqli_query($con, "SELECT * FROM `message` WHERE class_id='".$class_id_message."'");//needs to remove duplicate senders in a row
                        $message_sender = null;
                        while ($message_db = mysqli_fetch_assoc($message_qy)){
                            $message_id = $message_db['id'];
                            $message_class_id = $message_db['class_id'];
                            $message_content = $message_db['content'];
                            $message_sender = $message_db['sender'];
                            $message_time = $message_db['time'];
                                     $message_select_user = mysqli_query($con, "SELECT * FROM `message` WHERE sender='".$user."'");//needs to remove duplicate senders in a row
                        while ($message_gt_user = mysqli_fetch_assoc($message_select_user)){
                           
                            $message_sender_ = $message_gt_user['sender'];
                            $sender_fname = $message_gt_user['fname'];
                            $sender_lname = $message_gt_user['lname'];
                         
                        }
                        $get_all = mysqli_query($con, "SELECT * FROM `message`");
                         
                                while ($gt_send = mysqli_fetch_assoc($get_all)){
                           
                            $sender_fname_ = $gt_send['fname'];
                            $sender_lname_ = $gt_send['lname'];
                          
                        }
                            $users_qy = mysqli_query($con, "SELECT * FROM `users` WHERE id = '".$user."'");//gets class entry in database

                            while ($users_db = mysqli_fetch_assoc($users_qy)){
                                $users_id = $users_db['id'];
                                $users_username = $users_db['username'];
                              
                            }
                        
                            if ($message_sender == $users_id){//Variable for user
                                $userSelf = 'self';
                                $output .= '
                                <div class="message-div self">
                                    <div class="message-data-div margin-5l self">
                                    <div class="message-name-div">
                                            <div><a href="#"><strong>'.$sender_fname.' '.$sender_lname.'</strong></a></div>
                                            <div class="message-time margin-10l">'.$message_time.'</div>
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
                                ';
                            }
                            else{
                                $userSelf = '';
                                $output .= '
                                <div class="message-div">
                                    <a href="#" class="w-inline-block"><img src="./class_files/5b53f743ff2e00b45bc1ea50_icons8-pumpkin-64.png" width="32" height="32"></a>
                                    <div class="message-data-div margin-5l">
                                    <div class="message-name-div">
                                            <div><a href="#"><strong>'.$sender_fname_.' '.$sender_lname_.'</strong></a></div>
                                            <div class="message-time margin-10l">'.$message_time.'</div>
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
                                ';
                            }
                            
                            $message_id_next = $message_sender;
                            $message_content_next = $message_content;
                            do {
                                $output .= '
                                        <div class="text first'.' '.$userSelf.'">
                                            <div id="msg">'.$message_content_next.'</div>
                                        </div>
                                ';
                                
                                $message_id_next += 1;
                                
                                $message_qy_next = mysqli_query($con, "SELECT 1 FROM `message` WHERE id = '".$message_id_next."' LIMIT 1");//order by time
                                while ($message_db_next = mysqli_fetch_assoc($message_qy_next)){
                                    $message_sender_next = $message_db_next['sender'];
                                    $message_content_next = $message_db_next['content'];
                                }
                               //$output .= $message_sender_next.$message_sender;
                            } while($message_sender_next == $message_sender);
                                  
                            $output .= '
                                    </div>
                                </div>';
                        }
                        echo $output;
                    ?>