<div id="My_bar">
    <div style="width: 800px;margin:auto;font-size: 30px;padding: 5px;">
        <a href="index_timeline.php">AskIUT</a>&nbsp &nbsp <input type="text" id="Search_box" placeholder="Search">
        <?php
        $image = "logo/pic_holder.jpg ";
        if (file_exists($user_data['profile_image'])) {
            $image = $user_data['profile_image'];
        } ?>

        <img src="<?php echo $image ?>" style="width: 40px; float:right; border-radius:30px;border: 2px solid white;">
    </div>


    <div class="col text-center">

        <a href="logout.php"><button class="btn btn-light float-right">Logout</button></a>


    </div>
</div>