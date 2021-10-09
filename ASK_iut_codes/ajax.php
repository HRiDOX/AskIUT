<?php
require_once('functions/config.php');
require_once('functions/all_common_function.php');
require_once('functions/user_profile_function.php');
require_once('functions/post_function.php');
require_once('functions/login_function.php');

$data = file_get_contents("php://input");
if($data != ""){
    $data = json_decode($data);
}

if(isset($data->action) && $data->action == "like_post")
{
   include "ajax/like.ajax.php";
}
