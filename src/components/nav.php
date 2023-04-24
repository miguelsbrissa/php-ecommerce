<?php include '../database/connection.php' ?>
<?php
$sql = "SELECT * FROM categoria";
$result = mysqli_query($conn, $sql);
$categorias = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>
<nav class="menu-nav">
    <ul>
        <a href="http://localhost/php-ecommerce/src/pages/index.php" class="menu-nav-item logo">
            <i class="fa-solid fa-seedling"></i>
            HealthyFood
        </a>
    </ul>
    <div class="menu-nav center">
        <ul>
            <div class="dropdown">
                <a href="http://localhost/php-ecommerce/src/pages/#" class="menu-nav-item dropdownbtn">Produtos <i class="fa-solid fa-chevron-down"></i></i></a>
                <div class="dropdown-content">
                    <?php foreach ($categorias as $categoria) : ?>
                        <a href="http://localhost/php-ecommerce/src/pages/produtos.php?categoria=<?php echo $categoria['nome'] ?>" class="dropdown-item"><?php echo $categoria['nome'] ?></a>
                    <?php endforeach; ?>
                </div>
            </div>
        </ul>
        <ul>
            <a href="http://localhost/php-ecommerce/src/pages/sobre.php" class="menu-nav-item">Sobre</a>
        </ul>
        <ul>
            <a href="http://localhost/php-ecommerce/src/pages/fale.php" class="menu-nav-item">Fale Conosco</a>
        </ul>
    </div>
    <ul>
        <a href="http://localhost/php-ecommerce/src/pages/finalPedido.php" class="menu-nav-item bag"><i class="fa-solid fa-bag-shopping"></i></a>
    </ul>
</nav>