<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="../style/produto.css">
    <link rel="stylesheet" href="../style/nav.css">
    <link rel="stylesheet" href="../style/footer.css">
    <script src="https://kit.fontawesome.com/f673a817b4.js" crossorigin="anonymous"></script>
    <title>E-commerce with PHP</title>
</head>

<body>
    <?php include '../components/nav.php'; ?>
    <?php include '../controller/produtoController.php'; ?>
    <?php include '../controller/pedidoController.php'; ?>
    <?php
    if (isset($_GET['produto'])) {
        $prod_name =  $_GET['produto'];
        $produto = findProdutoByNameController($prod_name, $conn);
    }

    $clienteCpf = $cliente['cpf'];
    $pedido = findPedidoByClienteController($clienteCpf, 'ABERTO', $conn);
    //se tiver um pedido já aberto o item será add nesse pedido
    if (!empty($pedido)) {
        $pedidoId = $pedido['idPedido'];
    }

    if (isset($_POST['add'])) {
        if (empty($_POST['qtd'])) {
            echo 'Por favor selecione uma quantidade antes de adicionar à sacola!';
        } else {
            //se não tiver um pedido já aberto será criado um novo pedido para o item ser adicionado
            if (empty($pedido)) {
                $dataPedido = date('Y-m-d h:i:s');
                createPedidoController(0, $dataPedido, 'ABERTO', $clienteCpf, $conn);

                $pedido = $pedido = findPedidoByClienteController($clienteCpf, 'ABERTO', $conn);
                $pedidoId = $pedido['idPedido'];
            }
            $prodQtd =  (int)$_POST['qtd'];
            $prodId =  $produto['idProduto'];
            try {
                createItemPedidoController($prodQtd, $prodId, $pedidoId, $conn);
                echo 'Item adicionado à sacola!';
            } catch (Exception $error) {
                echo 'Erro ao adicionar produto à sacola: ' . $error;
            }
        }
    }
    ?>
    <div class="content">
        <?php if (isset($_GET['produto'])) : ?>
            <div class="left">
                <img src="../images/<?php echo $produto['img'] ?>" alt="Apple" srcset="" class="img">
            </div>
            <div class="right">
                <h1><?php echo $produto['nome'] ?></h1>
                <div class="descricao">
                    <?php echo $produto['descricao'] ?>
                </div>
                <form action="" method="POST">
                    <div class="quantidade">
                        <div class="input-qtd">
                            <label for="">Quantidade: </label>
                            <input type="number" name="qtd" id="qtd" min="1" max="100">
                        </div>
                        <p>R$<?php echo str_replace('.', ',', $produto['preco']); ?></p>
                    </div>
                    <input type="submit" value="Adicionar à sacola" name="add" class="btn-comprar">
                </form>
                <div class="cep">
                    <div class="input-cep">
                        <label for="">CEP: </label>
                        <input type="text">
                    </div>
                    <input type="button" value="Verificar" class="btn-verificar">
                </div>
            </div>
        <?php else : ?>
            <h1 class="erro">Produto não encontrado!</h1>
        <?php endif; ?>

    </div>
    <?php include '../components/footer.php'; ?>
</body>

</html>