<?php


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

                redirect("admin.php");
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
//isset($_SESSION['mybook_userid'])||isset($_SESSION['Email']) || isset($_COOKIE['email'])

function check_login($id)
{
    if (is_numeric($id)) {

        $query = "select *from users where userid ='$id' and Active ='1' ";
        $result = read($query);
        if ($result) {
            $user_data = $result[0];
            return $user_data;
        } else {
            $query1 = "select * from users_faculty where userid ='$id' and Active ='1' ";
            $result1 = read($query1);
            if ($result1) {
                $user_data1 = $result1[0];
                return $user_data1;
            } else {

                redirect("login.php");
            }
        }
    } else {

        redirect("login.php");
    }
}
