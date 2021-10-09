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

<script type="text/javascript">
		
		function ajax_send(data,element){
	var ajax = new XMLHttpRequest();
	ajax.addEventListener('readystatechange',function(){
	if(ajax.readyState == 4 && ajax.statue == 200){
	response(ajax.responseText,element);
	}
	});
	data = JSON.stringify(data);
	ajax.open("post","ajax.php",true);
	ajax.send(data);
   }

        function response(result,element){
              if(result != ""){
              var obj = JSON.parse(result);
              if(typeof obj.action != 'undefined'){
              	
                if(obj.action == 'like_post'){
              		var likes = "";
              		likes = (parseInt(obj.likes) > 0) ? "Like(" +obj.likes+ ")" : "Like";
              	element.innerHTML = likes;
			    }
		     }
	      }
        }

        function like_post(e){
            e.preventDefault();
	      var link = e.target.href;
	      var data = {};
	      data.link = link;
	      data.action = "like_post";
	      ajax_send(data,e.target);
    }

	</script>