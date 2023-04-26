<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="../style/finalPedido.css">
    <link rel="stylesheet" href="../style/nav.css">
    <link rel="stylesheet" href="../style/footer.css">
    <script src="https://kit.fontawesome.com/f673a817b4.js" crossorigin="anonymous"></script>
    <title>E-commerce with PHP</title>
</head>

<body>
    <?php include '../components/nav.php'; ?>
    <?php
    $cliente_cpf = $cliente['cpf'];
    $sql = "SELECT * FROM pedido WHERE cliente_cpf = '$cliente_cpf' AND status_pedido = 'ABERTO';";
    $result = $result = mysqli_query($conn, $sql);
    $pedido = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $pedido = array_pop($pedido);
    $valor_total = 0;

    if (!empty($pedido)) {
        $pedido_id = $pedido['idPedido'];
        $sql = "SELECT * FROM itens_pedido WHERE pedido_id = $pedido_id";
        $result = mysqli_query($conn, $sql);
        $itens = mysqli_fetch_all($result, MYSQLI_ASSOC);
        $itens_card = [];
        foreach ($itens as $item) {
            $prod_id = $item['produto_id'];
            $sql = "SELECT * FROM produto WHERE idProduto = $prod_id";
            $result = mysqli_query($conn, $sql);
            $info_prod = mysqli_fetch_all($result, MYSQLI_ASSOC);
            $info_prod = array_pop($info_prod);
            $info_prod['qtd'] = $item['quantidade'];
            $info_prod['idItem'] = $item['idItem'];
            $valor_total += $item['quantidade'] * $info_prod['preco'];
            array_push($itens_card, $info_prod);
        }
    }

    if (isset($_POST['finalizar'])) {
        $sql = "UPDATE pedido SET status_pedido ='FECHADO', valor='$valor_total' WHERE id = '$pedido_id'";
        $result = mysqli_query($conn, $sql);
        echo 'Pedido finalizado';
        header("Refresh:2");
    }

    if (isset($_GET['del_item'])) {
        $item_id = $_GET['del_item'];
        $sql = "DELETE FROM itens_pedido WHERE idItem = '$item_id'";
        $result = mysqli_query($conn, $sql);
        echo 'Item excluido ' . $item_id;
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
                    <input type="submit" value="Finalizar compra" name="finalizar" class="btn-finalizar">
                </form>
            <?php else : ?>
                <h1 class="erro">Sem produtos no carrinho!</h1>
            <?php endif; ?>
        </div>

    </div>
    <?php include '../components/footer.php'; ?>
</body>

</html>