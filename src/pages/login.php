<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="../style/login.css">
    <link rel="stylesheet" href="../style/footer.css">
    <script src="https://kit.fontawesome.com/f673a817b4.js" crossorigin="anonymous"></script>
    <title>E-commerce with PHP</title>
</head>

<body>
    <?php
    include '../Auth/Auth.php';
    include '../controller/clienteController.php';
    include '../helpers/inputValidation.php';
    include '../helpers/globalConstants.php';
    include '../database/connection.php';
    logout(); //faz logout antes de tudo caso o cliene tenha sido redireciona pra ca por ter feito logout

    $input_email = $input_senha = '';
    if (isset($_POST['login'])) {
        $input_email = handleInputEmail('email');
        $input_senha = handleInputText('senha');
        $cliente = findClienteByEmailController($input_email, $conn);

        if (!empty($cliente)) {
            if ($input_email === $_ENV['ADMIN'] && $input_senha === $_ENV['ADMIN_PASS']) {
                login($input_email, true);
            } elseif ($input_senha === $cliente['senha']) {
                login($input_email);
            } else { //se senha estiver incorreta
                echo CRED_ERROR;
            }
        } else { //se nao achar o email
            echo CRED_ERROR;
        }
    }
    ?>
    <div class="content">
        <form class="login" method="post">
            <h1>Login</h1>
            <div class="input-field">
                <label for="">Email</label>
                <input class="input" type="email" name="email" id="" placeholder="Digite seu email">
            </div>
            <div class="input-field">
                <label for="">Senha</label>
                <input class="input" type="password" name="senha" id="" placeholder="***">
                <a href="#" class="help">Esqueceu a senha?</a>
            </div>
            <div class="input-field">
                <input class="input-btn" type="submit" value="Login" name="login">
                <a href="http://localhost/php-ecommerce/src/pages/cadCliente.php" class="help">Não possui cadastro?</a>
            </div>
        </form>
    </div>
</body>

</html>