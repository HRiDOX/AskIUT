<div id="friends" style="display: inline-block;">
    <?php

    $image = "image/pic_holder.jpg";
    if (file_exists($FRIEND_ROW['profile_image'])) {
        //$image = $image_class->get_thumb_profile($ROW_USER['profile_image']);
        $image = $FRIEND_ROW['profile_image'];
    }

     /*if (file_exists($FRIEND_ROW['profile_image'])) {
        $image = ($FRIEND_ROW['profile_image']);
    }*/


    ?>

    <a href="profile.php?id=<?php echo $FRIEND_ROW['userid']; ?>">
        <img id="friends_img" src="<?php echo $image ?>">
        <br>

        <?php echo $FRIEND_ROW['FirstName'] . " " . $FRIEND_ROW['LastName'] ?>
    </a>
</div>