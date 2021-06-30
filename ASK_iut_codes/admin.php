<?php require_once('functions/config.php') ?>



<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Baloo 2', cursive;
        }



        .animation-area {
            background: linear-gradient(to left, #8942a8, #ba382f);
            width: 100%;
            height: 100vh;
        }

        .box-area {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
        }

        .box-area li {
            position: absolute;
            display: block;
            list-style: none;
            width: 25px;
            height: 25px;
            background: rgba(255, 255, 255, 0.2);
            animation: animate 20s linear infinite;
            bottom: -150px;
        }

        .box-area li:nth-child(1) {
            left: 86%;
            width: 80px;
            height: 80px;
            animation-delay: 0s;
        }

        .box-area li:nth-child(2) {
            left: 12%;
            width: 30px;
            height: 30px;
            animation-delay: 1.5s;
            animation-duration: 10s;
        }

        .box-area li:nth-child(3) {
            left: 70%;
            width: 100px;
            height: 100px;
            animation-delay: 5.5s;
        }

        .box-area li:nth-child(4) {
            left: 42%;
            width: 150px;
            height: 150px;
            animation-delay: 0s;
            animation-duration: 15s;
        }

        .box-area li:nth-child(5) {
            left: 65%;
            width: 40px;
            height: 40px;
            animation-delay: 0s;
        }

        .box-area li:nth-child(6) {
            left: 15%;
            width: 110px;
            height: 110px;
            animation-delay: 3.5s;
        }

        @keyframes animate {
            0% {
                transform: translateY(0) rotate(0deg);
                opacity: 1;
            }

            100% {
                transform: translateY(-800px) rotate(360deg);
                opacity: 0;
            }
        }
    </style>
    <link rel="stylesheet" href="css/bootstrap.css">
    <title>AskIUT</title>
</head>

<body>



    <?php require_once('includes/nav_afterLogin.php') ?>

    <div class="container">
        <div class="row">
            <div class="col-lg-6 m-auto">

                <div class="card-title">
                    <h3 class="text-center mt-2">
                        <?php
                        if (logged_in()) {
                            echo 'You Have Successfully Logged in';
                        } else {
                            redirect('login.php');
                        }

                        ?>
                    </h3>
                </div>


            </div>

        </div>

    </div>
    <div class="animation-area">
        <ul class="box-area">
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>
    </div>

    <?php require_once('includes/footer.php') ?>