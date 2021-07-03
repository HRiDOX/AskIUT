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








function recover_password()
{

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        if (isset($_SESSION['token']) && $_POST['token'] == $_SESSION['token']) {

            $Email = $_POST['UEmail'];
            if (Email_Exits($Email)) {


                $code = md5('$Email + microtime()');
                setcookie('temp_code', $code, time() + 60);
                $sql = "update users set Validation_Code='$code' where Email='$Email'";
                Query($sql);
                $Subject = "Please Reset The Password";
                $Message = "Please Follow On Below Link To Reset The Password http://localhost/loginpro/AskIUT/ASK_iut_codes/code.php?Email='$Email'&Code='$code'";
                $header = "rgrrf123@gmail.com";
                if (send_email($Email, $Subject, $Message, $header)) {
                    echo '<div class = "alert alert-success">PLease Check Your Email:)</div>';
                } else {

                    echo Error_validation("We Couldn't Send an Email");
                }
            } else if (faculty_Email_Exits($Email)) {
                echo 'data working';
            } else {

                echo Error_validation("Email not Found .......");
            }
        } else {
            redirect("index.php");
        }
    }
}
 