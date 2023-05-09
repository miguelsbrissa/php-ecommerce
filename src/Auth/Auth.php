<?php
function getSession()
{
    if (!isset($_COOKIE['user_email'])) {
        header('Location: http://localhost/php-ecommerce/src/pages/login.php');
    }
    return $_COOKIE['user_email'];
}

function logout()
{
    setcookie("user_email", 'adsadasd', time() - 3600); //seta o cookie com um tempo negativo para ele ser deletado
}

function login($email, $admin = false)
{
    $cookieName = "user_email";
    $cookieValue = $email;
    setcookie($cookieName, $cookieValue, time() + (86400 * 30), "/"); //dura um dia
    if ($admin) {
        header('Location: http://localhost/php-ecommerce/src/pages/admin/index.php');
    } else {
        header('Location: http://localhost/php-ecommerce/src/pages/index.php');
    }
}
