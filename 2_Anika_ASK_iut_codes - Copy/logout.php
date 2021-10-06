<?php

require_once('functions/config.php');
require_once('functions/all_common_function.php');
require_once('functions/login_function.php');

session_destroy();
if (isset($_COOKIE['email'])) {
    unset($_COOKIE['email']);
    setcookie('email', '', time() - 86400);
}

redirect('index.php');
