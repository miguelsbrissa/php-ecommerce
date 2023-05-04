<?php
include '../database/pedidoDB.php';
function createPedidoController($valor, $dataPedido, $statusPedido, $clienteCpf, $conn)
{
    if (createPedidoDB($valor, $dataPedido, $statusPedido, $clienteCpf, $conn)) {
        return 'Pedido cadastrado com sucesso!';
    } else {
        return 'Erro ao cadastrar pedido!';
    }
}

function findPedidoByClienteController($clienteCpf, $statusPedido, $conn)
{
    $pedido = findPedidoByClienteDB($clienteCpf, $statusPedido, $conn);
    if ($pedido) {
        return $pedido;
    } else {
        return [];
    }
}

function deletePedidoByIdController($pedidoId, $conn)
{
    if (deletePedidoByIdDB($pedidoId, $conn)) {
        return 'Pedido deletado com sucesso!';
    } else {
        return false;
    }
}

function finishPedidoByIdController($status, $pedidoId, $enderecoId, $pagamentoId, $conn)
{
    if (finishPedidoByIdBD($status, $pedidoId, $enderecoId, $pagamentoId, $conn)) {
        return 'Pedido finalizado!';
    } else {
        return false;
    }
}

function updateValorPedidoByIdController($valor, $pedidoId, $conn)
{
    if (updateValorPedidoByIdBD($valor, $pedidoId, $conn)) {
        return 'Pedido finalizado!';
    } else {
        return false;
    }
}
function createItemPedidoController($prodQtd, $prodId, $pedidoId, $conn)
{
    if (createItemPedidoDB($prodQtd, $prodId, $pedidoId, $conn)) {
        return 'Item cadastrado com sucesso!';
    } else {
        return 'Erro ao cadastrar item!';
    }
}

function findItemPedidoByPedidoIdController($pedidoId, $conn)
{
    $pedido = findItemPedidoByPedidoIdDB($pedidoId, $conn);
    if ($pedido) {
        return $pedido;
    } else {
        return [];
    }
}

function deleteItemPedidoByIdController($itemId, $conn)
{
    if (deleteItemPedidoByIdDB($itemId, $conn)) {
        return 'Item deletado com sucesso!';
    } else {
        return false;
    }
}
