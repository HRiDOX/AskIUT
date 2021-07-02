<?php


class User
{

    public function get_data($email)
    {

        $query = "select *from users where Email = '$email' limit 1";
        $DB = new Database();
        $result = $DB->read($query);
        if ($result) {
            $row = $result[0];
            return $row;
            # code...
        } else {
            return false;
        }
    }
}
