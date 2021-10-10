<?php require_once('includes/header.php');

require_once('functions/registration_function.php');
?>



<body background="logo/register.jpg" style="width:100%;height:100%;">

    <! --Navigation Bar -->
        <?php require_once('includes/nav_beforeLogin.php') ?>


        <div class="container">
            <div class="row">
                <div class="col-lg-6 m-auto">

                    <div class="card-title">

                        <h2 class="text-center mt-2" style="border:2px solid DodgerBlue;">Register</h2>


                        <hr>
                        <hr>
                        <hr>

                    </div>
                    <div class="card-body">
                        <?php user_validation(); ?>

                        <form method="post">
                            <input type="text" name="FirstName" placeholder="First Name " class="form-control py-2 mb-2" required>
                            <input type="text" name="LastName" placeholder="Last Name " class="form-control py-2 mb-2" required>
                            <input type="text" name="UserName" placeholder="User Name " class="form-control py-2 mb-2" required>
                            <input type="text" name="Batch" placeholder="Batch " class="form-control py-2 mb-2" required>
                            <input type="text" name="Department" placeholder="Department " class="form-control py-2 mb-2" required>

                            <input type="email" name="Email" placeholder="Email " class="form-control py-2 mb-2" required>
                            <input type="password" name="pass" placeholder="Password " class="form-control py-2 mb-2" required>
                            <input type="password" name="cpass" placeholder="Confirm Password " class="form-control py-2 mb-2" required>
                            <button class="btn btn-success float-md-right">Register Now</button>

                        </form>
                    </div>



                </div>

            </div>


        </div>

        <?php require_once('includes/footer.php') ?>