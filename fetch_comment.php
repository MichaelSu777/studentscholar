<?php

//fetch_comment.php

$connect = new PDO('mysql:host=127.0.0.1;dbname=studentscholar', 'msu242', '');
$forum_id = $_GET['url'];
$query = "
SELECT * FROM tbl_comment 
WHERE parent_comment_id = '0' AND forum_id = $forum_id
ORDER BY comment_id DESC
";

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();
$output = '';
foreach($result as $row)
{
 $output .= '
  <div class="post-comment-div">
                 <div class="forum-post-vote-div">
                    <div class="vote"><img src="./post_files/5b54627b9b226854d72c1ba9_icons8-upward-arrow-64.png" width="24" class="vote-image"><img src="./post_files/5b5463d0eadb5814beb89a20_icons8-upward-arrow-64 (1).png" width="24" class="forum-vote-color"></div>
                    <div class="vote"><img src="./post_files/5b5462b2ff2e0086c1c20aab_icons8-below-64.png" width="24" class="vote-image"><img src="./post_files/5b546355e5d2a84241996d17_icons8-below-64 (1).png" width="24" class="forum-vote-color"></div>
                    <div class="forum-vert-line"></div>
                </div>
                <div class="post-history-div vert-cent">
                    <div class="post-history-title-div-post">
                        <div class="message-name-div"><img src="./post_files/5b53f738e5d2a86ec499452d_icons8-lettuce-64.png" width="16" class="margin-5ri">
                            <div><a href="http://studentscholar.webflow.io/user/page#"></a></div>
                            <div class="forum-write-div profile green">
                                <div class="profile-image-div">
                                    <div class="hor-top"><img src="./post_files/5b53f738e5d2a86ec499452d_icons8-lettuce-64.png" width="50" class="profile-image">
                                        <div class="margin-15l dsa">
                                            <div class="logo">Bob Bobstein</div>
                                            <div>@'.$forum_comments_username.'</div>
                                        </div>
                                    </div>
                                    <div class="profile-mobile-buttons">
                                        <a href="http://studentscholar.webflow.io/user/page#" class="icon-button _32 margin-50l w-inline-block"><img src="./post_files/5b5dfd0ec3f7cb076f48860d_icons8-chat-64.png" width="32" height="32"></a>
                                    </div>
                                </div>
                                <div class="profile-school">Panther Creek High School</div>
                                <div>4 classes | 52 posts</div>
                            </div>
                        </div>
                        <div class="message-time red margin-5l">'.$forum_comments_replies.'</div>
                        <div class="message-time margin-10l">By <b>'.$row["comment_sender_name"].'</b> on <i>'.$row["date"].'</i></div>

                    </div>
                                                <div class="margin-5b">'.$row["comment"].'</div>

  <div class="panel-footer" align="right"><button type="button" class="btn btn-default reply" id="'.$row["comment_id"].'">Reply</button></div>
                </div>

 </div>
 ';
 $output .= get_reply_comment($connect, $row["comment_id"]);
}

echo $output;

function get_reply_comment($connect, $parent_id = 0, $marginleft = 0)
{
 $query = "
 SELECT * FROM tbl_comment WHERE parent_comment_id = '".$parent_id."'
 ";
 $output = '';
 $statement = $connect->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();
 $count = $statement->rowCount();
 if($parent_id == 0)
 {
  $marginleft = 0;
 }
 else
 {
  $marginleft = $marginleft + 48;
 }
 if($count > 0)
 {
  foreach($result as $row)
  {
   $output .= '
   <div class="post-comment-div" style="margin-left:'.$marginleft.'px">
                 <div class="forum-post-vote-div">
                    <div class="vote"><img src="./post_files/5b54627b9b226854d72c1ba9_icons8-upward-arrow-64.png" width="24" class="vote-image"><img src="./post_files/5b5463d0eadb5814beb89a20_icons8-upward-arrow-64 (1).png" width="24" class="forum-vote-color"></div>
                    <div class="vote"><img src="./post_files/5b5462b2ff2e0086c1c20aab_icons8-below-64.png" width="24" class="vote-image"><img src="./post_files/5b546355e5d2a84241996d17_icons8-below-64 (1).png" width="24" class="forum-vote-color"></div>
                    <div class="forum-vert-line"></div>
                </div>
                <div class="post-history-div vert-cent">
                    <div class="post-history-title-div-post">
                        <div class="message-name-div"><img src="./post_files/5b53f738e5d2a86ec499452d_icons8-lettuce-64.png" width="16" class="margin-5ri">
                            <div><a href="http://studentscholar.webflow.io/user/page#"></a></div>
                            <div class="forum-write-div profile green">
                                <div class="profile-image-div">
                                    <div class="hor-top"><img src="./post_files/5b53f738e5d2a86ec499452d_icons8-lettuce-64.png" width="50" class="profile-image">
                                        <div class="margin-15l dsa">
                                            <div class="logo">Bob Bobstein</div>
                                            <div>@'.$forum_comments_username.'</div>
                                        </div>
                                    </div>
                                    <div class="profile-mobile-buttons">
                                        <a href="http://studentscholar.webflow.io/user/page#" class="icon-button _32 margin-50l w-inline-block"><img src="./post_files/5b5dfd0ec3f7cb076f48860d_icons8-chat-64.png" width="32" height="32"></a>
                                    </div>
                                </div>
                                <div class="profile-school">Panther Creek High School</div>
                                <div>4 classes | 52 posts</div>
                            </div>
                        </div>
                        <div class="message-time red margin-5l">'.$forum_comments_replie.'</div>
                        <div class="message-time margin-10l">By <b>'.$row["comment_sender_name"].'</b> on <i>'.$row["date"].'</i></div>

                    </div>
                                                                    <div class="margin-5b">'.$row["comment"].'</div>

  <div class="panel-footer" align="right"><button type="button" class="btn btn-default reply" id="'.$row["comment_id"].'">Reply</button></div>
                </div>

 </div>
 
   ';
   $output .= get_reply_comment($connect, $row["comment_id"], $marginleft);
  }
 }
 return $output;
}

?>
