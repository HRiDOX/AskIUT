<?php require_once('functions/config.php') ?>

<html lang="en">

<head>

    <! --Navigation Bar -->
        <?php require_once('includes/nav_beforeLogin.php') ?>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <style>
            /* Make the image fully responsive */
            .carousel-inner img {
                width: 100%;
                height: 100%;
            }
        </style>



</head>

<body>

    <div id="demo" class="carousel slide" data-ride="carousel">

        <!-- Indicators -->
        <ul class="carousel-indicators">
            <li data-target="#demo" data-slide-to="0" class="active"></li>
            <li data-target="#demo" data-slide-to="1"></li>
            <li data-target="#demo" data-slide-to="2"></li>
        </ul>

        <!-- The slideshow -->
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="logo/faculty.jpg" alt="Los Angeles" width="900" height="250">
            </div>
            <div class="carousel-item">
                <img src="logo/IUT.jpg" alt="Chicago" width="900" height="250">
            </div>
            <div class="carousel-item">
                <img src="logo/login.jpg" alt="New York" width="900" height="250">
            </div>
            <div class="container">
                <div class="row">
                    <div class="col">

                        <?php display_message(); ?>
                        <h3 class="text-center "> Welcome to AskIUT!
                        </h3>



                    </div>

                </div>
            </div>

            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>


            <?php require_once('includes/button.php') ?>



        </div>


        <!-- Left and right controls -->
        <a class="carousel-control-prev" href="#demo" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#demo" data-slide="next">
            <span class="carousel-control-next-icon"></span>
        </a>

    </div>








    <?php require_once('includes/footer.php') ?>