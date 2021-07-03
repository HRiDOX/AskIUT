+<div id="post">
    <div>

        <img src="logo/pic_holder.jpg" style="width: 75px;margin-right:4px;">
    </div>
    <div>
        <div style="font-weight:bold;color: #2F5D62">
            <?php echo $ROW_USER['FirstName'] . " " . $ROW_USER['LastName']; ?>
        </div>

        <?php echo $ROW['post'] ?>

        <br /><br />
        <a href="">Like</a> . <a href="">Comment</a> . <span style="color: #aaa;"><?php echo $ROW['date'] ?></span>
    </div>
</div>