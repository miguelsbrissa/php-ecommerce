<?php
//header('Location: http://localhost/php-ecommerce/src/pages/index.php');
//die(); acho q o die deve dar errado pq talvez n execute o q tiver embaixo no outro arquivo
//Vai veriricar se existe uma sessão aberta com o cookie se tiver segue para a pagina(logo n fazer nada), se nao redireciona para o login
function getSession()
{
    if (!isset($_COOKIE['user_email'])) {
        header('Location: http://localhost/php-ecommerce/src/pages/login.php');
    }
    return $_COOKIE['user_email'];
}

function logout()
{
    setcookie("user_email", '', time() - 3600);//seta o cookie com um tempo negativo para ele ser deletado
    header('Location: http://localhost/php-ecommerce/src/pages/login.php');
}
