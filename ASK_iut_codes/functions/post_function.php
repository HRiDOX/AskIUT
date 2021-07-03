<?php
function create_post($userid, $data)
{
    $Errors = [];
    if (!empty($data['post'])) {
        $post = addslashes($data['post']);
        $postid = create_postid();
        $query = "insert into posts (userid,postid,post) values ('$userid','$postid','$post')";
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
