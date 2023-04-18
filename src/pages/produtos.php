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
    <div class="content">
        <div class="top-cards">
            <h1 class="cat-name">Categorie name</h1>
            <div class="input-icon">
                <i class="fa-solid fa-magnifying-glass icon"></i>
                <input type="text" name="search" id="search" class="search-input" placeholder="Pesquise um item...">
            </div>
        </div>
        <div class="cards">
            <div class="cards item">
                <img src="../images/apple.png" alt="Apple" class="img" />
                <h1 class="item-name">Apple</h1>
                <input type="button" value="R$1,99" class="button-price" />
            </div>
            <div class="cards item">
                <img src="../images/apple.png" alt="Apple" class="img" />
                <h1 class="item-name">Apple</h1>
                <input type="button" value="R$1,99" class="button-price" />
            </div>
            <div class="cards item">
                <img src="../images/apple.png" alt="Apple" class="img" />
                <h1 class="item-name">Apple</h1>
                <input type="button" value="R$1,99" class="button-price" />
            </div>
            <div class="cards item">
                <img src="../images/apple.png" alt="Apple" class="img" />
                <h1 class="item-name">Apple</h1>
                <input type="button" value="R$1,99" class="button-price" />
            </div>
            <div class="cards item">
                <img src="../images/apple.png" alt="Apple" class="img" />
                <h1 class="item-name">Apple</h1>
                <input type="button" value="R$1,99" class="button-price" />
            </div>
            <div class="cards item">
                <img src="../images/apple.png" alt="Apple" class="img" />
                <h1 class="item-name">Apple</h1>
                <input type="button" value="R$1,99" class="button-price" />
            </div>
        </div>

        <?php include '../components/footer.php'; ?>
</body>

</html>