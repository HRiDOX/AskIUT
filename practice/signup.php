<?php
    include("classes/connect.php");
    include("classes/signup.php");

        $first_name = "" ;
        $last_name = "";
        $email = "";
        $department = "";
        $program = "";
        $batch = "";

    if($_SERVER['REQUEST_METHOD']== 'POST')
    {
        $signup = new Signup();
        $result=$signup->evaluate($_POST);

        if($result != "")
        {
            echo "<div style='text-align: center; font-size: 14px; color:white; background-color: black;'>";
            echo "<br>The following errors occured><br><br>";
            echo $result;
            echo "</div>";
        }
        $first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
        $email = $_POST['email'];
        $batch = $_POST['batch'];
        
    }     

?>
<html>
    <head>
        <title>AskIUT | Signup</title>
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
                min-height: 200px;
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
            <div id="signup_button">Login</div>
        </div>
        <div id="login_bar">
            Sign up to AskIUT <br> <br>
            <form method="post" action="signup.php">
                <input value="<?php echo $first_name ?>" name="first_name" type="text" id="text" placeholder="First Name"> <br><br>
                <input value="<?php echo $last_name ?>" name="last_name" type="text" id="text" placeholder="Last Name"> <br><br>
                <input value="<?php echo $email ?>" name="email" type="text" id="text" placeholder="Email"> <br><br>
                <span>Department:</span><br>
                <select name="Department" id="text">
                <option><?php echo $department ?></option>
                    <option>MCE</option>
                    <option>EEE</option>
                    <option>CEE</option>
                    <option>CSE</option>
                    <option>TVE</option>
                    <option>BTM</option>
                </select><br>
                <span>Program:</span> <br>
                <select name="Program" id="text">

                <option ><?php echo $program ?></option>
                    <option>MCE</option>
                    <option>IPE</option>
                    <option>EEE</option>
                    <option>CEE</option>
                    <option>CSE</option>
                    <option>SWE</option>
                    <option>BTM</option>
                </select><br><br>
                <input value="<?php echo $batch ?>" name="batch" type="text" id="text" placeholder="Batch (Admission year)"> <br><br>
                <input name="password" type="password" id="text" placeholder="Password"> <br><br>
                <input name="password2" type="password" id="text" placeholder="Retype Password"> <br><br>
                <input type="submit" id="button" value="Sign up"><br><br><br>
            </form>
        </div>
    </body>
</html>
