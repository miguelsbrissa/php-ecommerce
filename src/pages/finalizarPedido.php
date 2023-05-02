<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="../style/finalizarPedido.css">
    <link rel="stylesheet" href="../style/nav.css">
    <link rel="stylesheet" href="../style/footer.css">
    <script src="https://kit.fontawesome.com/f673a817b4.js" crossorigin="anonymous"></script>
    <title>E-commerce with PHP</title>
</head>

<body>
    <?php include '../components/nav.php'; ?>
    <div class="content">
        <div class="lista">
            <h1>Escolha um endereco:</h1>
            <div class="opcao">
                <input type="radio" name="enderecos" id="endereco1" value="endereco1">
                <label for="">Rua: Eu, Robô 1; Bairro: Asimov;Cidade: Asimov; CEP: 01001-01</label>
            </div>
            <div class="opcao">
                <input type="radio" name="enderecos" id="endereco2" value="endereco2">
                <label for="">Rua: Eu, Robô 2; Bairro: Asimov;Cidade: Asimov; CEP: 01001-01</label>
            </div>
            <a class="link" href="http://localhost/php-ecommerce/src/pages/infoCliente.php?cliente=<?php echo $cliente['nome']; ?>">Adicione um novo endereço</a>
        </div>
        <div class="lista">
            <h1>Escolha o tipo de pagamento:</h1>
            <div class="opcao">
                <input type="radio" name="pagamentos" id="pagamento1" value="pagamento1">
                <label for="">Débito: 1234 5678 9010 1112</label>
            </div>
            <div class="opcao">
                <input type="radio" name="pagamentos" id="pagamento2" value="pagamento2">
                <label for="">Crédito: 1234 5678 9010 1112</label>
            </div>
            <a class="link" href="http://localhost/php-ecommerce/src/pages/infoCliente.php?cliente=<?php echo $cliente['nome']; ?>">Adicione um novo meio de pagamento</a>
        </div>
        <form class="finalizar" method="post">
            <h1 class="text">Valor total:R$10,00 </h1>
            <input type="submit" value="Finalizar compra" name="finalizar" class="btn-finalizar">
        </form>
    </div>
    <?php include '../components/footer.php'; ?>
</body>

</html>