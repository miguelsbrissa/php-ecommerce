<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="../style/index.css">
    <link rel="stylesheet" href="../style/nav.css">
    <link rel="stylesheet" href="../style/footer.css">
    <script src="https://kit.fontawesome.com/f673a817b4.js" crossorigin="anonymous"></script>
    <title>E-commerce with PHP</title>
</head>

<body>
    <?php
    include '../components/nav.php';
    include '../controller/produtoController.php';

    $produtos = findAllProdutoDB($conn);
    ?>
    <div class="content">
        <h1 class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h1>
        <div class="cards">
            <?php if (empty(!$produtos)) : ?>
                <?php foreach ($produtos as $produto) : ?>
                    <div class="cards item">
                        <img src="../images/<?php echo $produto['img'] ?>" alt="Apple" class="img" />
                        <h1 class="item-name"><?php echo $produto['nome'] ?></h1>
                        <a type="button" href="http://localhost/php-ecommerce/src/pages/produto.php?produto=<?php echo $produto['nome'] ?>" class="button-price">R$<?php echo str_replace('.', ',', $produto['preco']); ?></a>
                    </div>
                <?php endforeach; ?>
            <?php else : ?>
                <h1 class="erro">Nenhum produto encontrado!</h1>
            <?php endif; ?>
        </div>
        <?php include '../components/footer.php'; ?>
    </div>
</body>

</html>