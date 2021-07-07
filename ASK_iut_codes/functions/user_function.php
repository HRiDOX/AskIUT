<?php





function get_data($email)
{

    $query = "select *from users where Email = '$email' limit 1";

    $result = read($query);
    if ($result) {
        $row = $result[0];
        return $row;
        # code...
    } else {
        return false;
    }
}
