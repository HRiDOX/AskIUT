<?php require_once('includes/header.php');
require_once('functions/all_common_function.php');
require_once('functions/login_function.php');
?>

<body background="logo/login.jpg">

    <! --Navigation Bar -->

        <?php require_once('includes/nav_beforeLogin.php') ?>

        <div class="container ">
            <div class="row">
                <div class="col-lg-6 m-auto">

                    <div class="card-title">
                        <?php
                        display_message();
                        login_validation();

                        ?>

                        <h2 class="text-center mt-5 bg-secondary"style="border:2px solid #aaa;">Login AskIUT</h2>
                        <hr>
                        <hr>
                        <hr>

                    </div>
                    <div class="card-body ">
                        <form method="POST">
                            <input type="email" name="UEmail" placeholder="User Email " class="form-control py-2 mb-2 ">
                            <input type="password" name="UPass" placeholder=" Password " class="form-control py-2 mb-2 ">
                            <button class="btn btn-dark" style="float:right;">Log in</button>
                            <a class="card-footer" href="recover.php" style="float:right;color:white;padding:10px;">Forget Passowrd</a>
                            <input class="card-footer" type="checkbox" name="remember"> <span>Remember Me</span>
                        </form>

                    </div>



                </div>

            </div>

        </div>


        <?php require_once('includes/footer.php') ?>