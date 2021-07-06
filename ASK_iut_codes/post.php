+<div id="post">
    <div>
        <?php

        $image = "image/pic_holder.jpg";
        if (file_exists($ROW_USER['profile_image'])) {
            //$image = $image_class->get_thumb_profile($ROW_USER['profile_image']);
            $image = $ROW_USER['profile_image'];
        }

        ?>
        <img src="<?php echo $image ?>" style="width: 75px;margin-right:4px;">
    </div>
    <div style="width:100%;">
        <div style="font-weight:bold;color: #2F5D62;width:100%">
            <?php echo $ROW_USER['FirstName'] . " " . $ROW_USER['LastName']; ?>
        </div>

        <?php echo $ROW['post'] ?>
        <br><br>

        <?php
        if (file_exists($ROW['image'])) {
            // $post_image =get_thumb_post($ROW['image']);
            echo "<img src='$ROW[image]' style='width:80%;' />";
        }

        ?>

        <br /><br />
        <a href="">Like</a> . <a href="">Comment</a> .
        <span style="color: #aaa;">
            <?php echo $ROW['date']; ?>
        </span>
        <span style="color: #aaa; float:right;">
            <a href="edit.php">Edit </a>.
            <a href="delete.php?id=<?php echo $ROW['postid'] ?>"> Delete</a>
        </span>
    </div>
</div>