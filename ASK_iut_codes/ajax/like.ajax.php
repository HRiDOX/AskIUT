<?php



//if (isset($_SESSION['Email'])) {
 if(!isset($_SESSION['mybook_userid']))
 {
     die;
 }
//	$user_data = check_login($id);
//} else {
//	redirect("login.php");
//}

$query_string = explode("?", $data->link);
$query_string = end($query_string);

$str = explode("&", $query_string);

foreach ($str as $value) {
  # code...
  $value = explode("=", $value);
  $_GET[$value[0]] = $value[1];
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

	//read likes
	$likes = get_likes($_GET['id'],$_GET['type']);
    $obj = (object)[];
    $obj->likes = count($likes);
    $obj->action = "like_post";
    echo json_encode($obj);
}
