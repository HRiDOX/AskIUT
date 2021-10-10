<div id="My_bar">
    <form method="get" action="search.php">
        <div style="width: 800px;margin:auto;font-size: 30px;padding: 5px;">
            <a class = "link" href="index_timeline.php">AskIUT</a>
            &nbsp &nbsp <input type="text" id="Search_box" name='find' placeholder="Search">

            <?php
            $image = "logo/pic_holder.jpg ";
            if (file_exists($user_data['profile_image'])) {
                $image = $user_data['profile_image']; //here i need to add thumbnail
            }

            ?>
            <img src="<?php echo $image ?>" style="width: 40px; float:right; border-radius:30px;border: 2px solid white;">
        </div>

    </form>
    <div class="col text-center">

        <a href="logout.php"><button class="btn btn-light float-right">Logout</button></a>


    </div>

</div>