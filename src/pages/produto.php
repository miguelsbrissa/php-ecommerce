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
    if (isset($_GET['produto'])) {
        $prod_name =  $_GET['produto'];
        $sql = "SELECT * FROM produto WHERE nome = '$prod_name'";
        $result = mysqli_query($conn, $sql);
        $produto = mysqli_fetch_all($result, MYSQLI_ASSOC);
        $produto = array_pop($produto);
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
                <div class="quantidade">
                    <div class="input-qtd">
                        <label for="">Quantidade: </label>
                        <input type="number" name="quantidade" id="">
                    </div>
                    <p><?php echo $produto['preco'] ?></p>
                </div>
                <input type="button" value="Comprar" class="btn-comprar">
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