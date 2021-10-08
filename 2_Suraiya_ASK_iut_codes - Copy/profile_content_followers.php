<div style="min-height: 400px;width:100%;background-color: white;text-align: center;">
	<div style="padding: 20px;">
	<?php
 
		

		$followers = get_likes($user_data['userid'],"user");

		if(is_array($followers)){

			foreach ($followers as $follower) {
				# code...
		echo "$user_data[likes]";
				$FRIEND_ROW = get_user($follower['userid']);
				include("user_member.php");
			}

		}else{
	
			echo "No followers were found!";
		}


	?>

	</div>
</div>