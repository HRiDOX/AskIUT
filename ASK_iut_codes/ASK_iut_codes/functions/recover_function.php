<?php








function recover_password()
{

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        if (isset($_SESSION['token']) && $_POST['token'] == $_SESSION['token']) {

            $Email = $_POST['UEmail'];
            if (Email_Exits($Email)) {


                $code = md5('$Email + microtime()');
                setcookie('temp_code', $code, time() + 60);
                $sql = "update users set Validation_Code='$code' where Email='$Email'";
                Query($sql);
                $Subject = "Please Reset The Password";
                $Message = "Please Follow On Below Link To Reset The Password http://localhost/loginpro/AskIUT/ASK_iut_codes/code.php?Email='$Email'&Code='$code'";
                $header = "rgrrf123@gmail.com";
                if (send_email($Email, $Subject, $Message, $header)) {
                    echo '<div class = "alert alert-success">PLease Check Your Email:)</div>';
                } else {

                    echo Error_validation("We Couldn't Send an Email");
                }
            } else if (faculty_Email_Exits($Email)) {
                echo 'data working';
            } else {

                echo Error_validation("Email not Found .......");
            }
        } else {
            redirect("index.php");
        }
    }
}
