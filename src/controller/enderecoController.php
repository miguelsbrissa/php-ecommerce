<?php
include '../database/enderecoDB.php';
function createEnderecoController($rua, $numero, $bairro, $cidade, $cep, $clienteCpf, $conn)
{
    if (createEnderecoDB($rua, $numero, $bairro, $cidade, $cep, $clienteCpf, $conn)) {
        return 'Endereco cadastrado com sucesso!';
    } else {
        return 'Erro ao cadastrar pedido!';
    }
}

function findEnderecosByClienteController($clienteCpf, $conn){
    $listaEnderecos = findEnderecosByClienteDB($clienteCpf, $conn);
    if ($listaEnderecos) {
        return $listaEnderecos;
    } else {
        return [];
    }
}