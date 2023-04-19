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
    <div class="content">
        <div class="left">
            <img src="../images/apple.png" alt="Apple" srcset="" class="img">
        </div>
        <div class="right">
            <h1>Apple</h1>
            <div class="descricao">
                Ut rhoncus risus eu velit vulputate malesuada. Cras pretium tempor mi,
                et elementum magna tristique non. Duis et elementum nibh.
                Aliquam pellentesque, enim sit amet molestie pretium, sapien purus maximus magna,
                sit amet rhoncus metus massa at metus.
            </div>
            <div class="quantidade">
                <div class="input-qtd">
                    <label for="">Quantidade: </label>
                    <input type="number" name="quantidade" id="">
                </div>
                <p>R$1,99</p>
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
    </div>
    <?php include '../components/footer.php'; ?>
</body>

</html>