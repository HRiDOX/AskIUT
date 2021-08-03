<?php


//User Validation Function
include("all_common_function.php");
function user_validation()
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {


        $FirstName = clean($_POST['FirstName']);
        $LastName = clean($_POST['LastName']);
        $UserName = clean($_POST['UserName']);
        $Batch = clean($_POST['Batch']);
        $Department = clean($_POST['Department']);


        $Email = clean($_POST['Email']);
        $Pass = clean($_POST['pass']);
        $CPass = clean($_POST['cpass']);


        $Errors = [];
        $Max = 20;
        $Min = 05;
        //Check the First Name Characters

        if (strlen($FirstName) < $Min) {
            $Errors[] = "First Name Cannot Be less than ($Min) Characters ";
        }
        //Check the First Name Characters
        if (strlen($FirstName) > $Max) {
            $Errors[] = "First Name Cannot Be more than ($Max) Characters ";
        }
        //Check the last Name Characters
        if (strlen($LastName) < $Min) {
            $Errors[] = "Last Name Cannot Be less than ($Min) Characters ";
        }
        //Check the last Name Characters
        if (strlen($LastName) > $Max) {
            $Errors[] = "Last Name Cannot Be more than ($Max) Characters ";
        }
        //Check the user Characters
        if (!preg_match("/^[a-z,A-Z,0-9]*$/", $UserName)) {

            $Errors[] = "User Name cannot be accept those  Characters ";
        }
        //check the email existance
        if (Email_Exits($Email)) {
            $Errors[] = "Email Already Registered";
        }
        //check the username existance
        if (User_Exits($UserName)) {
            $Errors[] = "User Name Already Registered";
        }
        // password & confirm password matching
        if ($Pass != $CPass) {
            $Errors[] = "Password Not Matched";
        }
        if (!empty($Errors)) {
            foreach ($Errors as $Error) {
                echo Error_validation($Error);
            }
        } else {

            if (user_registration($FirstName, $LastName, $UserName, $Batch, $Department, $Email, $Pass)) {
                set_message('<p class = "bg-success text-center lead">You Have Succesfully Registered Please ! Check Your Activation Link </p>');
                redirect("index.php");
            } else {
                set_message('<p class = "bg-danger text-center lead">Your account is not registered  Please ! try again letter </p>');
                redirect("index.php");
            }
        }
    }
}


function faculty_validation()
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {


        $FirstName = clean($_POST['FirstName']);
        $LastName = clean($_POST['LastName']);
        $UserName = clean($_POST['UserName']);
        $Department = clean($_POST['Department']);
        $Faculty = clean($_POST['Faculty']);
        $Email = clean($_POST['Email']);
        $Pass = clean($_POST['pass']);
        $CPass = clean($_POST['cpass']);


        $Errors = [];
        $Max = 20;
        $Min = 05;
        //Check the First Name Characters

        if (strlen($FirstName) < $Min) {
            $Errors[] = "First Name Cannot Be less than ($Min) Characters ";
        }
        //Check the First Name Characters
        if (strlen($FirstName) > $Max) {
            $Errors[] = "First Name Cannot Be more than ($Max) Characters ";
        }
        //Check the last Name Characters
        if (strlen($LastName) < $Min) {
            $Errors[] = "Last Name Cannot Be less than ($Min) Characters ";
        }
        //Check the last Name Characters
        if (strlen($LastName) > $Max) {
            $Errors[] = "Last Name Cannot Be more than ($Max) Characters ";
        }
        //Check the user Characters
        if (!preg_match("/^[a-z,A-Z,0-9]*$/", $UserName)) {

            $Errors[] = "User Name cannot be accept those  Characters ";
        }
        //check the email existance
        if (faculty_Email_Exits($Email)) {
            $Errors[] = "Email Already Registered";
        }
        //check the username existance
        if (faculty_User_Exits($UserName)) {
            $Errors[] = "User Name Already Registered";
        }
        // password & confirm password matching
        if ($Pass != $CPass) {
            $Errors[] = "Password Not Matched";
        }
        if (!empty($Errors)) {
            foreach ($Errors as $Error) {
                echo Error_validation($Error);
            }
        } else {

            if (faculty_registration($FirstName, $LastName, $UserName, $Department, $Faculty, $Email, $Pass)) {
                set_message('<p class = "bg-success text-center lead">You Have Succesfully Registered Please ! Check Your Activation Link </p>');
                redirect("index.php");
            } else {
                set_message('<p class = "bg-danger text-center lead">Your account is not registered  Please ! try again letter </p>');
                redirect("index.php");
            }
        }
    }
}





//User Student Registration Function

function user_registration($FName, $LName, $UName, $Batch, $Depart, $Email, $Pass)
{
    $FirstName = escape($FName);
    $LastName  = escape($LName);
    $UserName = escape($UName);
    $Batch = escape($Batch);
    $Department = escape($Depart);

    $Email = escape($Email);
    $Pass = escape($Pass);

    if (Email_Exits($Email)) {

        return true;
    } else if (User_Exits($UserName)) {
        return true;
    } else {
        $Password = md5($Pass);
        $Validation_code = md5('$UserName + microtime()');
        $userid = create_userid();
        $url_address = strtolower($FirstName) . "." . strtolower($LastName);

        $sql = "Insert into users(userid,FirstName ,LastName,UserName,Batch,Department,Email,Password,Validation_Code,Active,url_address) values('$userid','$FirstName','$LastName',' $UserName','$Batch','$Department','$Email','$Password','$Validation_code','0','$url_address')";

        $result = query($sql);

        $subject = "Active Your Account";
        $msg = " Please Click The Link Below to Active Your Account   http://localhost/LOGINPRO/AskIUT/ASK_iut_codes/users_activate.php?Email=$Email&Code=$Validation_code";
        $header = "From From No-Reply rgrrf123@gmail.com";

        send_email($Email, $subject, $msg, $header);

        Confirm($result);
        return true;
    }
}

//User Faculty Registration Function

function faculty_registration($FName, $LName, $UName, $Depart, $Faculty, $Email, $Pass)
{
    $FirstName = escape($FName);
    $LastName  = escape($LName);
    $UserName = escape($UName);
    $Department = escape($Depart);
    $Faculty = escape($Faculty);
    $Email = escape($Email);
    $Password = escape($Pass);


    if (faculty_Email_Exits($Email)) {

        return true;
    } else if (faculty_User_Exits($UserName)) {
        return true;
    } else {
        $Password = md5($Pass);
        $Validation_code = md5('$UserName + microtime()');
        $userid = create_userid();
        $url_address = strtolower($FirstName) . "." . strtolower($LastName);

        $sql = "Insert into users_faculty(userid,FirstName ,LastName,UserName,Department,Faculty,Email,Password,Validation_Code,Active,url_address) values('$userid','$FirstName','$LastName',' $UserName','$Department','$Faculty','$Email','$Password','$Validation_code','0','$url_address')";

        $result = query($sql);
        $subject = "Active Your Account";
        $msg = " Please Click The Link Below to Active Your Account    http://localhost/LOGINPRO/AskIUT/ASK_iut_codes/faculty_activate.php?Email=$Email&Code=$Validation_code";
        $header = "From From No-Reply rgrrf123@gmail.com";

        send_email($Email, $subject, $msg, $header);

        Confirm($result);
        return true;
    }
}
