<?php require_once('includes/header.php') ?>

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
                                echo 'You Have Successfully Logged in';
                            } else {
                                redirect('login.php');
                            }

                            ?>


                            </h2>
                    </div>
                </div>

            </div>

        </div>

    </div>


    <?php require_once('includes/footer.php') ?>