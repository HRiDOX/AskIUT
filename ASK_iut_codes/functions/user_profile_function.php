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



// after login user profile

function check_login($id)
{


    $query = "select userid from users where userid ='$id' and Active ='1' ";
    $result = Query($query);
    if ($result) {
        return true;
    } else {
        $query1 = "select userid from users_faculty where userid ='$id' and Active ='1' ";
        $result1 = Query($query1);
        if ($result1) {
            return true;
        } else {
            return false;
        }
    }
}
///getting data from databse for using in profile
function get_data($id)
{

    $query = "select *from users where userid='$id' and Active = '1'";

    $result = read($query);
    if ($result) {
        $row = $result[0];
        return $row;
    } else {
        $query1 = "select *from users_faculty where userid='$id' and Active = '1'";

        $result1 = read($query1);
        if ($result1) {
            $row1 = $result1[0];
            return $row1;
        } else {
            return false;
        }
    }
}

function get_user($id)
{

    $query = "select  *from users where userid ='$id' and Active='1'";
    $result = read($query);

    if ($result) {
        return $result[0];
    } else {
        return false;
    }
}
