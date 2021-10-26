<?php

include("image_function.php");
function create_post($userid, $data, $files)
{
    $Errors = [];
    if (!empty($data['post']) || !empty($files['file']['name'])) {
        $myimage = " ";
        $has_image = 0;

        if (!empty($files['file']['name'])) {
            //creating folder
            $folder = "uploads/" . $userid . "/";
            if (!file_exists($folder)) {
                mkdir($folder, 0777, true);
            }



            $myimage = $folder . generate_filename(15) . ".jpg";
            move_uploaded_file($_FILES['file']['tmp_name'], $myimage);
            //after this we need to add resize image function

            $has_image = 1;
        }
        $post = addslashes($data['post']);
        $postid = create_postid();
        $parent = 0;
        
			if(isset($data['parent']) && is_numeric($data['parent'])){

				$parent = $data['parent'];

				$sql = "update posts set comments = comments + 1 where postid = '$parent' limit 1";
				save($sql);
			}
        $query = "insert into posts (userid,postid,post,image,parent,has_image) values ('$userid','$postid','$post','$myimage','$parent','$has_image')";
        save($query);
    } else {
        $Errors[] = "Please type something to post!<br>";
    }
    return $Errors;
}
function create_repository_post($userid, $data, $files)
{
    $Errors = [];
    if (!empty($data['post']) || !empty($files['file']['name'])) {
        $myimage = " ";
        $has_image = 0;

        if (!empty($files['file']['name'])) {
            //creating folder
            $folder = "repository_uploads/" . $userid . "/";
            if (!file_exists($folder)) {
                mkdir($folder, 0777, true);
            }



            $myimage = $folder . generate_filename(15) . ".jpg";
            move_uploaded_file($_FILES['file']['tmp_name'], $myimage);
            //after this we need to add resize image function

            $has_image = 1;
        }
        $post = addslashes($data['post']);
        $postid = create_postid();
        $parent = 0;
        
			/*if(isset($data['parent']) && is_numeric($data['parent'])){

				$parent = $data['parent'];

				$sql = "update posts set comments = comments + 1 where postid = '$parent' limit 1";
				save($sql);
			}*/
        $query = "insert into repository (userid,postid,post,image,has_image) values ('$userid','$postid','$post','$myimage','$has_image')";
        save($query);
    } else {
        $Errors[] = "Please type something to post!<br>";
    }
    return $Errors;
}

function create_postid()
{

    $length = rand(4, 19);
    $number = "";
    for ($i = 0; $i < $length; $i++) {
        $new_rand = rand(0, 9);
        $number = $number . $new_rand;
    }

    return $number;
}
function get_posts($id)
{   
    
    $page_number = 1;
                            
    //$page_number = isset($_Get['page']) ? (int)$_Get['page'] : 1;
    //$page_number = ($page_number<1) ? 1 : $page_number;
    if (isset($_GET['page'])) {
         $page_number = (int)$_GET['page'];
    }
        if ($page_number<1) {
             $page_number = 1;
        }
    $limit = 6;
    $offset =($page_number - 1) * $limit;
    $query = "select * from posts where parent=0 and userid = '$id' order by id desc limit  $limit offset $offset";


    $result = read($query);

    if ($result) {
        return $result;
    } else {
        return false;
    }
}

function get_repository_posts($id)
{   
    
    $page_number = 1;
                            
    //$page_number = isset($_Get['page']) ? (int)$_Get['page'] : 1;
    //$page_number = ($page_number<1) ? 1 : $page_number;
    if (isset($_GET['page'])) {
         $page_number = (int)$_GET['page'];
    }
        if ($page_number<1) {
             $page_number = 1;
        }
    $limit = 3;
    $offset =($page_number - 1) * $limit;
    $query = "select * from repository where userid = '$id' order by id desc limit  $limit offset $offset";


    $result = read($query);

    if ($result) {
        return $result;
    } else {
        return false;
    }
}
/////////////used is delet///////////////
function get_one_post($postid)
{
    if (!is_numeric($postid)) {
        return false;
    }
    $query = "select * from posts where postid = '$postid'  limit 1";

//aage $result chilo
    $result = read($query);

    if ($result) {
        return $result[0];
    } else {
        return false;
    }
}

