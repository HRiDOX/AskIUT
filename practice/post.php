<div id="post">
    <div>
    
    
    
        <img src="image/pic_holder.jpg" style="width: 75px;margin-right:4px;" >
    </div>
    <div>
        <div style="font-weight:bold;color: #2F5D62">
        <?php echo $ROW_USER['first_name'] . " " . $ROW_USER['last_name']; ?>
        </div>
        
        <?php echo $ROW['post'] ?>
        
        <br/><br/>
        <a href="">Like</a> . <a href="">Comment</a> . <span style="color: #aaa;"><? echo $ROW['date'];?></span>
    </div>
</div>