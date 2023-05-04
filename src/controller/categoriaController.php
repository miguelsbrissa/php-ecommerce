<?php
include '../database/categoriaDB.php';
function createCategoriaController($nome, $conn)
{
    if (createCategoriaDB($nome, $conn)) {
        return 'Categoria criada com sucesso!';
    } else {
        return 'Erro ao criar categoria!';
    }
}

function findAllCategoriaController($conn)
{
    $categoria = findAllCategoriaDB($conn);
    if ($categoria) {
        return $categoria;
    } else {
        return 'Categoria(s) não encontrada(s)!';
    }
}
