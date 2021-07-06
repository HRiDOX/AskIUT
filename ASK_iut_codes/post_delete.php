<div id="post">
	<div>

		<?php



		$image = "logo/pic_holder.jpg";



		if (file_exists($ROW_USER['profile_image'])) {
			//$image = $image_class->get_thumb_profile($ROW_USER['profile_image']);
			$image = $ROW_USER['profile_image'];
		}

		?>

		<img src="<?php echo $image ?>" style="width: 75px;margin-right: 4px;border-radius: 50%;">
	</div>
	<div style="width: 100%;">
		<div style="font-weight: bold;color: #405d9b;width: 100%;">
			<?php

			echo $ROW_USER['FirstName'] . " " . $ROW_USER['LastName'];


			?>
		</div>

		<?php echo htmlspecialchars($ROW['post']) ?>

		<br><br>

		<?php

		if (file_exists($ROW['image'])) {

			//$post_image = $image_class->get_thumb_post($ROW['image']);
			$post_image = $ROW['image'];

			echo "<img src='$post_image' style='width:80%;' />";
		}

		?>

	</div>
</div>