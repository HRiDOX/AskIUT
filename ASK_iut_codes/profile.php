<?php require_once('functions/config.php');



//print_r($_SESSION);


if (isset($_SESSION['mybook_userid']) || isset($_SESSION['Email']) || isset($_COOKIE['email'])) {

    $id = $_SESSION['mybook_userid'];

    $result = check_login($id);
    print_r($result);
    if ($result) {
        $user_data = get_data($id);;
        echo "everything working fine";
    } else {
        redirect("login.php");
    }
} else {

    redirect("login.php");
}
print_r($user_data)
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <link rel="stylesheet" href="style.css">
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
        width: 150px;
        margin-top: 20px;
        border-radius: 50%;
        border: 2px solid #ffffff;
    }

    #menu_button {
        width: 100px;
        display: inline-block;
        margin: 2px;
        /* background-color: #2F5D62; */
        color: #313f3b;
        font-size: 14px;



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



<body style="font-family: Georgia, serif;background: linear-gradient(to left, #2F5D62,#DFEEEA);">
    <!--Top Bar-->
    <div id="My_bar">
        <div style="width: 800px;margin:auto;font-size: 30px;padding: 5px;">
            AskIUT &nbsp &nbsp <input type="text" id="Search_box" placeholder="Search Your Knowledge😊">
            <img src="Anika.jpg" style="width: 40px; float:right; border-radius:30px;border: 2px solid white;">


        </div>

    </div>
    <!--cover Area-->


    <div style="width:800px;margin:auto;font-size: 30px;">

        <div style="background: linear-gradient(to left, #2F5D62,#DFEEEA) ;min-height:400px;text-align:center;color:#2F5D62 ">
            <img id="Pro_Pic" src="Anika.jpg">
            <br>
            <div style="font-size: 20px;">
                <?php echo $user_data['UserName']; ?>
            </div>
            <div id="menu_button"> Timeline</div>
            <div id="menu_button"> About </div>
            <div id="menu_button">Friends</div>
            <div id="menu_button">Photos</div>
            <div id="menu_button">Settings</div>
        </div>
        <!-- Below Cover Area -->
        <div style="width:800px;display:flex;">
            <!-- Friends Area -->
            <div style="min-height:400px;flex:1">
                <div id="friends_bar">
                    Friend <br>
                    <div id="friends">
                        <img id="friends_img" src="homePage.png">
                        <br>
                        Home Page
                    </div>
                    <div id="friends">
                        <img id="friends_img" src="group.png">
                        <br>
                        Groups
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
                    <textarea placeholder="Ask Your Question...."></textarea>
                    <input id="post_button" type="submit" value="Ask!">
                    <br>
                </div>
                <!-- post -->
                <div id="post_bar">
                    <!-- post 1 -->
                    <div id="post">
                        <div>
                            <img src="user1.jpg" style="width: 75px;margin-right:4px;">
                        </div>
                        <div>
                            <div style="font-weight:bold;color: #2F5D62">The Girl</div>
                            <p>Curabitur sodales ligula in libero. Sed dignissim lacinia nunc. Curabitur tortor.
                                Pellentesque nibh. Aenean quam. In scelerisque sem at dolor. Maecenas mattis. Sed
                                convallis tristique sem. <b>Vestibulum lacinia arcu eget nulla</b>. Proin ut ligula
                                vel
                                nunc egestas porttitor. Morbi lectus risus, iaculis vel, suscipit quis, luctus non,
                                massa. Fusce ac turpis quis ligula lacinia aliquet. Mauris ipsum. Nulla metus metus,
                                ullamcorper vel, tincidunt sed, euismod in, nibh. <i>Lorem ipsum dolor sit amet,
                                    consectetur adipiscing elit</i>. Quisque volutpat condimentum velit. </p>
                            <a href="">Like</a> . <a href="">Comment</a> . <span style="color: #aaa;">Jun 24
                                2021</span>
                        </div>
                    </div>
                    <!-- post 2 -->
                    <div id="post">
                        <div>
                            <img src="user2.jpg" style="width: 75px;margin-right:4px;">
                        </div>
                        <div>
                            <div style="font-weight:bold;color: #2F5D62"> Anika Another Girl</div>
                            <p>Curabitur sodales ligula in libero. Sed dignissim lacinia nunc. Curabitur tortor.
                                Pellentesque nibh. Aenean quam. In scelerisque sem at dolor. Maecenas mattis. Sed
                                convallis tristique sem. <b>Vestibulum lacinia arcu eget nulla</b>. Proin ut ligula
                                vel
                                nunc egestas porttitor. Morbi lectus risus, iaculis vel, suscipit quis, luctus non,
                                massa. Fusce ac turpis quis ligula lacinia aliquet. Mauris ipsum. Nulla metus metus,
                                ullamcorper vel, tincidunt sed, euismod in, nibh. <i>Lorem ipsum dolor sit amet,
                                    consectetur adipiscing elit</i>. Quisque volutpat condimentum velit. </p>
                            <a href="">Like</a> . <a href="">Comment</a> . <span style="color: #aaa;">Jun 24
                                2021</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

</body>

</html>