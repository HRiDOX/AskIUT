<?php
require_once('functions/config.php');
require_once('functions/all_common_function.php');
require_once('functions/user_profile_function.php');
require_once('functions/post_function.php');
require_once('functions/login_function.php');


if (isset($_SESSION['Email'])) {
	$d = $_SESSION['mybook_userid'];
	$user_data = check_login($d);
} else {
	redirect("login.php");
}


if (isset($_SERVER['HTTP_REFERER'])) {

	redirect($_SERVER['HTTP_REFERER']);
} else {
	redirect("profile.php");
}


if (isset($_GET['type']) && isset($_GET['id'])) {

	if (is_numeric($_GET['id'])) {

		$allowed[] = 'post';
		$allowed[] = 'user';
		$allowed[] = 'comment';

		if (in_array($_GET['type'], $allowed)) {


			
			if($_GET['type'] == "user"  ){
					follow_user($_GET['id'],$_GET['type'],$_SESSION['mybook_userid']);
					like_post($_GET['id'], $_GET['type'], $_SESSION['mybook_userid']);
				}else if ($_GET['type'] == "user" || $_GET['type'] == "post") 
					# code...
				{
                      like_post($_GET['id'], $_GET['type'], $_SESSION['mybook_userid']);   
				}
		}
	}
}
