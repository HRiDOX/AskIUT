<?php


require_once('functions/config.php');
require_once('functions/all_common_function.php');
require_once('functions/user_profile_function.php');
require_once('functions/post_function.php');
require_once('functions/login_function.php');
require_once('functions/settings_function.php');

if (isset($_SESSION['Email'])) {
    $id = $_SESSION['mybook_userid'];
    $user_data = check_login($id);
} else {
    redirect("login.php");
}

// collects other profile data

$profile_data = get_profile($_GET['id']);
if (is_array($profile_data)) {
    $user_data = $profile_data[0];
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
        header("Location: single_post.php?id=$_GET[id]");
        die;
    } else {

        echo "<div style='text-align:center;font-size:12px;color:white;background-color:grey;'>";
        echo "<br>The following errors occured:<br><br>";
        echo $result;
        //aage $result chilo shudhu
        echo "</div>";
    }
}


$ROW = false;

$ERROR = "";
if (isset($_GET['id'])) {

    $ROW = get_one_post($_GET['id']);
} else {

    $ERROR = "No post was found!";
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Single Post | AskIUT</title>
</head>

<style type="text/css">
    #blue_bar {

        height: 50px;
        background-color: #405d9b;
        color: #d9dfeb;

    }

    #search_box {

        width: 400px;
        height: 20px;
        border-radius: 5px;
        border: none;
        padding: 4px;
        font-size: 14px;
        background-image: url(search.png);
        background-repeat: no-repeat;
        background-position: right;

    }

    #profile_pic {

        width: 150px;
        border-radius: 50%;
        border: solid 2px white;
    }

    #menu_buttons {

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

        min-height: 400px;
        margin-top: 20px;
        padding: 8px;
        text-align: center;
        font-size: 20px;
        color: #405d9b;
    }

    #friends {

        clear: both;
        font-size: 12px;
        font-weight: bold;
        color: #405d9b;
    }

    textarea {

        width: 100%;
        border: none;
        font-family: tahoma;
        font-size: 14px;
        height: 60px;

    }

    #post_button {

        float: right;
        background-color: #405d9b;
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

<body style="font-family: tahoma; background-color: #d0d8e4;">

    <br>
    <?php include("topbar.php"); ?>


    <!--cover area-->
    <div style="width: 800px;margin:auto;min-height: 400px;">

        <!--below cover area-->
        <div style="display: flex;">

            <!--posts area-->
            <div style="min-height: 400px;flex:2.5;padding: 20px;padding-right: 0px;">

                <div style="border:solid thin #aaa; padding: 10px;background-color: white;">

                    <?php



                    if (is_array($ROW)) {

                        $ROW_USER = get_user($ROW['userid']);
                        include("post.php");
                    }

                    ?>

                    <br style="clear: both;">

                    <div style="border:solid thin #aaa; padding: 10px;background-color: white;">

                        <form method="post" enctype="multipart/form-data">

                            <textarea name="post" placeholder="Post a comment"></textarea>
                            <input type="hidden" name="parent" value="<?php echo $ROW['postid'] ?>">
                            <input type="file" name="file">
                            <input id="post_button" type="submit" value="Post">
                            <br>
                        </form>
                    </div>

                    <?php

                    $comments = get_comments($ROW['postid']);

                    if (is_array($comments)) {

                        foreach ($comments as $COMMENT) {
                            # code...

                            include("comment.php");
                        }
                    }
                    ?>
                </div>


            </div>
        </div>

    </div>

</body>

</html>