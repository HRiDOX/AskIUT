<?php require_once('includes/header.php');
require_once('functions/all_common_function.php');
require_once('functions/login_function.php');
?>
<style>
    #intro_img{
        height: 200px;
        width: 200px;
        display: inline;
    }
</style>
<! --Navigation Bar -->

    <?php require_once('includes/nav_afterLogin.php') ?>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 m-auto">
                <div class="card bg-light mt-5 py-2">
                    <div class="card-title">

                        <h3 class="text-center mt-2">
                            <?php
                            if (logged_in()) {
                                echo 'You Have Successfully Logged in. 
                                Go to: ';
                            } else {
                                redirect('login.php');
                            }

                            ?>


                            </h2>
                    </div>
                </div>
                <div>
                    <div><a href="profile.php"><img id= "intro_img" src="profile_adm.jpg" alt="Profile">Profile</a></div>
                    <div><a href="repository.php"><img id= "intro_img" src="repository_adm.jpg" alt="Repository">Repository</a></div>
                </div>
                <?php require_once('includes/footer.php') ?>