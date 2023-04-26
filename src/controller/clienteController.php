<?php
include '../database/clienteDB.php';
function createClienteController($cpf, $nome, $email, $senha, $data, $conn)
{
    if (createClienteDB($cpf, $nome, $email, $senha, $data, $conn)) {
        return 'Cliente cadastrado com sucesso!';
    } else {
        return 'Erro ao cadastrar cliente!';
    }
}

function findClienteByCpfController($cpf, $conn)
{
    $cliente = findClienteByCpf($cpf, $conn);
    if ($cliente) {
        return $cliente;
    } else {
        return 'Cliente não encontrado';
    }
}
