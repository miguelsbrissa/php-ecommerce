<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="../style/produtos.css">
    <link rel="stylesheet" href="../style/nav.css">
    <link rel="stylesheet" href="../style/footer.css">
    <script src="https://kit.fontawesome.com/f673a817b4.js" crossorigin="anonymous"></script>
    <title>E-commerce with PHP</title>
</head>

<body>
    <?php include '../components/nav.php'; ?>
    <?php include '../controller/produtoController.php'; ?>
    <?php
    $produtosByName = '';
    if (isset($_GET['categoria'])) {
        $catName =  $_GET['categoria'];
        $produtosByCat = findProdutoByCategoriaDB($catName, $conn);
    }
    if (isset($_POST['searchButton'])) {
        $produtosByName = findAllProdutosLikeNameController($_POST['searchField'], $conn);
    }
    ?>
    <div class="content">
        <div class="top-cards">
            <?php if (isset($_GET['categoria'])) : ?>
                <h1 class="cat-name"><?php echo $_GET['categoria']; ?></h1>
            <?php else : ?>
                <h1 class="erro"> A categoria não foi selecionada! </h1>
            <?php endif; ?>
            <form class="search-field" method="post">
                <input type="text" name="searchField" id="search" class="search-input" placeholder="Pesquise um item...">
                <button type="submit" name="searchButton" class="search-button"><i class="fa-solid fa-magnifying-glass icon"></i></button>
            </form>
        </div>
        <div class="cards">
            <?php if (empty($produtosByCat)) : ?>
                <h1 class="erro">Não existem produtos nessa categoria ainda! </h1>
            <?php elseif (!empty($produtosByCat) && !is_array($produtosByName)) : ?>
                <?php foreach ($produtosByCat as $produto) : ?>
                    <div class="cards item">
                        <img src="../images/<?php echo $produto['img'] ?>" alt="Apple" class="img" />
                        <h1 class="item-name"><?php echo $produto['nome'] ?></h1>
                        <a href="http://localhost/php-ecommerce/src/pages/produto.php?produto=<?php echo $produto['nome'] ?>" class="button-price"><?php echo str_replace('.', ',', $produto['preco']); ?></a>
                    </div>
                <?php endforeach; ?>
            <?php elseif (is_array($produtosByName)) : ?>
                <?php foreach ($produtosByName as $produto) : ?>
                    <div class="cards item">
                        <img src="../images/<?php echo $produto['img'] ?>" alt="Apple" class="img" />
                        <h1 class="item-name"><?php echo $produto['nome'] ?></h1>
                        <a href="http://localhost/php-ecommerce/src/pages/produto.php?produto=<?php echo $produto['nome'] ?>" class="button-price"><?php echo str_replace('.', ',', $produto['preco']); ?></a>
                    </div>
                <?php endforeach; ?>
            <?php else : ?>
                <h1 class="erro">Produto(s) não encontrado(s)</h1>
            <?php endif; ?>
        </div>
        <?php include '../components/footer.php'; ?>
    </div>
</body>

</html>