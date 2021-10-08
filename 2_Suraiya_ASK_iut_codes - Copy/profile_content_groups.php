<div style="min-height: 400px;width:100%;background-color: white;text-align: center;">
	<div style="padding: 20px;">
	<?php
 
		

		$groups = get_likes($user_data['userid'],"user");

		if(is_array($groups)){

			foreach ($groups as $group) {
				# code...
		echo "$user_data[likes]";
				$FRIEND_ROW = get_user($group['userid']);
				include("group.php");
			}

		}else{
	
			echo "No groups were found!";
		}


	?>

	</div>
</div>