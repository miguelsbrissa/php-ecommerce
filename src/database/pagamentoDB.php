<?php
function createPagamentoDB($tipoCartao, $numero, $nomeTitular, $dataValidade, $clienteCpf, $conn)
{
    $sql = "INSERT INTO pagamento VALUES ('$tipoCartao','$numero','$nomeTitular','$dataValidade', '$clienteCpf')";
    $result = mysqli_query($conn, $sql);

    return $result;
}

function findPagamentosByClienteDB($clienteCpf, $conn){
    $sql = "SELECT * FROM pagamento WHERE cpfCliente = '$clienteCpf'";
    $result = mysqli_query($conn, $sql);
    $listaPagamentos = mysqli_fetch_all($result, MYSQLI_ASSOC);

    return $listaPagamentos;
}