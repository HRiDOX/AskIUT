<?php require_once('includes/header.php');
require_once('functions/all_common_function.php');
require_once('functions/login_function.php');
?>

<! --Navigation Bar -->

    <?php require_once('includes/nav_afterLogin.php') ?>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 m-auto">
                <div class="card bg-light mt-5 py-2">
                    <div class="card-title">
                        <h2 class="text-center mt-2">Admin</h2>
                        <h3 class="text-center mt-2">
                            <?php
                            if (logged_in()) {
                                echo 'You Have Successfully Logged in';
                            } else {
                                redirect('login.php');
                            }

                            ?>


                            </h2>
                    </div>
                </div>
                <?php require_once('includes/footer.php') ?>