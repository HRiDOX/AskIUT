<?php
if(isset($_GET['change']) && ($_GET['change'] == "profile" ))
{
    if (isset($_FILES['file']['name']) && $_FILES['file']['name'] != "") {

        if ($_FILES['file']['type'] == "image/jpeg") {
            $allowed_size = (1024 * 1024) * 5;
            if ($_FILES['file']['size'] < $allowed_size) {
                //creating folder
                $folder = "uploads/" . $user_data['userid'] . "/";
                if (!file_exists($folder)) {
                    mkdir($folder, 0777, true);
                }



                $filename = $folder . generate_filename(15) . ".jpg";
                move_uploaded_file($_FILES['file']['tmp_name'], $filename);
                $change = "profile";
                //check for mode

                if (isset($_GET['change'])) {
                    $change = $_GET['change'];
                }

                //crop_image($filename, $filename, 800, 800);
                if ($change == "profile") {
                    if (file_exists($user_data['profile_image'])) {
                        unlink($user_data['profile_image']);
                    }
                    else {
                        echo "can't remove the folder";
                    }
                }
                else {
                    echo "change is not equal profile";
                }

                //$image->resize_image($filename, $filename, 800, 800);

                if (file_exists($filename)) {
                    $userid = $user_data['userid'];

                    $query = "update users set profile_image = '$filename' where userid= '$userid' limit 1";

                    save($query);

                    redirect("profile.php");
                } /* else {
  ///////working on faculty_image folader\\\\\\\\\\\\\\
  $folder2 = "uploads_faculty/" . $user_data['userid'] . "/";
  if (!file_exists($folder2)) {
  mkdir($folder2, 0777, true);
  }
  $filename2 = $folder2 . generate_filename(15) . ".jpg";
  move_uploaded_file($_FILES['file']['tmp_name'], $filename2);
  $change2 = "profile";
  //check for mode
  if (isset($_GET['change2'])) {
  $change2 = $_GET['change2'];
  }
  //crop_image($filename, $filename, 800, 800);
  if ($change2 == "profile") {
  if (file_exists($user_data['profile_image'])) {
  unlink($user_data['profile_image']);
  } else {
  echo "can't remove the folder";
  }
  } else {
  echo "change is not equal profile";
  }
  $userid2 = $user_data['userid'];
  $query = "update users set profile_image = '$filename' where userid= '$userid2' limit 1";
  save($query);
  }  else {
  echo "<div style='text-align:center;font-size:12px;color:white;background-color:grey;'>";
  echo "<br>The following errors occured:<br><br>";
  echo "please add a valid image";
  echo "</div>";
  }*/
            }
            else {
                echo "<div style='text-align:center;font-size:12px;color:white;background-color:grey;'>";
                echo "<br>The following errors occured:<br><br>";
                echo "Only images of size 5 MB or lower are allowed";
                echo "</div>";
            }
        }
        else {
            echo "<div style='text-align:center;font-size:12px;color:white;background-color:grey;'>";
            echo "<br>The following errors occured:<br><br>";
            echo "Only image of jpeg type are allowed";
            echo "</div>";
        }
    }else
		{
			echo "<div style='text-align:center;font-size:12px;color:white;background-color:grey;'>";
			echo "<br>The following errors occured:<br><br>";
			echo "please add a valid image!";
			echo "</div>";
		}


}

















?>