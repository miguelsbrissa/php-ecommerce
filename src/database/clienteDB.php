<?php
function createClienteDB($cpf, $nome, $email, $senha, $data, $conn)
{
    $sql = "INSERT INTO cliente VALUES ('$cpf','$nome','$email','$senha', '$data')";
    $result = mysqli_query($conn, $sql);

    return $result;
}

function findClienteByCpfDB($cpf, $conn)
{
    $sql = "SELECT * FROM cliente WHERE cpf = '$cpf';";
    $result = $result = mysqli_query($conn, $sql);
    $cliente = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $cliente = array_pop($cliente);

    return $cliente;
}

function findClienteByEmailDB($email, $conn)
{
    $sql = "SELECT * FROM cliente WHERE email = '$email'";
    $result = $result = mysqli_query($conn, $sql);
    $cliente = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $cliente = array_pop($cliente);

    return $cliente;
}
function updateClienteByCpfDB($cpf, $nome, $email, $senha, $data, $conn)
{
    $sql = "UPDATE cliente SET nome='$nome',email='$email',senha='$senha',data_nasc='$data' WHERE cpf='$cpf';";
    $result = mysqli_query($conn, $sql);

    return $result;
}
