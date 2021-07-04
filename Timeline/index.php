<?php 
session_start();
include("classes/post.php");
   include("classes/login.php");
    include("classes/user.php");
    include("classes/post.php");
    $login= new login();
    $user_data = $login->check_login($_SESSION['mybook_userid']);
    ?>
<!DOCTYPE html>
    <html lang="en">
    <head>
        <title>Timeline | AskIUT</title>
    </head>

    <style type="text/css">
        
        #top_bar{
            height: 50px;
            background-color: #060930;
            color: #EEEEEE;
            font-family: 'Satisfy',cursive;
        }
        #search_box{
            width: 400px;
            height: 20px;
            border-radius: 10px;
            border: none; 
            padding: 4px;
            font-size: 14px;
            background-image:url(rsz_search.png);
            background-repeat: no-repeat;
            background-position: right;
            position: relative;
            left:100px;
            bottom:30px;
        }

        #user_pic{
            position:relative;
            top: 20px;
        }

        #menu_buttons{
            width: 100px;
            display: inline;
            margin: 20px;
        }

        #notice_box{
            width:90%;
            border: none; 
            padding: 4px;
            font-size: 14px;
            font-family: helvetica;
        }

        #notice_board{
            background-color: #595B83;
            min-height: 400px;
            margin-top: 20px;
            color: #222831;
            padding: 8px;
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

        #posting_post{
            width: 100%;
            border: none; 
            padding: 4px;
            font-size: 14px;
            font-family: helvetica;
            height: 60px;
        }
        #post_bar{
            margin-top: 20px;
            background-color: white;
            padding: 10px;
        }
        #post{
            padding: 4px;
            font-size: 12px;
            display: flex;
            margin-bottom:20px;
        }

    </style>
    
    <body style="font-family: helvetica; background-image:linear-gradient(to right, rgba(255,0,0,0), rgba(126,164,246,1));">
       <!--top bar-->
        <div id="top_bar">
            <div style="width: 800px; margin:auto; font-size: 30px; text-align:center;">
                AskIUT
             </div>
        
        </div>
        <!--search bar-->
        <div>
            <div style="width: 800px; margin:auto;min-height:70px;">
            <a href="profile.php"><img src="milkmocha.jpg" id="user_pic" style="width: 50px; border-radius:50px;margin:20px;"></a>
                <input type="text" id="search_box" placeholder="Search tags for posts">
            
            </div>
        </div>

        <br>
        <!--Menu button area-->
        <div style="width: 800px;margin:auto; min-height:400px;">
            <div style="text-align:center; color:#222831">
                <div id="menu_buttons"> <a href="timeline.php"> Timeline</a></div>
                <div id="menu_buttons">Repository </div>
                <div id="menu_buttons">Groups</div>
                <div id="menu_buttons">Settings</div>
            </div>

            <!--below cover area-->
            <div style="display: flex;">

                <!--notice board area-->
                <div style="flex:1; min-height: 400px;">
                    <div id="notice_board">
                        Notice Board <br>
                        <textarea id="notice_box" placeholder="Share a Notice" ></textarea>
                        <input id="post_button" type="submit" value="Share!">
                    </div>
            
                </div>

                <!--posts area-->
                <div style="flex:2.5; padding:20px; min-height: 400px; padding-right: 0px;">

                    <div style="border: solid thin #aaa; padding: 10px; background-color:white;">
                        <textarea id="posting_post" placeholder="What's your query?"></textarea>
                        <input id="post_button" type="submit" value="Post!">
                        <br>
                    </div>
                <!--posts-->
                    <div id="post_bar">
                    <!--post 1-->
                        <div id="post">
                            <div>
                                <img src="milkmocha.jpg" style="width: 70px; margin-right: 4px; border-radius:50%;">
                            </div>
                            <div>
                                <div style="font-weight: bold; color: black;"> Milk and Mocha </div>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras sed consectetur dolor. Maecenas pulvinar risus euismod tincidunt varius. Suspendisse malesuada nunc efficitur augue vulputate rutrum. Aliquam aliquet accumsan mollis. Morbi cursus massa in nunc volutpat, in euismod magna fringilla. Nunc quis sollicitudin justo. Duis nec ipsum in magna rhoncus dignissim ut et justo. Sed suscipit commodo ante.
                                <br/><br/>
                                <a href="">Like</a> . <a href="">Comment</a> . <span style="#999;">June 28 2021</span>
                                </div>
                            </div>

                        <!--post 2-->
                        <div id="post">
                            <div>
                                <img src="panda.jpg" style="width: 70px; margin-right: 4px; border-radius:50%;">
                            </div>
                            <div>
                                <div style="font-weight: bold; color: black;"> Panda </div>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras sed consectetur dolor. Maecenas pulvinar risus euismod tincidunt varius. Suspendisse malesuada nunc efficitur augue vulputate rutrum. Aliquam aliquet accumsan mollis. Morbi cursus massa in nunc volutpat, in euismod magna fringilla. Nunc quis sollicitudin justo. Duis nec ipsum in magna rhoncus dignissim ut et justo. Sed suscipit commodo ante.
                                <br/><br/>
                                <a href="">Like</a> . <a href="">Comment</a> . <span style="#999;">June 28 2021</span>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
    </body>
</html>