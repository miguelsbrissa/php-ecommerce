<?php

function createPedidoDB($valor, $dataPedido, $statusPedido, $clienteCpf, $conn)
{
    $sql = "INSERT INTO pedido VALUES(NULL, $valor, '$dataPedido', '$statusPedido', '$clienteCpf', NULL, NULL)";
    $result = mysqli_query($conn, $sql);

    return $result;
}

function findPedidoByClienteDB($clienteCpf, $statusPedido, $conn)
{
    $sql = "SELECT * FROM pedido WHERE cliente_cpf = '$clienteCpf' AND status_pedido = '$statusPedido';";
    $result = $result = mysqli_query($conn, $sql);
    $pedido = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $pedido = array_pop($pedido);

    return $pedido;
}

function deletePedidoByIdDB($pedidoId, $conn)
{
    $sql = "DELETE FROM pedido WHERE idPedido = '$pedidoId'";
    $result = mysqli_query($conn, $sql);

    return $result;
}

function finishPedidoByIdBD($status, $pedidoId, $enderecoId, $pagamentoId, $conn) //essa função finaliza o pedido então só é necassário att o status, o endereco e o pagamento
{
    $sql = "UPDATE pedido SET status_pedido ='$status', idEndereco='$enderecoId', idPagamento='$pagamentoId' WHERE idPedido = '$pedidoId'";
    $result = mysqli_query($conn, $sql);

    return $result;
}
function updateValorPedidoByIdBD($valor, $pedidoId, $conn) //essa função finaliza o pedido então só é necassário att o status e o valor
{
    $sql = "UPDATE pedido SET valor ='$valor' WHERE idPedido = '$pedidoId'";
    $result = mysqli_query($conn, $sql);

    return $result;
}

function createItemPedidoDB($prodQtd, $prodId, $pedidoId, $conn)
{
    $sql = "INSERT INTO itens_pedido VALUES(NULL, $prodQtd, $prodId, $pedidoId)";
    $result = mysqli_query($conn, $sql);

    return $result;
}

function findItemPedidoByPedidoIdDB($pedidoId, $conn)
{
    $sql = "SELECT * FROM itens_pedido WHERE pedido_id = $pedidoId";
    $result = mysqli_query($conn, $sql);
    $itens = mysqli_fetch_all($result, MYSQLI_ASSOC);

    return $itens;
}

function deleteItemPedidoByIdDB($itemId, $conn)
{
    $sql = "DELETE FROM itens_pedido WHERE idItem = '$itemId'";
    $result = mysqli_query($conn, $sql);

    return $result;
}
