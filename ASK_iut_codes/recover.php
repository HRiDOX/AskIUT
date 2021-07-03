<?php require_once('includes/header.php');
require_once('functions/recover_function.php');

?>


<body>


    <div class="container">
        <div class="row">
            <div class="col-lg-6 m-auto">
                <div class="card bg-light mt-5 py-2">
                    <div class="card-title">

                        <h2 class="text-center mt-2">Recover Password</h2>
                        <hr>
                        <hr>
                        <hr>
                        <?php recover_password(); ?>
                    </div>
                    <div class="card-body">
                        <form method="POST">
                            <input type="email" name="UEmail" placeholder="User Email " class="form-control py-2 mb-2">
                            <input type="hidden" name="token" value="<?php echo Token_Generator(); ?>">
                    </div>
                    <div class="card-footer">

                        <button class="btn btn-link float-right">Cancel</button>
                        <button class="btn btn-info float-left">Send Passowrd</button>

                        </form>
                    </div>


                </div>




            </div>

        </div>


    </div>





    <?php require_once('includes/footer.php') ?>