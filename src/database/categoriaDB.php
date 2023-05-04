<?php
function createCategoriaDB($nome, $conn)
{
    $sql = "INSERT INTO categoria VALUES (NULL,'$nome')";
    $result = mysqli_query($conn, $sql);

    return $result;
}

function findAllCategoriaDB($conn)
{
    $sql = "SELECT * FROM categoria;";
    $result = $result = mysqli_query($conn, $sql);
    $categoria = mysqli_fetch_all($result, MYSQLI_ASSOC);

    return $categoria;
}
