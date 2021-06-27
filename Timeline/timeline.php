<!DOCTYPE html>
    <html lang="en">
    <head>
        <title>Timeline | AskIUT</title>
    </head>

    <style type="text/css">
        
        #red_bar{
            height: 50px;
            background-color: #D53333;
            color: #EEEEEE;
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
        }

        #profile_pic{
            width: 150px;
            margin-top: -200px;
            border-radius: 50%;
            border: solid 2px white;
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
            background-color: #A7BBC7;
            min-height: 400px;
            margin-top: 20px;
            color: #222831;
            padding: 8px;
        }

        #post_button{
            float:right;
            background-color: #2A6171;
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

    </style>
    
    <body style="font-family: helvetica; background-color: #E1E5EA">
       <!--top bar-->
        <div id="red_bar">
            <div style="width: 800px; margin:auto; font-size: 30px;">
                AskIUT &nbsp &nbsp <input type="text" id="search_box" placeholder="Search tags">
                <img src="milkmocha.jpg" style="width: 50px; float:right; border-radius:50px;">
             </div>
        
        </div>
        <br>
        <!--cover area-->
        <div style="width: 800px;margin:auto; min-height:400px;">
            <div style="background-color:white; text-align:center; color:#222831">
                <img src="rsz_cover.jpg" style="width:100%;">
                <img id="profile_pic" src="milkmocha.jpg">
                <br>
                    <div style="font-size: 20px;">User</div>
                <br>
                <div id="menu_buttons">Timeline</div>
                <div id="menu_buttons"> Repository</div>
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
                        <input id="post_button" type="submit" value="Ask!">
                        <br>
                    </div>
            </div>
        </div>
    </body>
</html>