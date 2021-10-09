 <div style="width:800px;display:flex;">
     <!-- Friends Area -->
     <div style="min-height:400px;flex:1; ">
         <div id="friends_bar">
             <br>
             <div id="friends">
                 <img id="friends_img" src="repository.png"><br><br>
                 Repository
             </div>
             <br><br><br>
             <div id="friends">
                 <img id="friends_img" src="group.png"><br><br>
                 Groups
             </div>
             <div>
                 Following<br>
                 <?php
                    if ($friends) {

                        foreach ($friends as $friend) {
                             $FRIEND_ROW =get_user($friend['userid']);
                            include("user_member.php");
                        }
                    }

                    ?>
             </div>

         </div>
     </div>
     <!-- Post Area -->
     <div style="min-height:400px;flex:3.5;padding:20px;">
         <div style="border: solid thin #aaa;padding: 10px;background-color: white;">
             <form method="post" enctype="multipart/form-data">
                 <textarea name="post" placeholder="Ask Your Question"></textarea>
                 <input style="font-size:12px;" type="file" name="file">
                 <input id="post_button" type="submit" value="Ask!">
                 <br>
             </form>
         </div>
         <!-- post -->
         <div id="post_bar">
             <?php

                if ($posts) {
                    foreach ($posts as $ROW) {


                        $ROW_USER = get_user($ROW['userid']);

                        include("post.php");
                    }
                }

                
                     $pg = pagination_link();

                ?>
                 <a href = "<?=   $pg['next_page'] ?>">
                          <input id="post_button" type="button" value="Next Page" style="float : right; width:150px;">
                        </a>
                        <a href = "<?=  $pg['prev_page'] ?>">
                          <input id="post_button" type="button" value="Previous Page" style = "float : left; width:150px;">
                        </a>


         </div>
     </div>
 </div>