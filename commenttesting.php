<?php
//index.php

?>
<!DOCTYPE html>
<html>
 <head>
  <title>Comment System using PHP and Ajax</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

 </head>
 <body>
     <?php echo require 'studentscholar_files/head.php';?>
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
                <form id="comment_form" method="POST">
                    <div class="small">Comment as '.$fname . ' ' .$lname.'</div>
                         <input type="text" name="comment_name" id="comment_name" class="form-control" placeholder="Enter Name" />

                    <textarea name="comment_content" id="comment_content"  placeholder="What do you have to say?" maxlength="5000" class="input post margin-5b w-input"></textarea>
                        <input type="hidden" name="comment_id" id="comment_id" value="0" />

                    <input type="submit" value="Submit" name="submit" class="button media w-button">
                       <span id="comment_message"></span>
   <br />

   <div id="display_comment"></div>
                </form>
                
            </div>
        </div>

                            
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
                            </div>
                                             
                </div>
                                                         
      
  
 </body>
</html>

<script>
$(document).ready(function(){
 
 $('#comment_form').on('submit', function(event){
  event.preventDefault();
  var form_data = $(this).serialize();
  $.ajax({
   url:"add_comment.php",
   method:"POST",
   data:form_data,
   dataType:"JSON",
   success:function(data)
   {
    if(data.error != '')
    {
     $('#comment_form')[0].reset();
     $('#comment_message').html(data.error);
     $('#comment_id').val('0');
     load_comment();
    }
   }
  })
 });

 load_comment();

 function load_comment()
 {
  $.ajax({
   url:"fetch_comment.php",
   method:"POST",
   success:function(data)
   {
    $('#display_comment').html(data);
   }
  })
 }

 $(document).on('click', '.reply', function(){
  var comment_id = $(this).attr("id");
  $('#comment_id').val(comment_id);
  $('#comment_name').focus();
 });
 
});
</script>
