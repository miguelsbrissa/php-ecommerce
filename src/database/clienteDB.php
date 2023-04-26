<?php

function createClienteDB($cpf, $nome, $email, $senha, $data, $conn)
{
    $sql = "INSERT INTO cliente VALUES ('$cpf','$nome','$email','$senha', '$data')";
    $result = mysqli_query($conn, $sql);

    return $result;
}

function findClienteByCpf($cpf, $conn){
    $sql = "SELECT * FROM cliente WHERE cpf = '$cpf';";
    $result = $result = mysqli_query($conn, $sql);
    $cliente = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $cliente = array_pop($cliente);

    return $cliente;
}