<?php require_once('includes/header.php');
require_once('functions/function.php');
?>





<div class="container">
        <div class="row">
            <div class="col-lg-6  m-auto">
                <div class="card bg-light mt-5 py-2">
                    <div class="card-title">
                        <h2 class="text-center mt-2"> Enter Code </h2>
                        <hr>
                        <?php validation_code(); ?>
                    </div>
                    <div class="card-body">
                        <form method="POST">
                            <input type="text" name="recover-code" placeholder="######" class="form-control py-2 mb-2"> 
                        
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-danger float-right"> Cancel </button>
                        <button class="btn btn-success float-left"> Send Password </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



<?php require_once('includes/footer.php') ?>