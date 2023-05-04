<?php
include '../database/produtoDB.php';

function createProdutoController($nome, $preco, $categoriaId, $img, $descricao, $conn)
{
    if (createProdutoDB($nome, $preco, $categoriaId, $img, $descricao, $conn)) {
        return 'Produto cadastrado com sucesso!';
    } else {
        return 'Erro ao cadastrar cliente!';
    }
}

function findAllProdutoController($conn)
{
    $produto = findAllProdutoDB($conn);
    if ($produto) {
        return $produto;
    } else {
        return 'Produto(s) não encontrado(s)';
    }
}

function findProdutoByIdController($id, $conn)
{
    $produto = findProdutoByIdDB($id, $conn);
    if ($produto) {
        return $produto;
    } else {
        return 'Produto não encontrado';
    }
}

function findProdutoByNameController($name, $conn)
{
    $produto = findProdutoByNameDB($name, $conn);
    if ($produto) {
        return $produto;
    } else {
        return 'Produto não encontrado';
    }
}

function findProdutoByCategoriaController($catName, $conn)
{
    $produtosByCat = findProdutoByCategoriaDB($catName, $conn);
    if ($produtosByCat) {
        return $produtosByCat;
    } else {
        return 'Produtos não encontrados!';
    }
}
