<!DOCTYPE html>
<html lang="en">

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
    <div class="content">
        <form class="login" method="post">
            <h1>Login</h1>
            <div class="input-field">
                <label for="">Email</label>
                <input class="input" type="email" name="email" id="">
            </div>
            <div class="input-field">
                <label for="">Senha</label>
                <input class="input" type="password" name="senha" id="">
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