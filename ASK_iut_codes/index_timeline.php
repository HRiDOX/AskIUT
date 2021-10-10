<?php require_once('functions/config.php');
require_once('functions/all_common_function.php');
require_once('functions/user_profile_function.php');
require_once('functions/post_function.php');
require_once('functions/login_function.php');
require_once('functions/image_function.php');
require_once('functions/new_function.php');

//require_once('functions/image_crop_function.php');

if (isset($_SESSION['Email'])) {
    $d = $_SESSION['mybook_userid'];
    $user_data = check_login($d);
} 
else{
    redirect("login.php");
}

$USER = $user_data;
//print_r($_SESSION);
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $profile_data = get_profile($_GET['id']);

    if (is_array($profile_data)) {
        $user_data = $profile_data[0];
    }
}
/*echo "<pre>";
print_r($_SERVER);
echo "</pre>";*/


//posting starts here
if ($_SERVER['REQUEST_METHOD'] == "POST") {


    $id = $_SESSION['mybook_userid'];
    $result = create_post($id, $_POST, $_FILES);

    if ($result == "") {
        redirect("index_timeline.php");
    } /*else {

        echo "<div style='text-align:center;font-size:12px;color:white;background-color:grey;'>";
        echo "<br>The following errors occured:<br><br>";
        echo '$result';
        //aage $result chilo shudhu
        echo "</div>";
    }*/
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Timeline | AskIUT</title>
</head>

<style type="text/css">
#top_bar {
    height: 50px;
    background-color: #2EC462;
    color: #EEEEEE;
}

#search_box {
    width: 400px;
    height: 20px;
    border-radius: 10px;
    border: none;
    padding: 4px;
    font-size: 14px;
    background-image: url(rsz_search.png);
    background-repeat: no-repeat;
    background-position: right;
    position: relative;
    left: 100px;
    bottom: 30px;
}

#user_pic {
    position: relative;
    top: 20px;
}

#menu_buttons {
    width: 100px;
    display: inline;
    margin: 20px;
    color: white;
    text-decoration:none;
}

#notice_box {
    width: 90%;
    border: none;
    padding: 4px;
    font-size: 14px;
    font-family: helvetica;
}

#notice_board {
    background-color: #32675a;
    min-height: 400px;
    margin-top: 20px;
    color: #222831;
    padding: 8px;
}

#post_button {
        float: right;
        background-color: #095D26;
        border: none;
        color: white;
        padding: 4px;
        font-size: 14px;
        border-radius: 2px;
        width: 50px;
        min-width: 50px;
        cursor: pointer;
}

#posting_post {
    width: 100%;
    border: none;
    padding: 4px;
    font-size: 14px;
    font-family: helvetica;
    height: 60px;
}

#post_bar {
    margin-top: 20px;
    background-color: white;
    padding: 10px;
}

#post {
    padding: 4px;
    font-size: 12px;
    display: flex;
    margin-bottom: 20px;
}
.link { color: #05712A; } /* CSS link color (red) */
.link:hover { color: #00FF00; } /* CSS link hover (green) */
.link2 { color: #C3E3CE; } /* CSS link color (red) */
.link2:hover { color: #00FF00; } /* CSS link hover (green) */
</style>

<body style="font-family: Georgia, serif;background: linear-gradient(to left,#C3E3CE ,#ffffff);">
    <!--top bar-->
    <div id="top_bar">
        <div style="width: 800px; margin:auto; font-size: 30px; text-align:center;">
            <a class="link2" href="admin.php">AskIUT</a>
        </div>

    </div>
    <!--search bar-->
    <div>
        <div style="width: 800px; margin:auto;min-height:70px;">
            <?php
            $image = "logo/pic_holder.jpg ";
            if (file_exists($user_data['profile_image'])) {
                $image = $user_data['profile_image'];
            }
            ?>
            
            <a href="profile.php"><img src="<?php echo $image ?>" id="user_pic"
                    style="width: 50px; border-radius:50px;margin:20px;"></a>
                    <div><?php echo $user_data['FirstName'] . " " . $user_data['LastName']; ?></div>

        </div>
    </div>

    <br>
    <!--Menu button area-->
    <div style="width: 800px;margin:auto; min-height:400px;">
        <div style="text-align:center; color:#222831">
            <div id="menu_buttons"><a class="link" href="profile.php">Profile</a></div>
            <div id="menu_buttons"><a class="link" href="departments.php">Repository</a> </div>
            <div id="menu_buttons"><a class="link" href="group_by_department.php">Groups</a></div>
            
        </div>

        <!--below cover area-->
        <div style="display: flex;">

            <!--notice board area-->
            <div style="flex:1; min-height: 400px;">
                <div id="notice_board">
                    <h3>Filter Post By Department</h3>
                    <div><a href="mpe_timeline.php"><input type="button" value = "MPE"></a><br></div>
                    <div><a href="cee_timeline.php"><input type="button" value = "CEE"></a><br></div>
                    <div><a href="eee_timeline.php"><input type="button" value = "EEE"></a><br></div>
                    <div><a href="cse_timeline.php"><input type="button" value = "CSE"></a><br></div>
                    <div><a href="btm_timeline.php"><input type="button" value = "BTM"></a><br></div>
                    <div><a href="tve_timeline.php"><input type="button" value = "TVE"></a><br></div>
                </div>

            </div>

            <!--posts area-->
            <div style="min-height:400px;flex:3.5;padding:20px;">
         <div style="border: solid thin #aaa;padding: 10px;background-color: white;">
             <form method="post" enctype="multipart/form-data">
             <textarea name="post" placeholder="Ask Your Question" style="margin: 0px; width: 570px; height: 80px;"></textarea>
                 <div><input style="font-size:12px;" type="file" name="file"></div>
                 <input id="post_button" type="submit" value="Ask!">
                 <br>
             </form>
         </div>
                <!--posts-->
                <div id="post_bar">
                    <?php
                            $page_number = 1;
                            
                            //$page_number = isset($_Get['page']) ? (int)$_Get['page'] : 1;
                            //$page_number = ($page_number<1) ? 1 : $page_number;
                            if (isset($_GET['page'])) {
                              $page_number = (int)$_GET['page'];
                            }
                            if ($page_number<1) {
                                 $page_number = 1;
                            }
                            

                           //echo  $next_page_link;
                            

                            //echo $page_number;
                            $limit = 3;
                            $offset =($page_number - 1) * $limit;
 							$followers =get_following($_SESSION['mybook_userid'],"user");

 							$follower_ids = false;
 							if(is_array($followers)){

 								$follower_ids = array_column($followers, "userid");
 								$follower_ids = implode("','", $follower_ids);

 							}

 							
 								$myuserid = $_SESSION['mybook_userid'];
 								$sql = "select * from posts where parent = 0 order by id desc limit $limit offset $offset";
 								$posts =read($sql);
                                  
 							

 	 					 	if(isset($posts) && $posts)
 	 					 	{

                             

 	 					 		foreach ($posts as $ROW) {
 	 					 			# code...

 	 				 
 	 					 			$ROW_USER =get_user($ROW['userid']);

 	 					 			include("post.php");
 	 					 		}
 	 					 	}

                     $pg = pagination_link();
                    ?>
                    <a href = "<?=   $pg['next_page'] ?>">
                          <input id="post_button" type="button" value="Next Page" style="float : right; width:150px;">
                        </a>
                        <a href = "<?=  $pg['prev_page'] ?>">
                          <input id="post_button" type="button" value="Previous Page" style = "float : left; width:150px;">
                        </a>
                         
                </div>
            </div>
        </div>
    </div>
</body>

</html>