<html>
    <head>
        <title>AskIUT | Login</title>
    </head>
    <style>
        #top_bar{
            height: 100px;
            background-color: #987EF6;
            padding: 4px;
            color: #d9dfeb;
        }
        #signup_button{
            background-color: #42b72a;
            width: 70px;
            text-align: center;
            padding: 4px;
            border-radius: 4px;
            float: right;
        }
        #login_bar{
                background-color: white;
                width: 800px;
                height: 200px;
                margin:auto;
                margin-top: 50px;
                padding: 10px;
                padding-top:50px;
                text-align: center;
                font-weight: bold;
        }
        #text{
            height: 40px;
            width: 300px;
            border-radius: 4px;
            border: solid 1px #aaa;
            padding: 4px;
            font-size: 14px;
        }
        #button{
            width: 300px;
            height: 40px;
            border-radius: 4px;
            border: none;
            background-color: #987EF6;
            color: white;
            font-weight: bold;
        }
    </style>
    <body style="font-family: tahoma; background-color: #e9ebee;">
        <div id="top_bar">
            <div style="font-size:30px;">AskIUT</div>
            <div id="signup_button">Signup</div>
        </div>
        <div id="login_bar">
            Log in to AskIUT <br> <br>

            <input type="text" id="text" placeholder="Email"> <br><br>
            <input type="password" id="text" placeholder="Password"> <br><br>
            <input type="submit" id="button" value="Log in">
        </div>
    </body>
</html>
