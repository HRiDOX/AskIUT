<?php require_once('includes/header.php') ?>



<! --Navigation Bar -->
    <?php require_once('includes/nav.php') ?>


    <div class="container">
        <div class="row">
            <div class="col-lg-6 m-auto">
                <div class="card bg-light mt-5 py-2">

                    <div class="card-title">

                        <h2 class="text-center mt-2">Registration Form</h2>
                        <hr>
                        <hr>
                        <hr>

                    </div>
                    <div class="card-body">
                        <?php faculty_validation(); ?>
                        <form method="post">
                            <input type="text" name="FirstName" placeholder="First Name " class="form-control py-2 mb-2" required>
                            <input type="text" name="LastName" placeholder="Last Name " class="form-control py-2 mb-2" required>
                            <input type="text" name="UserName" placeholder="User Name " class="form-control py-2 mb-2" required>
                            <input type="text" name="Department" placeholder="Department " class="form-control py-2 mb-2" required>
                            <input type="text" name="Faculty" placeholder="Faculty" class="form-control py-2 mb-2">
                            <input type="email" name="Email" placeholder="Email " class="form-control py-2 mb-2" required>
                            <input type="password" name="pass" placeholder="Password " class="form-control py-2 mb-2" required>
                            <input type="password" name="cpass" placeholder="Confirm Password " class="form-control py-2 mb-2" required>
                            <button class="btn btn-success float-md-right">Register Now</button>
                        </form>
                    </div>

                </div>

            </div>

        </div>


    </div>

    <?php require_once('includes/footer.php') ?>