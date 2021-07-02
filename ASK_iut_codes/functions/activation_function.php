

<?php
//Clean String Values

function clean($string)
{
    return htmlentities($string);
}

//Redirecttion
function redirect($location)
{
    return header("location:{$location}");
}

// set session message

function set_message($msg)
{
    if (!empty($msg)) {
        $_SESSION['Message'] = $msg;
    } else {
        $msg = "";
    }
}

// Display Message Function

function  display_message()
{

    if (isset($_SESSION['Message'])) {

        echo $_SESSION['Message'];
        unset($_SESSION['Message']);
    }
}

//Generate Taken

function Token_Generator()
{

    $token = $_SESSION['token'] = md5(uniqid(mt_rand(), true));
    return $token;
}

// send email function
function send_email($email, $sub, $msg, $header)
{

    return mail($email, $sub, $msg, $header);
}


//***********************User Validation Function** */

//errors function

function Error_validation($Error)
{
    return '<div class="alert alert-danger">' . $Error . '</div>';
}

//creating user_id
function create_userid()
{

    $length = rand(4, 19);
    $number = '';
    for ($i = 0; $i < $length; $i++) {
        $new_rand = rand(0, 9);
        $number = $number . $new_rand;
    }

    return $number;
}

//Email Exits Function stdent/faculty

function Email_Exits($email)
{
    $sql = "select *from users where Email = '$email'";
    $result = query($sql);
    if (fatech_data($result)) {
        return true;
    } else {
        return false;
    }
}
function faculty_Email_Exits($email)
{
    $sql = "select *from users_faculty where Email = '$email'";
    $result = query($sql);
    if (fatech_data($result)) {
        return true;
    } else {
        return false;
    }
}


// User name Exists Function
function User_Exits($user)
{
    $sql = "select *from users where UserName = '$user'";
    $result = query($sql);
    if (fatech_data($result)) {
        return true;
    } else {
        return false;
    }
}
function faculty_User_Exits($user)
{
    $sql = "select *from users_faculty where UserName = '$user'";
    $result = query($sql);
    if (fatech_data($result)) {
        return true;
    } else {
        return false;
    }
}


function users_activation()
{
    if ($_SERVER['REQUEST_METHOD'] == "GET") {
        $Email = $_GET['Email'];
        $Code = $_GET['Code'];

        $sql = " select * from users where Email = '$Email' AND Validation_Code= '$Code'";
        $result = Query($sql);
        Confirm($result);

        if (fatech_data($result)) {
            $sqlquery = "update users set Active = '1' , Validation_Code = '0' where Email='$Email' AND Validation_Code= '$Code' ";
            $result2 = Query($sqlquery);
            Confirm($result2);
            set_message('<p class = "bg-success text-center lead">Your Account Successfully Activated </p>');
            redirect('login.php');
        } else {
            echo '<p class = "bg-danger text-center lead">Your account  not Activated ! try again later </p>';
        }
    }
}

function faculty_activation()
{
    if ($_SERVER['REQUEST_METHOD'] == "GET") {
        $Email = $_GET['Email'];
        $Code = $_GET['Code'];

        $sql = " select * from users_faculty where Email = '$Email' AND Validation_Code= '$Code'";
        $result = Query($sql);
        Confirm($result);

        if (fatech_data($result)) {

            $sqlquery = "update users_faculty set Active = '1' , Validation_Code = '0' where Email='$Email' AND Validation_Code= '$Code' ";
            $result2 = Query($sqlquery);
            Confirm($result2);
            set_message('<p class = "bg-success text-center lead">Your Account Successfully Activated </p>');
            redirect('login.php');
        } else {
            echo '<p class = "bg-danger text-center lead">Your account  not Activated ! try again later </p>';
        }
    }
}