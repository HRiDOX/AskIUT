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
///
//user login validation

function login_validation()
{
    $Errors = [];
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $UserEmail = clean($_POST['UEmail']);
        $UserPass = clean($_POST['UPass']);
        $Remember = isset($_POST['remember']);

        if (empty($UserEmail)) {
            $Errors[] = "Please Enter Your Email";
        }
        if (empty($UserPass)) {

            $Errors[] = "Please Enter Your Password";
        }

        if (!empty($Errors)) {

            foreach ($Errors as $Error) {

                echo Error_validation($Error);
            }
        } else {
            if (user_login($UserEmail, $UserPass, $Remember)) {

                redirect("profile.php");
            } else {
                echo Error_validation("Please Enter Correct Email or Password");
            }
        }
    }
}




//User login function
function user_login($UEmail, $UPass, $Remember)
{
    $query = "select *from users where Email ='$UEmail' and Active ='1' ";
    $result = Query($query);
    if ($row = fatech_data($result)) {
        $db_pass = $row['Password'];
        if (md5($UPass) == $db_pass) {
            $_SESSION['mybook_userid'] = $row['userid'];
            if ($Remember == true) {

                setcookie('email', $UEmail, time() + 86400);
            }
            $_SESSION['Email'] = $UEmail;

            return true;
        }
    } else {
        $query1 = "select *from users_faculty where Email ='$UEmail' and Active ='1' ";

        $result1 =  Query($query1);

        if ($row1 = fatech_data($result1)) {

            $db_pass1 = $row1['Password'];

            if (md5($UPass) == $db_pass1) {
                $_SESSION['mybook_userid'] = $row1['userid'];
                if ($Remember == true) {

                    setcookie('email', $UEmail, time() + 86400);
                }
                $_SESSION['Email'] = $UEmail;
                return true;
            } else {
                return false;
            }
        }
    }
}

//logged in Function

function logged_in()
{
    if (isset($_SESSION['Email']) || isset($_COOKIE['email'])) {
        return true;
    } else {
        return false;
    }
}
// after login user profile
