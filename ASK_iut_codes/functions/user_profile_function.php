<?php



///getting data from databse for using in profile
function get_data($id)
{

    $query = "select *from users where userid='$id' and Active = '1'";

    $result = read($query);
    if ($result) {
        $row = $result[0];
        return $row;
    } else {
        $query1 = "select *from users_faculty where userid='$id' and Active = '1'";

        $result1 = read($query1);
        if ($result1) {
            $row1 = $result1[0];
            return $row1;
        } else {
            return false;
        }
    }
}

function get_user($id)
{

    $query = "select  *from users where userid ='$id' and Active='1'";
    $result = read($query);

    if ($result) {
        return $result[0];
    } else {
        $query1 = "select  *from users_faculty where userid ='$id' and Active='1'";
        $result1 = read($query1);
        if ($result1) {
            return $result1[0];
        } else {
            return false;
        }
    }
}

function get_profile($id)
{

    //$id = addslashes($id);

    $query = "select * from users where userid = '$id' limit 1";
    return read($query);
}

/*function get_following($id,$type){

		
		$type = addslashes($type);

		if(is_numeric($id)){
 
			//get following details
			$sql = "select following from likes where type='$type' && contentid = '$id' limit 1";
			$result = read($sql);
			if(is_array($result)){

				$following = json_decode($result[0]['following'],true);
				return $following;
			}
		}


		return false;
	}*/


function get_friends($id)
{

    $query = "select  *from users where userid !='$id' and Active='1'";
    $result = read($query);

    if ($result) {
        return $result;
    } else {
        $query1 = "select  *from users_faculty where userid !='$id' and Active='1'";
        $result1 = read($query1);
        if ($result1) {
            return $result1;
        } else {
            return false;
        }
    }
}
