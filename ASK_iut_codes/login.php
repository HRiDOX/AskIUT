<?php require_once('includes/header.php') ?>

<body background="logo/login.jpg">

    <! --Navigation Bar -->

        <?php require_once('includes/nav.php') ?>

        <div class="container ">
            <div class="row">
                <div class="col-lg-6 m-auto">

                    <div class="card-title">
                        <?php display_message(); ?>

                        <h2 class="text-center mt-5 bg-secondary" style="border:2px solid Violet ;">Login AskIUT</h2>
                        <hr>
                        <hr>
                        <hr>

                    </div>
                    <div class="card-body ">
                        <input type="email" name="Email" placeholder="User Email " class="form-control py-2 mb-2 bg-info">
                        <input type="password" name="pass" placeholder="User Password " class="form-control py-2 mb-2 bg-info">
                        <button class="btn btn-dark float-right">Log in</button>


                    </div>
                    <div class="card-footer">
                        <input type="checkbox" name="remember"> <span>Remember Me</span>
                        <a href="recover.php" class="float-right">Forget Passowrd</a>

                    </div>



                </div>

            </div>

        </div>


        <?php require_once('includes/footer.php') ?>