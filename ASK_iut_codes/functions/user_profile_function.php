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

function get_cse_profile($id)
{

    //$id = addslashes($id);

    $query = "select * from users where userid = '$id' &&  department = 'CSE' limit 1";
    return read($query);
}
function get_eee_profile($id)
{

    //$id = addslashes($id);

    $query = "select * from users where userid = '$id' &&  department = 'EEE' limit 1";
    return read($query);
}

function get_civil_profile($id)
{

    //$id = addslashes($id);

    $query = "select * from users where userid = '$id' &&  department = 'CEE' limit 1";
    return read($query);
}

function get_me_profile($id)
{

    //$id = addslashes($id);

    $query = "select * from users where userid = '$id' &&  department = 'ME' limit 1";
    return read($query);
}
function get_btm_profile($id)
{

    //$id = addslashes($id);

    $query = "select * from users where userid = '$id' &&  department = 'BTM' limit 1";
    return read($query);
}
function get_tve_profile($id)
{

    //$id = addslashes($id);

    $query = "select * from users where userid = '$id' &&  department = 'TVE' limit 1";
    return read($query);
}

function get_ipe_profile($id)
{

    //$id = addslashes($id);

    $query = "select * from users where userid = '$id' &&  department = 'IPE' limit 1";
    return read($query);
}

function get_following($id,$type){

		
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
	}
    function follow_user($id,$type,$mybook_userid){

    	
 			
			//save likes details
			$sql = "select following from likes where type='$type' && contentid = '$mybook_userid' limit 1";
			$result = read($sql);
			if(is_array($result)){

				$likes = json_decode($result[0]['following'],true);

				$user_ids = array_column($likes, "userid");
 
				if(!in_array($id, $user_ids)){

					$arr["userid"] = $id;
					$arr["date"] = date("Y-m-d H:i:s");

					$likes[] = $arr;

					$likes_string = json_encode($likes);
					$sql = "update likes set following = '$likes_string' where type='$type' && contentid = '$mybook_userid' limit 1";
					save($sql);

				}else{

					$key = array_search($id, $user_ids);
					unset($likes[$key]);

					$likes_string = json_encode($likes);
					$sql = "update likes set following = '$likes_string' where type='$type' && contentid = '$mybook_userid' limit 1";
					save($sql);
 
				}
				

			}else{

				$arr["userid"] = $id;
				$arr["date"] = date("Y-m-d H:i:s");

				$arr2[] = $arr;

				$following = json_encode($arr2);
				$sql = "insert into likes (type,contentid,following) values ('$type','$mybook_userid','$following')";
				save($sql);
 
			}

	}


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

function get_departments_member_cse($id){

    $query = "select  *from users where department='CSE' and Active='1'";
    $result = read($query);
    if ($result) {
        return $result;
    }else {
        return false;
    }

}

function get_departments_member_me($id){

    $query = "select  *from users where department= 'ME' and Active='1'";
    $result = read($query);
    if ($result) {
        return $result;
    }else {
        return false;
    }

}

function get_departments_member_civil($id){

    $query = "select  *from users where department= 'CEE' and Active='1'";
    $result = read($query);
    if ($result) {
        return $result;
    }else {
        return false;
    }

}

function get_departments_member_eee($id){

    $query = "select  *from users where department= 'EEE' and Active='1'";
    $result = read($query);
    if ($result) {
        return $result;
    }else {
        return false;
    }

}

function get_departments_member_btm($id){

    $query = "select  *from users where department= 'BTM' and Active='1'";
    $result = read($query);
    if ($result) {
        return $result;
    }else {
        return false;
    }

}

function get_departments_member_tve($id){

    $query = "select  *from users where department= 'TVE' and Active='1'";
    $result = read($query);
    if ($result) {
        return $result;
    }else {
        return false;
    }

}
function get_departments_member_ipe($id){

    $query = "select  *from users where department= 'IPE' and Active='1'";
    $result = read($query);
    if ($result) {
        return $result;
    }else {
        return false;
    }

}
