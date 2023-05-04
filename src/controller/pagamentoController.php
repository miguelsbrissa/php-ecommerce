<?php
include '../database/pagamentoDB.php';

function createPagamentoController($tipoCartao, $numero, $nomeTitular, $dataValidade, $clienteCpf, $conn)
{
    if (createPagamentoDB($tipoCartao, $numero, $nomeTitular, $dataValidade, $clienteCpf, $conn)) {
        return 'Pagamento cadastrado com sucesso!';
    } else {
        return 'Erro ao cadastrar pedido!';
    }
}

function findPagamentosByClienteController($clienteCpf, $conn)
{
    $listaEnderecos = findPagamentosByClienteDB($clienteCpf, $conn);
    if ($listaEnderecos) {
        return $listaEnderecos;
    } else {
        return [];
    }
}
