<div style="min-height: 400px;width:100%;background-color: white;text-align: center;">
    <div style="padding: 20px;max-width:350px;display: inline-block;">
        <form method="post" enctype="multipart/form-data">


            <?php



            $settings = get_settings($_SESSION['mybook_userid']);

            if (is_array($settings)) {

                echo "<input type='text' id='textbox' name='FirstName' value='" . htmlspecialchars($settings['FirstName']) . "' placeholder='First Name' />";
                echo "<input type='text' id='textbox' name='LastName' value='" . htmlspecialchars($settings['LastName']) . "' placeholder='Last Name' />";



                echo "<input type='text' id='textbox' name='email'  value='" . htmlspecialchars($settings['Email']) . "' placeholder='Email'/>";
                echo "<input type='password' id='textbox' name='password'  value='" . htmlspecialchars($settings['Password']) . "' placeholder='Password'/>";
                echo "<input type='password' id='textbox' name='password2'  value='" . htmlspecialchars($settings['Password']) . "' placeholder='Password'/>";

                /*echo "<br>About me:<br>
							<textarea id='textbox' style='height:200px;' name='about'>" . htmlspecialchars($settings['about']) . "</textarea>
						";*/

                echo '<input id="post_button" type="submit" value="Save">';
            }

            ?>

        </form>
    </div>
</div>