<?php




function get_settings($id)
{

    $sql = "select * from users where userid = '$id' limit 1";
    $row = read($sql);

    if (is_array($row)) {

        return $row[0];
    }
}

function save_settings($data, $id)
{

  

    $password = $data['password'];
    if (strlen($password) < 30) {

        if ($data['password'] == $data['password2']) {
            $data['password'] = hash("sha1", $password);
        } else {

            unset($data['password']);
        }
    }

    unset($data['password2']);

    $sql = "update users set ";
    foreach ($data as $key => $value) {
        # code...

        $sql .= $key . "='" . $value . "',";
    }

    $sql = trim($sql, ",");
    $sql .= " where userid = '$id' limit 1";
    save($sql);
}
