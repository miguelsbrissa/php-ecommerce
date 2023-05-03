<?php
function createEnderecoDB($rua, $numero, $bairro, $cidade, $cep, $clienteCpf, $conn)
{
    $sql = "INSERT INTO endereco VALUES ('$rua','$numero','$bairro','$cidade', '$cep', '$clienteCpf')";
    $result = mysqli_query($conn, $sql);

    return $result;
}

function findEnderecosByClienteDB($clienteCpf, $conn){
    $sql = "SELECT * FROM endereco WHERE cpfCliente = '$clienteCpf'";
    $result = mysqli_query($conn, $sql);
    $listaEnderecos = mysqli_fetch_all($result, MYSQLI_ASSOC);

    return $listaEnderecos;
}