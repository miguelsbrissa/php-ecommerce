<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="../style/infoCliente.css">
    <link rel="stylesheet" href="../style/nav.css">
    <link rel="stylesheet" href="../style/footer.css">
    <script src="https://kit.fontawesome.com/f673a817b4.js" crossorigin="anonymous"></script>
    <title>E-commerce with PHP</title>
</head>

<body>
    <?php include '../components/nav.php'; ?>
    <?php
    include '../controller/pagamentoController.php';
    include '../controller/enderecoController.php';
    include '../controller/pedidoController.php';
    include '../helpers/inputValidation.php';
    include '../helpers/globalConstants.php';

    $cliente_nome = $cliente['nome'];
    $clienteCpf = $cliente['cpf'];
    $msgErrorCli = null;
    $msgErrorEnd = null;
    $msgErrorPag = null;

    if (isset($_POST['updateCliente'])) {
        $input_nome = handleInputText('nome');
        $input_dataNasc = handleInputText('data_nasc');
        $input_email = handleInputEmail('email');
        $input_senha = handleInputText('senha');
        $msgErrorCli = null;
        try {
            if ($input_nome === '' || $input_email === '' || $input_senha === '' || $input_dataNasc === '') {
                $msgErrorCli = ERROR_MESSAGE;
            } else {
                updatelienteByCpfController($clienteCpf, $input_nome, $input_email, $input_senha, $input_dataNasc, $conn);
                header(REFRESH_PAGE);
            }
        } catch (Exception $error) {
            echo 'Erro ao atualizar os dados do cliente: ' . $error;
        }
    }
    if (isset($_POST['cadEndereco'])) {
        $input_rua = handleInputText('rua');
        $input_numero = (int) handleEmptyInput('numero');
        $input_bairro = handleInputText('bairro');
        $input_cidade = handleInputText('cidade');
        $input_cep = handleInputText('cep');
        $msgErrorEnd = null;
        try {
            if ($input_rua === '' || $input_numero === '' || $input_bairro === '' || $input_cidade === '' || $input_cep === '') {
                $msgErrorEnd = ERROR_MESSAGE;
            } else {
                createEnderecoController($input_rua, $input_numero, $input_bairro, $input_cidade, $input_cep, $clienteCpf, $conn);
                header(REFRESH_PAGE);
            }
        } catch (Exception $error) {
            echo 'Erro ao cadastrar endereco: ' . $error;
        }
    }
    if (isset($_POST['cadPagamento'])) {
        $input_tipoCartao = $input_cep = handleEmptyInput('tipo_cartao');
        $input_numero = handleInputText('numero');
        $input_nomeTitular = handleInputText('nome_titular');
        $input_dataValidade = handleInputText('data_validade');
        $msgErrorPag = null;
        try {
            if ($input_tipoCartao === '' || $input_numero === '' || $input_nomeTitular === '' || $input_dataValidade === '') {
                $msgErrorPag = ERROR_MESSAGE;
            } else {
                createPagamentoController($input_tipoCartao, $input_numero, $input_nomeTitular, $input_dataValidade, $clienteCpf, $conn);
                header(REFRESH_PAGE);
            }
        } catch (Exception $error) {
            echo 'Erro ao cadastrar forma de pagamento: ' . $error;
        }
    }
    $listaEnderecos = findEnderecosByClienteController($clienteCpf, $conn);
    $listaPagamentos = findPagamentosByClienteController($clienteCpf, $conn);
    $listaPedidos = findAllPedidoByClienteController($clienteCpf, $conn);

    ?>
    <div class="content">
        <div class="sideNav">
            <ul>
                <div class="option">
                    <i class="fa-solid fa-user icon"></i>
                    <input type="button" value="Dados pessoais" onclick="switchContent('pessoal')">
                </div>
            </ul>
            <ul>
                <div class="option">
                    <i class="fa-solid fa-location-dot icon"></i>
                    <input type="button" value="Endereços" onclick="switchContent('endereco')">
                </div>
            </ul>
            <ul>
                <div class="option">
                    <i class="fa-solid fa-credit-card icon"></i>
                    <input type="button" value="Formas de pagamento" onclick="switchContent('pagamento')">
                </div>
            </ul>
            <ul>
                <div class="option">
                    <i class="fa-solid fa-cart-shopping icon"></i>
                    <input type="button" value="Historico de compras" onclick="switchContent('compras')">
                </div>
            </ul>
        </div>
        <div class="info">
            <div class="info-dados toggle" id="dados-pessoais">
                <form action="" method="post">
                    <?php if ($msgErrorCli) : ?>
                        <h1 class="error"><?php echo $msgErrorCli; ?></h1>
                    <?php endif; ?>
                    <div class="input-field">
                        <label for="">CPF:</label>
                        <input class="input" type="text" name="cpf" id="" value="<?php echo $cliente['cpf']; ?>" disabled>
                    </div>
                    <div class="input-field">
                        <label for="">Nome:</label>
                        <input class="input" type="text" name="nome" id="" value="<?php echo $cliente['nome']; ?>">
                    </div>
                    <div class="input-field">
                        <label for="">Data de nascimento:</label>
                        <input class="input" type="date" name="data_nasc" id="" value="<?php echo $cliente['data_nasc']; ?>">
                    </div>
                    <div class="input-field">
                        <label for="">Email:</label>
                        <input class="input" type="email" name="email" id="" value="<?php echo $cliente['email']; ?>">
                    </div>
                    <div class="input-field">
                        <label for="">Senha:</label>
                        <input class="input" type="password" name="senha" id="" value="<?php echo $cliente['senha']; ?>">
                    </div>
                    <input class="input-add" type="submit" value="Atualizar cadastro" name="updateCliente">
                </form>
            </div>
            <div class="info-dados" id="dados-endereco">
                <form action="" method="post">
                    <?php if ($msgErrorEnd) : ?>
                        <h1 class="error"><?php echo $msgErrorEnd; ?></h1>
                    <?php endif; ?>
                    <div class="input-field">
                        <label for="">Rua:</label>
                        <input class="input" type="text" name="rua" id="" value="">
                    </div>
                    <div class="input-field">
                        <label for="">Numero:</label>
                        <input class="input" type="number" name="numero" id="" value="" min="1">
                    </div>
                    <div class="input-field">
                        <label for="">Bairro:</label>
                        <input class="input" type="text" name="bairro" id="" value="">
                    </div>
                    <div class="input-field">
                        <label for="">Cidade:</label>
                        <input class="input" type="text" name="cidade" id="" value="">
                    </div>
                    <div class="input-field">
                        <label for="">CEP:</label>
                        <input class="input" type="text" name="cep" id="" value="">
                    </div>
                    <input class="input-add" type="submit" value="Cadastrar endereço" name="cadEndereco">
                </form>
                <div class="lista">
                    <table class="tabela-dados" aria-label="">
                        <tr>
                            <th>Rua</th>
                            <th>Número</th>
                            <th>Bairro</th>
                            <th>Cidade</th>
                            <th>CEP</th>
                        </tr>
                        <?php foreach ($listaEnderecos as $endereco) : ?>
                            <tr>
                                <td><?php echo $endereco['rua'] ?></td>
                                <td><?php echo $endereco['numero'] ?></td>
                                <td><?php echo $endereco['bairro'] ?></td>
                                <td><?php echo $endereco['cidade'] ?></td>
                                <td><?php echo $endereco['cep'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
            </div>
            <div class="info-dados" id="dados-pagamento">
                <form action="" method="post">
                    <?php if ($msgErrorPag) : ?>
                        <h1 class="error"><?php echo $msgErrorPag; ?></h1>
                    <?php endif; ?>
                    <div class="input-field">
                        <label for="tipo_cartao">Débito</label>
                        <input type="radio" name="tipo_cartao" id="debito" value="Debito">
                        <label for="tipo_cartao">Crédito</label>
                        <input type="radio" name="tipo_cartao" id="credito" value="Credito">
                    </div>
                    <div class="input-field">
                        <label for="">Número:</label>
                        <input class="input" type="text" name="numero" id="" value="">
                    </div>
                    <div class="input-field">
                        <label for="">Nome titular:</label>
                        <input class="input" type="text" name="nome_titular" id="" value="">
                    </div>
                    <div class="input-field">
                        <label for="">Data validade:</label>
                        <input class="input" type="text" name="data_validade" id="" value="">
                    </div>
                    <input class="input-add" type="submit" value="Cadastrar endereço" name="cadPagamento">
                </form>
                <div class="lista">
                    <table class="tabela-dados" aria-label="">
                        <tr>
                            <th>Tipo de cartão</th>
                            <th>Número</th>
                            <th>Nome do titular</th>
                            <th>Data validade</th>
                        </tr>
                        <?php foreach ($listaPagamentos as $pagamento) : ?>
                            <tr>
                                <td><?php echo $pagamento['tipoCartao'] ?></td>
                                <td><?php echo $pagamento['numero'] ?></td>
                                <td><?php echo $pagamento['nomeTitular'] ?></td>
                                <td><?php echo $pagamento['dataValidade'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
            </div>
            <div class="info-dados" id="dados-compra">
                <table class="tabela-dados" aria-label="">
                    <tr>
                        <th>Status do pedido</th>
                        <th>Data do pedido</th>
                        <th>Valor total do pedido</th>
                    </tr>
                    <?php foreach ($listaPedidos as $pedido) : ?>
                        <tr>
                            <td><?php echo $pedido['status_pedido']; ?></td>
                            <td><?php echo date("d/m/y h:i:s", strtotime($pedido['data_pedido'])); ?></td>
                            <td>R$<?php echo str_replace('.', ',', $pedido['valor']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </div>
    <?php include '../components/footer.php'; ?>
</body>
<script>
    function changeClasses(value) {
        const divDadosPessoais = document.getElementById('dados-pessoais')
        const divDadosEndereco = document.getElementById('dados-endereco')
        const divDadosPagamento = document.getElementById('dados-pagamento')
        const divDadosCompras = document.getElementById('dados-compra')
        const listaDivs = [divDadosPessoais, divDadosEndereco, divDadosPagamento, divDadosCompras]

        listaDivs.forEach(div => {
            if (div.id !== value) {
                if (div.classList.contains('toggle')) {
                    div.classList.toggle('toggle')
                }
            }
        })
    }

    function switchContent(conteudo) {
        const divDadosPessoais = document.getElementById('dados-pessoais')
        const divDadosEndereco = document.getElementById('dados-endereco')
        const divDadosPagamento = document.getElementById('dados-pagamento')
        const divDadosCompras = document.getElementById('dados-compra')

        switch (conteudo) {
            case 'pessoal':
                divDadosPessoais.classList.toggle('toggle')
                changeClasses('dados-pessoais')
                break;
            case 'endereco':
                divDadosEndereco.classList.toggle('toggle')
                changeClasses('dados-endereco')
                break;
            case 'pagamento':
                divDadosPagamento.classList.toggle('toggle')
                changeClasses('dados-pagamento')
                break;
            case 'compras':
                divDadosCompras.classList.toggle('toggle')
                changeClasses('dados-compra')
                break;
        }
    }
</script>

</html>