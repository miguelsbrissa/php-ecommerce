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
    <?php
    $cliente_cpf = $cliente['cpf'];

    $sql = "SELECT * FROM pedido WHERE cliente_cpf = '$cliente_cpf' AND status_pedido = 'ABERTO';";
    $result = $result = mysqli_query($conn, $sql);
    $pedido = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $pedido = array_pop($pedido);
    if (empty($pedido)) {
        $data_pedido = date('Y-m-d h:i:s');
        $sql = "INSERT INTO pedido VALUES(NULL, 0, '$data_pedido', 'ABERTO', '$cliente_cpf')";
        $result = mysqli_query($conn, $sql);
    }
    $sql = "SELECT * FROM pedido WHERE cliente_cpf = '$cliente_cpf' AND status_pedido = 'ABERTO';";
    $result = $result = mysqli_query($conn, $sql);
    $pedido = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $pedido = array_pop($pedido);
    $pedido_id = $pedido['id'];
    
    if (isset($_GET['produto'])) {
        $prod_name =  $_GET['produto'];
        $sql = "SELECT * FROM produto WHERE nome = '$prod_name'";
        $result = mysqli_query($conn, $sql);
        $produto = mysqli_fetch_all($result, MYSQLI_ASSOC);
        $produto = array_pop($produto);
    }
    if (isset($_POST['add'])) {
        if (empty($_POST['qtd'])) {
            echo 'Por favor selecione uma quantidade antes de adicionar à sacola!';
        } else {
            $prod_qtd =  (int)$_POST['qtd'];
            $prod_id =  $produto['id'];
            try {
                $sql = "INSERT INTO itens_pedido VALUES(NULL, $prod_qtd, $prod_id, $pedido_id)";
                $result = mysqli_query($conn, $sql);
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