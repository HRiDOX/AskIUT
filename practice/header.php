<?php
$corner_image="";
if(isset($user_data)){
    $image_class= new Image();
    $corner_image = $image_class->get_thumb_profile($user_data['profile_image']);
}
?>
<div id="top_bar">
            <div style="width: 800px; margin:auto; font-size: 30px; text-align:center;">
                AskIUT
             </div>
             <a href="logout.php"><span style="font-size:11px; float:right; color:white;">Logout</span></a> 
        
        </div>
        <!--search bar-->
        <div>
            <div style="width: 800px; margin:auto;min-height:70px;">
            <a href="profile.php"><img src="<?php echo $corner_image ?>" id="user_pic" style="width: 50px; border-radius:50px;margin:20px;"></a>
                <input type="text" id="search_box" placeholder="Search tags for posts">
            
            </div>
        </div>