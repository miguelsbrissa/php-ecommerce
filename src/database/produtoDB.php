<?php
function createProdutoDB($nome, $preco, $categoriaId, $img, $descricao, $conn)
{
    $sql = "INSERT INTO produto VALUES(NULL, '$nome', '$preco', '$categoriaId', '$img', '$descricao')";
    $result = mysqli_query($conn, $sql);

    return $result;
}

function findProdutoByIdDB($id, $conn)
{
    $sql = "SELECT * FROM produto WHERE idProduto = '$id'";
    $result = mysqli_query($conn, $sql);
    $produto = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $produto = array_pop($produto);

    return $produto;
}
function findProdutoByNameDB($name, $conn)
{
    $sql = "SELECT * FROM produto WHERE nome = '$name'";
    $result = mysqli_query($conn, $sql);
    $produto = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $produto = array_pop($produto);

    return $produto;
}

function findProdutoByCategoriaDB($catName, $conn)
{
    $sql = "SELECT idCategoria FROM categoria WHERE nome = '$catName'";
    $result = mysqli_query($conn, $sql);
    $categoria = mysqli_fetch_all($result, MYSQLI_ASSOC);

    $catId = $categoria[0]['idCategoria'];
    $sql = "SELECT * FROM produto WHERE categoria_id = $catId";
    $result = mysqli_query($conn, $sql);
    $produtosByCat = mysqli_fetch_all($result, MYSQLI_ASSOC);

    return $produtosByCat;
}
