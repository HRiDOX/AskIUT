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
        // setcookie('message', $msg, time() + 10);
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
//User Validation Function

function user_validation()
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {


        $FirstName = clean($_POST['FirstName']);
        $LastName = clean($_POST['LastName']);
        $UserName = clean($_POST['UserName']);

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

            if (user_registration($FirstName, $LastName, $UserName, $Email, $Pass)) {
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


//User Student Registration Function

function user_registration($FName, $LName, $UName, $Email, $Pass)
{
    $FirstName = escape($FName);
    $LastName  = escape($LName);
    $UserName = escape($UName);
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

        $sql = "Insert into users(userid,FirstName ,LastName,UserName,Email,Password,Validation_Code,Active,url_address) values('$userid','$FirstName','$LastName',' $UserName','$Email','$Password','$Validation_code','0','$url_address')";

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

//Activation Function

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

///////////////////////////////recover function/////////
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


/////////validation  code function

function validation_code()
{

    if (isset($_COOKIE['temp_code'])) {
        if (!isset($_GET['Email']) && !isset($_GET['Code'])) {
            redirect("index.php");
        }
         else if (empty($_GET['Email']) && empty($_GET['Code'])) {
            redirect("index.php");
        } 
        else {
            if (isset($_POST['recover-code'])) {
                 $Code = $_POST['recover-code'];
                 $Email = $_GET['Email'];

                 $query = "select *from users where Validation_Code='$Code' and Email='$Email' ";
                 $result = Query($query);

                 if (fatech_data($result)) {
                     redirect("reset.php");
                 }
                 else{

                    echo Error_validation("Query Failed");
                 }

            }
        }
    } else {
        set_message('<div class="alert alert-danger"> Your Code Has Been Expired :) </div>');
        redirect("recover.php");
    }
}
