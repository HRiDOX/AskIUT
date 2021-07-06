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
        $query = "insert into posts (userid,postid,post,image,has_image) values ('$userid','$postid','$post','$myimage','$has_image')";
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
    $query = "select * from posts where userid = '$id' order by id desc limit 10";


    $result = read($query);

    if ($result) {
        return $result;
    } else {
        return false;
    }
}

function get_one_post($postid)
{
    if (!is_numeric($postid)) {
        return false;
    }
    $query = "select * from posts where postid = '$postid'  limit 1";


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
    $query = "delete  from posts where postid = '$postid'  limit 1";

    read($query);
}
