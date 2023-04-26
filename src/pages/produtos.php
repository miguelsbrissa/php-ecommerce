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
    <?php
    if (isset($_GET['categoria'])) {
        $cat_name =  $_GET['categoria'];
        $sql = "SELECT idCategoria FROM categoria WHERE nome = '$cat_name'";
        $result = mysqli_query($conn, $sql);
        $categoria = mysqli_fetch_all($result, MYSQLI_ASSOC);

        $cat_id = $categoria[0]['idCategoria'];
        $sql = "SELECT * FROM produto WHERE categoria_id = $cat_id";
        $result = mysqli_query($conn, $sql);
        $produtos_by_cat = mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
    ?>
    <div class="content">
        <div class="top-cards">
            <?php if (isset($_GET['categoria'])) : ?>
                <h1 class="cat-name"><?php echo $_GET['categoria']; ?></h1>
            <?php else : ?>
                <h1 class="erro"> A categoria não foi selecionada! </h1>
            <?php endif; ?>
            <div class="input-icon">
                <i class="fa-solid fa-magnifying-glass icon"></i>
                <input type="text" name="search" id="search" class="search-input" placeholder="Pesquise um item...">
            </div>
        </div>
        <div class="cards">
            <?php if (empty($produtos_by_cat)) : ?>
                <h1 class="erro">Não existem produtos nessa categoria ainda! </h1>
            <?php endif; ?>
            <?php foreach ($produtos_by_cat as $produto) : ?>
                <div class="cards item">
                    <img src="../images/<?php echo $produto['img'] ?>" alt="Apple" class="img" />
                    <h1 class="item-name"><?php echo $produto['nome'] ?></h1>
                    <a href="http://localhost/php-ecommerce/src/pages/produto.php?produto=<?php echo $produto['nome']?>" class="button-price"><?php echo str_replace('.', ',', $produto['preco']); ?></a>
                </div>
            <?php endforeach; ?>
        </div>
        <?php include '../components/footer.php'; ?>
    </div>
</body>

</html>