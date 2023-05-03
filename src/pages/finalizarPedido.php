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
    <?php
    include '../controller/pedidoController.php';

    $clienteCpf = $cliente['cpf'];
    $pedido = findPedidoByClienteController($clienteCpf, 'ABERTO', $conn);
    $pedidoId = $pedido['idPedido'];

    $sql = "SELECT * FROM endereco WHERE cpfCliente = '$clienteCpf'";
    $result = mysqli_query($conn, $sql);
    $listaEnderecos = mysqli_fetch_all($result, MYSQLI_ASSOC);

    $sql = "SELECT * FROM pagamento WHERE cpfCliente = '$clienteCpf'";
    $result = mysqli_query($conn, $sql);
    $listaPagamentos = mysqli_fetch_all($result, MYSQLI_ASSOC);

    if (isset($_POST['finalizar'])) {
        if (isset($_POST['enderecos'])) {
            $enderecoId = $_POST['enderecos'];
        } else {
            echo 'Por favor selecione um endereço!';
        }
        if (isset($_POST['pagamentos'])) {
            $pagamentoId = $_POST['pagamentos'];
        } else {
            echo 'Por favor selecione uma forma pagamento!';
        }
        finishPedidoByIdController('FECHADO', $pedidoId, $enderecoId, $pagamentoId, $conn);
    }
    ?>
    <div class="content">
        <form method="post">
            <div class="lista">
                <h1>Escolha um endereco:</h1>
                <?php foreach ($listaEnderecos as $endereco) : ?>
                    <div class="opcao">
                        <input type="radio" name="enderecos" value="<?php echo $endereco['idEndereco'] ?>">
                        <label for=""><?php echo 'Rua: ' . $endereco['rua'] . ' ' . $endereco['numero'] . '; ' . 'Bairro: ' . $endereco['bairro'] . '; ' . 'Cidade: ' . $endereco['cidade'] . '; ' . 'CEP: ' . $endereco['cep']; ?></label>
                    </div>
                <?php endforeach; ?>
                <a class="link" href="http://localhost/php-ecommerce/src/pages/infoCliente.php?cliente=<?php echo $cliente['nome']; ?>">Adicione um novo endereço</a>
            </div>
            <div class="lista">
                <h1>Escolha o tipo de pagamento:</h1>
                <?php foreach ($listaPagamentos as $pagamento) : ?>
                    <div class="opcao">
                        <input type="radio" name="pagamentos" value="<?php echo $pagamento['idPagamento'] ?>">
                        <label for=""><?php echo $pagamento['tipoCartao'] . ': ' . $pagamento['numero'];?></label>
                    </div>
                <?php endforeach; ?>
                <a class="link" href="http://localhost/php-ecommerce/src/pages/infoCliente.php?cliente=<?php echo $cliente['nome']; ?>">Adicione um novo meio de pagamento</a>
            </div>
            <div class="finalizar">
                <h1 class="text">Valor total:R$10,00 </h1>
                <input type="submit" value="Finalizar compra" name="finalizar" class="btn-finalizar">
            </div>
        </form>
    </div>
    <?php include '../components/footer.php'; ?>
</body>

</html>