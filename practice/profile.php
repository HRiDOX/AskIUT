<?php
   include("classes/autoload.php");

//checck if user is logged in
if(isset($_SESSION['mybook_userid']) && is_numeric($_SESSION['mybook_userid']))
{
    $id= $_SESSION['mybook_userid'];
    $login= new Login();

    $result = $login->check_login($id);
    if($result)
    {
        //retrieve user data
        $user = new User();
        $user_data = $user->get_data($id);

        if(!$user_data)
        {
            header("Location: login.php");
            die;
        }
        else
        {
            header("Location: profile.php");
            die;
        }
    }
    else
    {
        header("Location: login.php");
        die;
    }
}

//posting starts here
 if($_SERVER['REQUEST_METHOD']=="POST")

 {
    $post= new Post();
    $id = $_SESSION['mybook_userid'];  
    $result = $post->create_post($id,$_POST,$_FILES);

    if($result == "")
    {
        header (" Location: login.php");
        die;
    }
    else
    {
        echo "<div style='text-align:center;font-size:12px;color:white;background-color:grey;'>";
        echo "<br>The following errors occured:<br><br>";
        echo $result;
        echo "</div>";

    }

 }
 //collect posts
 
 $post= new Post();
 $id = $_SESSION['mybook_userid'];  
 
 $posts = $post->get_posts($id);

 $image_class = new Image();

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>

    <title>AskIUT Profile</title>
</head>
<style>
::placeholder {
    color: #A7C4BC;
    opacity: 1;
}

#My_bar {
    height: 50px;
    background-color: #2F5D62;
    color: #A7C4BC;

}

#Search_box {
    width: 400px;
    height: 20px;
    border-radius: 5px;
    border: none;
    padding: 4px;
    font-size: 14px;
    background-image: url(search_24x24.png);
    background-repeat: no-repeat;
    background-position: right;

    background-color: #DFEEEA
}

#Pro_Pic {
    width: 150px;
    margin-top: -200px;
    border-radius: 50%;
    border: solid 2px white;
}

#menu_button {
    width: 100px;
    display: inline-block;
    margin: 2px;


}

#friends_img {
    width: 75px;
    float: left;
    margin: 8px;
}

#friends_bar {
    background-color: white;
    min-height: 400px;
    margin-top: 20px;
    color: #2F5D62;
    padding: 8px;


}

#friends {
    clear: both;
    font-size: 12px;
    font-weight: bold;
}

textarea {
    width: 100%;
    border: none;
    font-family: Georgia, serif;
    font-size: 14px;
    height: 60px;
}

#post_button {
    float: right;
    background-color: #2F5D62;
    border: none;
    color: white;
    padding: 4px;
    font-size: 14px;
    border-radius: 2px;
    width: 50px;


}

#post_bar {
    margin-top: 20px;
    background-color: white;
    padding: 10px;
}

#post {
    padding: 4px;
    font-size: 13px;
    display: flex;
    margin-bottom: 20px;
}
</style>



<body style="font-family: Georgia, serif; background-color:#DFEEEA; ">
    <!--Top Bar-->
    <?php include(header.php); ?>
    <!--cover Area-->
    <div style="width: 800px;margin:auto; min-height:400px ">
        <div style="background-color:white; text-align:center;color: #2F5D62 ">
            <span style="font_size:11px;">
            <?php 
                $image= "images/pic_holder.jpg";
                if(file_exists($user_data['profile_image']))
                {
                    $image = $image_class->get_thumb_profile($user_data['profile_image']);
                }
            ?>
            <img id="Pro_Pic" src="<?php echo $image ?>"> <br>
            <a syle="text-decoration:none; color:#fof;" href="change_profile_image.php">Change Image</a>
            </span>
            <br>
            <div style="font-size: 20px;">
                <?php echo $user_data['first_name'] . " " . $user_data['last_name'] ?>
            </div>
            <div id="menu_button"> Timeline</div>
            <div id="menu_button"> About </div>
            <div id="menu_button">Friends</div>
            <div id="menu_button">Photos</div>
            <div id="menu_button">Settings</div>
        </div>
        <!-- Below Cover Area -->
        <div style="display:flex;">
            <!-- Friends Area -->
            <div style="min-height:400px;flex:1">
                <div id="friends_bar">
                    Friend <br>
                    <div id="friends">
                        <img id="friends_img" src="user1.jpg">
                        <br>
                        Girl
                    </div>
                    <div id="friends">
                        <img id="friends_img" src="user2.jpg">
                        <br>
                        Anika Another Girl
                    </div>
                    <div id="friends">
                        <img id="friends_img" src="user3.jpg">
                        <br>
                        Gordon Ramsey
                    </div>
                    <div id="friends">
                        <img id="friends_img" src="user4.jpg">
                        <br>
                        John cena
                    </div>
                </div>
            </div>
            <!-- Post Area -->
            <div style="min-height:400px;flex:2.5;padding:20px;">
                <div style="border: solid thin #aaa;padding: 10px;background-color: white;">
                    <form method="post" enctype="multipart/form-data">
                        <textarea name="post" placeholder="Ask Your Question...."></textarea>
                        <input type="file" name="file">
                        <input id="post_button" type="submit" value="Ask!">
                        <br>
                    </form>
                </div>
                <!-- post -->
                <div id="post_bar">
                    <?php

                      if($posts)
                      {
                          foreach ($posts as $ROW)
                          {
                            
                            $user = new User();
                            $ROW_USER = $user->get_user($ROW['userid']);
                            
                            include("post.php");

                          }
                      }
                       
                   ?>

                </div>
            </div>
        </div>
    </div>

</body>

</html>