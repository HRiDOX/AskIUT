<?php
require_once('functions/config.php');
require_once('functions/all_common_function.php');
require_once('functions/user_profile_function.php');
require_once('functions/post_function.php');
require_once('functions/login_function.php');
require_once('functions/settings_function.php');
require_once('functions/image_function.php');
//require_once('functions/image_crop_function.php');

if (isset($_SESSION['Email'])) {
    $id = $_SESSION['mybook_userid'];
    $user_data = check_login($id);
} else {
    redirect("login.php");
}

// collects other profile data
/*
$profile_data = get_profile($_GET['id']);
if (is_array($profile_data)) {
    $user_data = $profile_data[0];
}
*/

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
    if (isset($_POST['FirstName'])) {


        save_settings($_POST, $_SESSION['mybook_userid']);
    } else {
        $id = $_SESSION['mybook_userid'];

        $result = create_post($id, $_POST, $_FILES);

        if ($result == "") {
            redirect("profile.php");
            die;
        } else {
            echo "<div style='text-align:center;font-size:12px;color:white;background-color:grey;'>";
            echo "<br>The following errors occured:<br><br>";
            echo '$result';
            echo "</div>";
        }
    }
}


//collect posts


$id = $user_data['userid'];

$posts = get_posts($id);

//collect friends
//$id = $user_data['$userid'];

$friends = get_friends($id);





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

    #textbox {

        width: 100%;
        height: 20px;
        border-radius: 5px;
        border: none;
        padding: 4px;
        font-size: 14px;
        border: solid thin grey;
        margin: 10px;

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
        margin-top: 5px;
        background-color: white;
        padding: 5px;
    }

    #post {
        padding: 4px;
        font-size: 13px;
        display: flex;
        margin-bottom: 5px;
    }
    


.glow-on-hover {
    width: 220px;
    height: 50px;
    border: none;
    outline: none;
    color: #fff;
    background: white;
    cursor: pointer;
    position: relative;
    z-index: 0;
    border-radius: 10px;
}

.glow-on-hover:before {
    content: '';
    background: linear-gradient(45deg, #ff0000, #ff7300, #fffb00, #48ff00, #00ffd5, #002bff, #7a00ff, #ff00c8, #ff0000);
    position: absolute;
    top: -2px;
    left:-2px;
    background-size: 400%;
    z-index: -1;
    filter: blur(5px);
    width: calc(100% + 4px);
    height: calc(100% + 4px);
    animation: glowing 20s linear infinite;
    opacity: 0;
    transition: opacity .3s ease-in-out;
    border-radius: 10px;
}

.glow-on-hover:active {
    color: white
}

.glow-on-hover:active:after {
    background: transparent;
}

.glow-on-hover:hover:before {
    opacity: 1;
}

.glow-on-hover:after {
    z-index: -1;
    content: '';
    position: absolute;
    width: 100%;
    height: 100%;
    background: #111;
    left: 0;
    top: 0;
    border-radius: 10px;
}

@keyframes glowing {
    0% { background-position: 0 0; }
    50% { background-position: 400% 0; }
    100% { background-position: 0 0; }
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
                 <div id="menu_buttons"><a href="index_timeline.php">Timeline</div></a>
                <div id="menu_button"> About </div>
                <div id="menu_button">Photos</div>
                <div id="menu_button"><?php
                                        if ($user_data['userid'] == $_SESSION['mybook_userid']) {
                                            echo '<a href="profile.php?section=settings&id=' . $user_data['userid'] . '"><div id="menu_buttons">Settings</div></a>';
                                        }
                                        ?>
                </div>
                <div id="menu_buttons"> <a href="profile.php?section=followers&id=<?php echo $user_data['userid'] ?>">Followers</a></div>
                 <div id="menu_buttons"> <a href="profile.php?section=following&id=<?php echo $user_data['userid'] ?>">Following</a></div>

                <?php
                $mylikes = "";
                if ($user_data['likes'] > 0) {

                    $mylikes = "(" . $user_data['likes'] . " Followers)";
                }
                ?> <a href="like.php?type=user&id=<?php echo $user_data['userid'] ?>">
                    <input id="post_button" type="button" value="Follow <?php echo $mylikes ?>" style="margin-right:10px;background-color: #9b409a;width:auto;">
                </a>


            </div>
        </div>
        <!-- Below Cover Area -->
        <?php

        $section = "default";
        if (isset($_GET['section'])) {

            $section = $_GET['section'];
        }

        if ($section == "default") {

            include("profile_content_default.php");
        }elseif ($section == "following"){
	 				
	 		include("profile_content_following.php");

	 	}elseif ($section == "followers"){

	 		include("profile_content_followers.php");

	 	} 
        elseif ($section == "settings") {

            include("profile_content_settings.php");
        }



        ?>

    </div>


</body>

</html>