function get_one_repository_post($postid)
{
    if (!is_numeric($postid)) {
        return false;
    }
    $query = "select * from repository where postid = '$postid'  limit 1";

//aage $result chilo
    $result = read($query);

    if ($result) {
        return $result[0];
    } else {
        return false;
    }
}
function delete_post($postid)
{
    if (!is_numeric($postid)) {
        return false;
    }
   
		$sql = "select parent from posts where postid = '$postid' limit 1";
		$result = read($sql);
		
		if(is_array($result)){

			if($result[0]['parent'] > 0){

				$parent = $result[0]['parent'];

				$sql = "update posts set comments = comments - 1 where postid = '$parent' limit 1";
				save($sql);
			}
		}
			
    $query = "delete  from posts where postid = '$postid'  limit 1";

    save($query);
}
function i_own_post($postid, $mybook_userid)
{
    if (!is_numeric($postid)) {
        return false;
    }
    $query  = "select * from posts where postid = '$postid'  limit 1";

    $result = read($query);

    if (is_array($result)) {
        if ($result[0]['userid'] == $mybook_userid) {
            return true;
        }
    }
    return false;
}

/////used in like ///////////////
function like_post($id, $type, $mybook_userid)
{

    # code...


    //save likes details
    $sql = "select likes from likes where type='$type' && contentid = '$id' limit 1";
    $result = read($sql);
    if (is_array($result)) {

        $likes = json_decode($result[0]['likes'], true);

        $user_ids = array_column($likes, "userid");

        if (!in_array($mybook_userid, $user_ids)) {

            $arr["userid"] = $mybook_userid;
            $arr["date"] = date("Y-m-d H:i:s");

            $likes[] = $arr;

            $likes_string = json_encode($likes);
            $sql = "update likes set likes = '$likes_string' where type='$type' && contentid = '$id' limit 1";
            save($sql);

            //increment the right table
            $sql = "update {$type}s set likes = likes + 1 where {$type}id = '$id' limit 1";
            save($sql);
        } else {

            $key = array_search($mybook_userid, $user_ids);
            unset($likes[$key]);

            $likes_string = json_encode($likes);
            $sql = "update likes set likes = '$likes_string' where type='$type' && contentid = '$id' limit 1";
            save($sql);

            //increment the right table
            $sql = "update {$type}s set likes = likes - 1 where {$type}id = '$id' limit 1";
            save($sql);
        }
    } else {

        $arr["userid"] = $mybook_userid;
        $arr["date"] = date("Y-m-d H:i:s");

        $arr2[] = $arr;

        $likes = json_encode($arr2);
        $sql = "insert into likes (type,contentid,likes) values ('$type','$id','$likes')";
        save($sql);

        //increment the right table
        $sql = "update {$type}s set likes = likes + 1 where {$type}id = '$id' limit 1";
        save($sql);
    }
}


function get_likes($id, $type)
{


    $type = addslashes($type);

    if (is_numeric($id)) {

        //get like details
        $sql = "select likes from likes where type='$type' && contentid = '$id' limit 1";
        $result = read($sql);
        if (is_array($result)) {

            $likes = json_decode($result[0]['likes'], true);
            return $likes;
        }
    }


    return false;
}

function edit_post($data, $files, $userid)
{
    $Errors = [];

    if (!empty($data['post']) || !empty($files['file']['name'])) {

        $myimage = "";
        $has_image = 0;

        if (!empty($files['file']['name'])) {


            $folder = "uploads/" . $userid . "/";

            //create folder
            if (!file_exists($folder)) {

                mkdir($folder, 0777, true);
                file_put_contents($folder . "index.php", "");
            }



            $myimage = $folder . generate_filename(15) . ".jpg";
            move_uploaded_file($_FILES['file']['tmp_name'], $myimage);

            //resize_image($myimage,$myimage,1500,1500);

            $has_image = 1;
        }

        $post = "";
        if (isset($data['post'])) {

            $post = addslashes($data['post']);
        }

        $postid = addslashes($data['postid']);

        if ($has_image) {
            $query = "update posts set post = '$post', image = '$myimage' where postid = '$postid' limit 1";
        } else {
            $query = "update posts set post = '$post' where postid = '$postid' limit 1";
        }


        save($query);
    } else {
        $Errors[] = "Please type something to post!<br>";
    }

    return $Errors;
}

function get_thumb_post($filename)
{
    $thumbnail = $filename . "_post_thumb.jpg";
    if (file_exists($thumbnail)) {
        return $thumbnail;
    }
    crop_image($filename, $thumbnail, 400, 400);
    if (file_exists($thumbnail)) {
        return $thumbnail;
    } else {
        return $filename;
    }
}

 function get_comments($id)
	{

        // $page_number = 1;
                            
    $page_number = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $page_number = ($page_number<1) ? 1 : $page_number;
   /* if (isset($_GET['page'])) {
         $page_number = (int)$_GET['page'];
    }
    if ($page_number<1) {
             $page_number = 1;
        }*/
    $limit = 10;
    $offset =($page_number - 1) * $limit;
		$query = "select * from posts where parent = '$id' order by id asc limit $limit offset $offset";

		
		$result = read($query);

		if($result)
		{
			return $result;
		}else
		{
			return false;
		}
	}