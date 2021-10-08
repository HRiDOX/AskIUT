<?php
require_once('functions/config.php');
require_once('functions/all_common_function.php');
require_once('functions/user_profile_function.php');
require_once('functions/post_function.php');
require_once('functions/login_function.php');


if (isset($_SESSION['Email'])) {
	$id = $_SESSION['mybook_userid'];
	$user_data = check_login($id);
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
           if($_GET['type']== 'post'){
					like_post($_GET['id'], $_GET['type'], $_SESSION['mybook_userid']);
					
				}

			
			if($_GET['type']== 'user'){
					
					follow_user($_GET['id'],$_GET['type'],$_SESSION['mybook_userid']);
					like_post($_GET['id'], $_GET['type'], $_SESSION['mybook_userid']);
				
					
				}
		}
	}
}
/*$likes = get_likes($_GET['id'],$_GET['type']);

if(is_array($likes)){
	echo count($likes);
}else{
	echo 0;
}*/