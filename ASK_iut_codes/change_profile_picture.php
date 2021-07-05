<?php require_once('functions/config.php');
require_once('functions/all_common_function.php');
require_once('functions/user_profile_function.php');
require_once('functions/post_function.php');
require_once('functions/login_function.php');
require_once('functions/image_crop_funnction.php');

if (isset($_SESSION['Email'])) {
    $id = $_SESSION['mybook_userid'];
    $user_data = check_login($id);
} else {
    redirect("login.php");
}


if ($_SERVER['REQUEST_METHOD'] == "POST") {

    if (isset($_FILES['file']['name']) && $_FILES['file']['name'] != "") {

        if ($_FILES['file']['type'] == "image/jpeg") {
            $allowed_size = (1024 * 1024) * 5;
            if ($_FILES['file']['size'] < $allowed_size) {
                $filename = "uploads/" . $_FILES['file']['name'];
                move_uploaded_file($_FILES['file']['tmp_name'], $filename);


                //crop_image($filename, $filename, 800, 800);

                if (file_exists($filename)) {
                    $userid = $user_data['userid'];
                    $query = "update users set profile_image = '$filename' where userid= '$userid' limit 1";

                    save($query);

                    redirect("profile.php");
                } else if (file_exists($filename)) {
                    $userid = $user_data['userid'];
                    $query = "update users_faculty set profile_image = '$filename' where userid= '$userid' limit 1";

                    save($query);

                    redirect("profile.php");
                } else {
                    echo "<div style='text-align:center;font-size:12px;color:white;background-color:grey;'>";
                    echo "<br>The following errors occured:<br><br>";
                    echo "please add a valid image";
                    echo "</div>";
                }
            } else {
                echo "<div style='text-align:center;font-size:12px;color:white;background-color:grey;'>";
                echo "<br>The following errors occured:<br><br>";
                echo "Only images of size 5 MB or lower are allowed";
                echo "</div>";
            }
        } else {
            echo "<div style='text-align:center;font-size:12px;color:white;background-color:grey;'>";
            echo "<br>The following errors occured:<br><br>";
            echo "Only image of jpeg type are allowed";
            echo "</div>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Change Profile Image | AskIUT</title>
    <link rel="stylesheet" href="css/bootstrap.css">
</head>

<style type="text/css">
    #top_bar {
        height: 50px;
        background-color: #060930;
        color: #EEEEEE;
        font-family: 'Satisfy', cursive;
    }

    #user_pic {
        position: relative;
        top: 20px;
    }

    #post_button {
        float: right;
        background-color: #000000;
        border: none;
        color: white;
        padding: 4px;
        font-size: 14px;
        border-radius: 2px;
        width: 50px;
    }
</style>

<body style="font-family: helvetica; background-image:linear-gradient(to right, rgba(255,0,0,0), rgba(126,164,246,1));">
    <!--top bar-->
    <br>
    <?php include("topbar.php"); ?>

    <!--Menu button area-->

    <!--below cover area-->
    <div style="display: flex;">

        <!--notice board area-->
        <div style="flex:content">

            <!--posts area-->
            <div style="flex:2.5; padding:20px; min-height: 400px; padding-right: 0px;">


                <form method="post" enctype="multipart/form-data">
                    <div style="border: solid thin #aaa; padding: 10px; background-color:white;">
                        <input type="file" name="file">
                        <input id="post_button" type="submit" value="Change!">
                        <br>
                </form>

            </div>


        </div>

    </div>
    </div>
</body>

</html>