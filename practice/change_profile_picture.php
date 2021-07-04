<?php 
session_start();
include("classes/post.php");
   include("classes/login.php");
    include("classes/user.php");
    include("classes/post.php");
    $login= new login();
    $user_data = $login->check_login($_SESSION['mybook_userid']);

    if($_SERVER['REQUEST_METHOD']=="POST")
    {
        
        if(isset($_FILES['file']['name']) && $_FILES['file']['name'] != "")
        {
            $filename = "uploads/" . $_FILES['file']['name'];
            move_uploaded_file($_FILES['file']['tmp_name'], $filename);
            if(file_exists($filename))
            {
                $userid = $user_data['userid'];
                $query = "update users set profile_image = '$filename' where userid= '$userid' limit 1";
                $DB= new Database();
                $DB->save($query);

                header(("Location: profile.php"));
                die;
            }

        }
        else
        {
            echo "<div style='text-align:center;font-size:12px;color:white;background-color:grey;'>";
            echo "<br>The following errors occured:<br><br>";
            echo "please add a valid image";
            echo "</div>";
        }
        
    }
    ?>
<!DOCTYPE html>
    <html lang="en">
    <head>
        <title>Change Profile Image | AskIUT</title>
    </head>

    <style type="text/css">
        
        #top_bar{
            height: 50px;
            background-color: #060930;
            color: #EEEEEE;
            font-family: 'Satisfy',cursive;
        }

        #user_pic{
            position:relative;
            top: 20px;
        }

        #post_button{
            float:right;
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
        <?php include(header.php); ?>
        
        <!--Menu button area-->

            <!--below cover area-->
            <div style="display: flex;">

                <!--notice board area-->
                <div style="flex:;">

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