<?php

include("all_common_function.php");




///////////////////////////////recover function/////////
function recover_password()
{
if($_SERVER['REQUEST_METHOD'] == "POST")
{
if(isset($_SESSION['token']) && $_POST['token'] == $_SESSION['token'])
{
$Email = $_POST['UEmail'];
if(Email_Exists($Email))
{
$code = md5($Email+microtime());
setcookie('temp_code',$code,time()+300);
$sql = "update users set Validation_Code='$code' where Email='$Email'";
Query($sql);
$Subject = " Please Reset the Password ";
$Message = "Please Follow on Below Link to Reset the Password '<b>{$code}</b>' http://localhost/loginpro/code.php?Email='$Email'&Code='$code'";
$header = "noreply@onlineittuts.com";
if(send_email($Email,$Subject,$Message,$header))
{
echo '<div class="alert alert-success"> Please Check Your Email :) </div>';
}
else
{
echo Error_validation(" We Coudn't Send an Email ");
}
}
else
{
echo Error_validation(" Email Not Found....");
}
}
else
{
redirect("index.php");
}
}
}

/////////validation  code function

function validation_code()
{
if(isset($_COOKIE['temp_code']))
{
if(!isset($_GET['Email']) && !isset($_GET['Code']))
{
redirect("index.php");
}
else if(empty($_GET['Email']) && empty($_GET['Code']))
{
redirect("index.php");
}
else
{
if(isset($_POST['recover-code']))
{
$Code = $_POST['recover-code'];
$Email = $_GET['Email'];
$query = "select * from users where Validation_Code='$Code' and Email='$Email'";
$result = Query($query);
if(fatech_data($result))
{
setcookie('temp_code',$Code, time()+300);
redirect("reset.php?Email=$Email&Code=$Code");
}
else
{
echo Error_validation(" Your Code is Wrong :) ");
}
}
}
}
else
{
set_message('<div class="alert alert-danger"> Your Code Has Been Expired :) </div>');
redirect("recover.php");
}
}


function hash_text($text)
{

    $text = hash("sha1", $text);
    return $text;
}