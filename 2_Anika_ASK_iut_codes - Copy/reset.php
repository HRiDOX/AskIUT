<?php require_once('includes/header.php');
require_once('functions/all_common_function.php'); ?>




<div class="container">
    <div class="row">
        <div class="col-lg-6 m-auto">
            <div class="card bg-light mt-5 py-2">
                <div class="card-title">

                    <h2 class="text-center mt-2">Reset Password</h2>
                    <hr>
                    <hr>
                    <hr>

                </div>
                <div class="card-body">
                    <input type="password" name="reset-pass" placeholder="Password " class="form-control py-2 mb-2">
                    <input type="password" name="reset-c-pass" placeholder="Confirm Password " class="form-control py-2 mb-2">

                </div>
                <div class="card-footer">

                    <a href="forget.php" class="btn btn-danger float-right">Cancel</a>
                    <a href="forget.php" class="btn btn-dark float-left">Send Passowrd</a>

                </div>

            </div>
        </div>

    </div>

</div>

<?php require_once('includes/footer.php') ?>