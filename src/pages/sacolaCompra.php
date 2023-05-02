<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="../style/sacolaCompra.css">
    <link rel="stylesheet" href="../style/nav.css">
    <link rel="stylesheet" href="../style/footer.css">
    <script src="https://kit.fontawesome.com/f673a817b4.js" crossorigin="anonymous"></script>
    <title>E-commerce with PHP</title>
</head>

<body>
    <?php include '../components/nav.php'; ?>
    <?php include '../controller/pedidoController.php'; ?>
    <?php include '../controller/produtoController.php'; ?>
    <?php
    $clienteCpf = $cliente['cpf'];
    $pedido = findPedidoByClienteController($clienteCpf, 'ABERTO', $conn);
    $valor_total = 0;

    if (!empty($pedido)) {
        $pedidoId = $pedido['idPedido'];
        $itens = findItemPedidoByPedidoIdController($pedidoId, $conn);
        $itens_card = [];
        foreach ($itens as $item) {
            $prodId = $item['produto_id'];
            $info_prod = findProdutoByIdController($prodId, $conn);
            $info_prod['qtd'] = $item['quantidade'];
            $info_prod['idItem'] = $item['idItem'];
            $valor_total += $item['quantidade'] * $info_prod['preco'];
            array_push($itens_card, $info_prod);
        }
    }

    if (isset($_POST['escolha'])) {
        //updatePedidoByIdController($valor_total, 'FECHADO', $pedidoId, $conn); mudar para a prox pagina e colocar ID de endereco e pagamento
        echo 'Pedido finalizado';
        header('Location: http://localhost/php-ecommerce/src/pages/finalizarPedido.php');
    }

    if (isset($_GET['del_item'])) {
        $itemId = $_GET['del_item'];
        deleteItemPedidoByIdController($itemId, $conn);
        echo 'Item excluido ' . $item_id;

        $itens = findItemPedidoByPedidoIdController($pedidoId, $conn);
        if (empty($itens)) {

            deletePedidoByIdController($pedidoId, $conn);
        }

        header("Location: http://localhost/php-ecommerce/src/pages/finalPedido.php");
    }
    ?>
    <div class="content">
        <div class="cards">
            <?php if (!empty($pedido)) : ?>
                <?php foreach ($itens_card as $item) : ?>
                    <div class="card">
                        <div class="left">
                            <h1 class="text"><?php echo $item['nome'] ?></h1>
                            <img src="../images/<?php echo $item['img'] ?>" alt="" srcset="" class="img">
                        </div>
                        <div class="right">
                            <h1 class="text">Quantidade: <?php echo $item['qtd'] ?></h1>
                            <h1 class="text">Valor: R$<?php echo str_replace('.', ',', $item['preco'] * $item['qtd']) ?></h1>
                        </div>
                        <div class="options">
                            <a href="http://localhost/php-ecommerce/src/pages/finalPedido.php?edit_item=<?php echo $item['idItem'] ?>"><i class="fa-solid fa-pencil icon"></i></a>
                            <a href="http://localhost/php-ecommerce/src/pages/finalPedido.php?del_item=<?php echo $item['idItem'] ?>"><i class="fa-solid fa-trash icon"></i></a>
                        </div>
                    </div>
                <?php endforeach; ?>
                <form class="finalizar" method="post">
                    <h1 class="text">Valor total:R$<?php echo str_replace('.', ',', $valor_total) ?> </h1>
                    <input type="submit" value="Escolha endereco e o pagamento" name="escolha" class="btn-finalizar">
                </form>
            <?php else : ?>
                <h1 class="erro">Sem produtos no carrinho!</h1>
            <?php endif; ?>
        </div>

    </div>
    <?php include '../components/footer.php'; ?>
</body>

</html>