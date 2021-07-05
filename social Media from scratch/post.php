<div id="post">
    <div>
        <?php
                
                $image="image/pic_holder.jpg";
    
        ?>
        <img src="<?php echo $image ?>" style="width: 75px;margin-right:4px;">
    </div>
    <div>
        <div style="font-weight:bold;color: #2F5D62">
            <?php echo $ROW_USER['first_name'] . " " . $ROW_USER['last_name']; ?>
        </div>

        <?php echo $ROW['post'] ?>

        <br /><br />
        <?php 
			$likes = "";

			$likes = ($ROW['likes'] > 0) ? "(" .$ROW['likes']. ")" : "" ;

		?>
        <a href="like.php?type=post&id=<?php echo $ROW['postid'] ?>">Like<?php echo $likes ?></a> . <a href="">Comment</a> .
        <span style="color: #aaa;">
            <?php echo $ROW['date'];?>
        </span>
        
		<span style="color: #999;float:right">
			
			<?php 

				$post = new Post();

				if($post->i_own_post($ROW['postid'],$_SESSION['mybook_userid'])){

					echo "
					<a href='edit.php?id=$ROW[postid]'>
		 				Edit
					</a> .

					 <a href='delete.php?id=$ROW[postid]' >
		 				Delete
					</a>";
				}
 
			 ?>

		</span>
    </div>
</div>