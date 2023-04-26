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

    if (!empty($pedido)) {
        $pedido_id = $pedido['id'];
        $sql = "SELECT * FROM itens_pedido WHERE pedido_id = $pedido_id";
        $result = mysqli_query($conn, $sql);
        $itens = mysqli_fetch_all($result, MYSQLI_ASSOC);
        $valor_total = 0;
        $itens_card = [];
        foreach ($itens as $item) {
            $prod_id = $item['produto_id'];
            $sql = "SELECT * FROM produto WHERE id = $prod_id";
            $result = mysqli_query($conn, $sql);
            $info_prod = mysqli_fetch_all($result, MYSQLI_ASSOC);
            $info_prod = array_pop($info_prod);
            $info_prod['qtd'] = $item['quantidade'];
            $valor_total += $item['quantidade'] * $info_prod['preco'];
            array_push($itens_card, $info_prod);
        }
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
                            <i class="fa-solid fa-pencil"></i>
                            <i class="fa-solid fa-trash"></i>
                        </div>
                    </div>
                    <div class="finalizar">
                        <h1 class="text">Valor total:R$<?php echo str_replace('.', ',', $valor_total) ?> </h1>
                        <input type="submit" value="Finalizar compra" name="finalizar" class="btn-finalizar">
                    </div>
                <?php endforeach; ?>
            <?php else : ?>
                <h1 class="erro">Sem produtos no carrinho!</h1>
            <?php endif; ?>
        </div>

    </div>
    <?php include '../components/footer.php'; ?>
</body>

</html>