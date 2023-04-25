<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="../style/cadCliente.css">
    <link rel="stylesheet" href="../style/footer.css">
    <script src="https://kit.fontawesome.com/f673a817b4.js" crossorigin="anonymous"></script>
    <title>E-commerce with PHP</title>
</head>

<body>
    <?php
    include '../database/connection.php';

    $input_nome = $input_cpf = $input_data = $input_email = $input_senha = '';

    if (isset($_POST['cadastro'])) {
        if (empty($_POST['nome'])) {
            echo 'Digite a nome!';
        } else {
            $input_nome = filter_input(
                INPUT_POST,
                'nome',
                FILTER_SANITIZE_FULL_SPECIAL_CHARS
            );
        }
        if (empty($_POST['cpf'])) {
            echo 'Digite a cpf!';
        } else {
            $input_cpf = filter_input(
                INPUT_POST,
                'cpf',
                FILTER_SANITIZE_FULL_SPECIAL_CHARS
            );
        }
        if (empty($_POST['data_nasc'])) {
            echo 'Digite a data!';
        } else {
            $input_data = filter_input(
                INPUT_POST,
                'data_nasc',
                FILTER_SANITIZE_FULL_SPECIAL_CHARS
            );
        }
        if (empty($_POST['email'])) {
            echo 'Digite o email';
        } else {
            $input_email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        }
        if (empty($_POST['senha'])) {
            echo 'Digite a senha!';
        } else {
            $input_senha = filter_input(
                INPUT_POST,
                'senha',
                FILTER_SANITIZE_FULL_SPECIAL_CHARS
            );
        }

        try {
            $sql = "INSERT INTO cliente VALUES ('$input_cpf','$input_nome','$input_email','$input_senha', '$input_data')";
            $result = mysqli_query($conn, $sql);
            header('Location: http://localhost/php-ecommerce/src/pages/login.php');
        } catch (Exception $error) {
            echo 'Erro ao cadastrar cliente: ' . $error;
        }
    }
    ?>
    <div class="content">
        <form class="cadastro" method="post">
            <h1>Cadastro</h1>
            <div class="input-field">
                <label for="">CPF</label>
                <input class="input" type="text" name="cpf" id="" placeholder="Digite seu CPF">
            </div>
            <div class="input-field">
                <label for="">Nome</label>
                <input class="input" type="text" name="nome" id="" placeholder="Digite seu nome">
            </div>
            <div class="input-field">
                <label for="">Data de nascimento</label>
                <input class="input" type="date" name="data_nasc" id="" placeholder="Digite seu nome">
            </div>
            <div class="input-field">
                <label for="">Email</label>
                <input class="input" type="email" name="email" id="" placeholder="Digite seu email">
            </div>
            <div class="input-field">
                <label for="">Senha</label>
                <input class="input" type="password" name="senha" id="" placeholder="***">
            </div>
            <div class="input-field">
                <input class="input-btn" type="submit" value="Cadastrar" name="cadastro">
            </div>
        </form>
    </div>
</body>

</html>