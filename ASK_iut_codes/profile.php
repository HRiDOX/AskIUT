<?php
require_once('functions/config.php');
require_once('functions/all_common_function.php');
require_once('functions/user_profile_function.php');
require_once('functions/post_function.php');
require_once('functions/login_function.php');

if (isset($_SESSION['Email'])) {
    $id = $_SESSION['mybook_userid'];
    $user_data = check_login($id);
} else {
    redirect("login.php");
}

$USER = $user_data;
//print_r($_SESSION);
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $profile_data = get_profile($_GET['id']);

    if (is_array($profile_data)) {
        $user_data = $profile_data[0];
    }
}



//posting starts here
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $id = $_SESSION['mybook_userid'];

    $result = create_post($id, $_POST, $_FILES);

    if ($result == "") {
        redirect("profile.php");
        die;
    } else {
        echo "<div style='text-align:center;font-size:12px;color:white;background-color:grey;'>";
        echo "<br>The following errors occured:<br><br>";
        print_r($result);
        echo "</div>";
    }
}


//collect posts


$id = $_SESSION['mybook_userid'];

$posts = get_posts($id);



?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <link rel="stylesheet" href="style.css">
    <title>AskIUT | Profile</title>
    <link rel="stylesheet" href="css/bootstrap.css">
</head>
<style>
    ::placeholder {
        color: #A7C4BC;
        opacity: 1;
    }

    #My_bar {
        height: 50px;
        background-color: #21294C;
        color: white;

        background-position: center;
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
        width: 100px;
        margin-top: 20px;
        border-radius: 50%;
        border: 2px solid #ffffff;
    }

    #menu_button {
        width: 100px;
        display: inline-block;
        margin: 2px;
        /* background-color: #2F5D62; */
        color: white;
        font-size: 14px;



    }

    #friends_img {
        width: 75px;
        float: left;
        margin: 5px;
    }

    #friends_bar {
        background-color: #47597E;
        min-height: 400px;
        margin-top: 20px;
        color: white;
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
        min-width: 50px;
        cursor: pointer;


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



<body style="font-family: Georgia, serif;background: linear-gradient(to left,#04009A ,#056676);">
    <!--Top Bar-->
    <?php include("topbar.php"); ?>

    <div style="width:800px;margin:auto;font-size: 30px;">

        <div>
            <?php
            $image = "logo/pic_holder.jpg ";
            if (file_exists($user_data['profile_image'])) {
                $image = $user_data['profile_image']; //here i need to add thumbnail
            }

            ?>

            <img id="Pro_Pic" src="<?php echo $image ?>"><br>

            <div style="font-size: 20px;">
                <?php echo $user_data['FirstName'] . " " . $user_data['LastName']; ?><br>
                <div id="menu_button"><a style="text-decoration: none;color: black;" href="change_profile_picture.php?change=profile"> Change Image</a></div>
            </div>
            <div style="text-align:center;">
                <div id="menu_button"> <a style="text-decoration:none" ; href="profile.php"> Profile</a></div>
                <div id="menu_button"> About </div>
                <div id="menu_button">Photos</div>
                <div id="menu_button">Settings</div>

                <div>
                    <?php
                    $mylikes = "";
                    if ($user_data['likes'] > 0) {

                        $mylikes = "(" . $user_data['likes'] . " Followers)";
                    }
                    ?>
                    <a href="like.php?type=user&id=<?php echo $user_data['userid'] ?>">
                        <input id="post_button" type="button" value="Follow <?php echo $mylikes ?>" style="margin-right:10px;background-color: #9b409a;width:auto;">
                    </a>

                </div>
            </div>
        </div>
        <!-- Below Cover Area -->
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

                    ?>


                </div>
            </div>
        </div>
    </div>


</body>

</html>