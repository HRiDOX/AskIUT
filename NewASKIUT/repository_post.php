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

            <?php
            echo "<a href='profile.php?id=$ROW[userid]'>";

            echo htmlspecialchars($ROW_USER['FirstName']) . " " . htmlspecialchars($ROW_USER['LastName']);
            echo "</a>";

            ?>
        </div>

        <?php echo htmlspecialchars($ROW['post']) ?>
        <br><br>

        <?php
        if (file_exists($ROW['image'])) {
            // $post_image =get_thumb_post($ROW['image']);
            echo "<img src='$ROW[image]' style='width:80%;' />";
        }

        ?>

        


        
        <span style="color: #aaa;">
            <?php echo $ROW['date']; ?>
        </span>

        <?php

        if ($ROW['has_image']) {

            echo "<a href='image_view.php?id=$ROW[postid]' >";
            echo ". View Full Image . ";
            echo "</a>";
        }
        ?>

        <span style="color: #aaa; float:right;">
            <?php

            if (i_own_post($ROW['postid'], $_SESSION['mybook_userid'])) {
                # code...

                echo "
                <a href='edit.php?id= $ROW[postid]'>
                 Edit 
                </a>.
                  <a href='delete.php?id= $ROW[postid]'>
                      Delete
                 </a>";
            }
            ?>
        </span>
    </div>
       
</div>

