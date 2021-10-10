+<div id="post">
    
    <div style="width:100%;">
        <div style="font-weight:bold;color: #2F5D62;width:100%">

            <?php
            echo "<a href='profile.php?id=$ROW[userid]'>";

            //echo htmlspecialchars($ROW_USER['FirstName']) . " " . htmlspecialchars($ROW_USER['LastName']);
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

        <br /><br />
        

        

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

<script type="text/javascript">
		
		function ajax_send(data){

          
			var ajax = new XMLHttpRequest();
			ajax.addEventListener ('readystatechange',function(){

				if(ajax.readyState == 4 && ajax.status == 200){

					response(ajax.responseText);
				}

			});

            
            data = JSON.stringify(data);

			ajax.open("post","ajax.php",true);
			ajax.send(data);
		}

        function response(result){
            alert(result);
        }

        function like_post(e){

            e.preventDefault();
            var link = e.target.href;

            var data = {};
            data.link = link;
            data.action = "like_post";
            ajax_send(data);
        }

	</script>