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
    //faz logout antes de tudo caso o cliene tenha sido redireciona pra ca por ter feito logout
    include '../Auth/Auth.php';
    logout();

    $email = $senha = '';
    if (isset($_POST['login'])) {
        if (empty($_POST['email'])) {
            echo 'Digite o email';
        } else {
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        }

        if (empty($_POST['senha'])) {
            echo 'Digite a senha!';
        } else {
            $senha = filter_input(
                INPUT_POST,
                'senha',
                FILTER_SANITIZE_FULL_SPECIAL_CHARS
            );
        }

        if ($email === 'miguel@email.com' && $senha === '123') {
           login($email);
        } else {
            echo 'Email e/ou senha incorreto(s)!';
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
                <a href="#" class="help">Não possui cadastro?</a>
            </div>
        </form>
    </div>
</body>

</html>