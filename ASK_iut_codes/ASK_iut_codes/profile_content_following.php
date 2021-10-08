<div style="min-height: 400px;width:100%;background-color: white;text-align: center;">
	<div style="padding: 20px;">
	<?php
 
		

		$following = get_following($user_data['userid'],"user");

		if(is_array($following)){

			foreach ($following as $follower) {
				# code...
				$FRIEND_ROW =get_user($follower['userid']);
				include("user_member.php");
			}

		}else{

			echo "This user inst following anyone!";
		}


	?>

	</div>
</div>