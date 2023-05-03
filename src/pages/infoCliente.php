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
    include '../controller/clienteController.php';
    include '../controller/pagamentoController.php';
    include '../controller/enderecoController.php';

    $cliente_nome = $cliente['nome'];
    $clienteCpf = $cliente['cpf'];

    if (isset($_POST['updateCliente'])) {
        if (empty($_POST['nome'])) {
            echo 'Digite o nome!';
        } else {
            $input_nome = filter_input(
                INPUT_POST,
                'nome',
                FILTER_SANITIZE_FULL_SPECIAL_CHARS
            );
        }
        if (empty($_POST['data_nasc'])) {
            echo 'Digite a data!';
        } else {
            $input_dataNasc = filter_input(
                INPUT_POST,
                'data_nasc',
                FILTER_SANITIZE_FULL_SPECIAL_CHARS
            );
        }
        if (empty($_POST['email'])) {
            echo 'Digite o email!';
        } else {
            $input_email = filter_input(
                INPUT_POST,
                'email',
                FILTER_SANITIZE_EMAIL
            );
        }
        if (empty($_POST['senha'])) {
            echo 'Digite a senha!';
        } else {
            $input_senha = filter_input(
                INPUT_POST,
                'senha',
                FILTER_SANITIZE_FULL_SPECIAL_CHARS
            );
        }

        try {
            updatelienteByCpfController($input_cpf,$input_nome,$input_email,$input_senha, $input_dataNasc, $conn);
            header('Refresh:3');
        } catch (Exception $error) {
            echo 'Erro ao atualizar os dados do cliente: ' . $error;
        }
    }

    if (isset($_POST['cadEndereco'])) {
        if (empty($_POST['rua'])) {
            echo 'Digite o nome da rua!';
        } else {
            $input_rua = filter_input(
                INPUT_POST,
                'rua',
                FILTER_SANITIZE_FULL_SPECIAL_CHARS
            );
        }
        if (empty($_POST['numero'])) {
            echo 'Digite o nome da numero!';
        } else {
            $input_numero = (int) $_POST['numero'];
        }
        if (empty($_POST['bairro'])) {
            echo 'Digite o nome da bairro!';
        } else {
            $input_bairro = filter_input(
                INPUT_POST,
                'bairro',
                FILTER_SANITIZE_FULL_SPECIAL_CHARS
            );
        }
        if (empty($_POST['cidade'])) {
            echo 'Digite o nome da cidade!';
        } else {
            $input_cidade = filter_input(
                INPUT_POST,
                'cidade',
                FILTER_SANITIZE_FULL_SPECIAL_CHARS
            );
        }
        if (empty($_POST['cep'])) {
            echo 'Digite o nome da cep!';
        } else {
            $input_cep = filter_input(
                INPUT_POST,
                'cep',
                FILTER_SANITIZE_FULL_SPECIAL_CHARS
            );
        }

        try {
            createEnderecoController($input_rua, $input_numero, $input_bairro, $input_cidade, $input_cep, $clienteCpf, $conn);
            header('Refresh:3');
        } catch (Exception $error) {
            echo 'Erro ao cadastrar endereco: ' . $error;
        }
    }
    if (isset($_POST['cadPagamento'])) {
        if (empty($_POST['tipo_cartao'])) {
            echo 'Escolha o tipo do cartão!';
        } else {
            $input_tipoCartao = $_POST['tipo_cartao'];
        }
        if (empty($_POST['numero'])) {
            echo 'Digite o nome da numero!';
        } else {
            $input_numero = filter_input(
                INPUT_POST,
                'numero',
                FILTER_SANITIZE_FULL_SPECIAL_CHARS
            );
        }
        if (empty($_POST['nome_titular'])) {
            echo 'Digite o nome da bairro!';
        } else {
            $input_nomeTitular = filter_input(
                INPUT_POST,
                'nome_titular',
                FILTER_SANITIZE_FULL_SPECIAL_CHARS
            );
        }
        if (empty($_POST['data_validade'])) {
            echo 'Digite o nome da cidade!';
        } else {
            $input_dataValidade = filter_input(
                INPUT_POST,
                'data_validade',
                FILTER_SANITIZE_FULL_SPECIAL_CHARS
            );
        }

        try {
            createPagamentoController($input_tipoCartao, $input_numero, $input_nomeTitular, $input_dataValidade, $clienteCpf, $conn);
            header('Refresh:3');
        } catch (Exception $error) {
            echo 'Erro ao cadastrar forma de pagamento: ' . $error;
        }
    }
    $listaEnderecos = findEnderecosByClienteController($clienteCpf, $conn);
    $listaPagamentos = findPagamentosByClienteController($clienteCpf, $conn);
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
            <div class="info-dados on" id="dados-pessoais">
                <form action="" method="post">
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
            <div class="info-dados off" id="dados-endereco">
                <form action="" method="post">
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
            <div class="info-dados off" id="dados-pagamento">
                <form action="" method="post">
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
            <div class="info-dados off" id="dados-compra">
                compras
            </div>
        </div>
    </div>
    <?php include '../components/footer.php'; ?>
</body>
<script>
    function switchContent(conteudo) {
        const divDadosPessoais = document.getElementById('dados-pessoais')
        const divDadosEndereco = document.getElementById('dados-endereco')
        const divDadosPagamento = document.getElementById('dados-pagamento')
        const divDadosCompras = document.getElementById('dados-compra')

        switch (conteudo) {
            case 'pessoal':
                divDadosPessoais.classList.remove('off')
                divDadosPessoais.classList.add('on')

                divDadosEndereco.classList.remove('on')
                divDadosEndereco.classList.add('off')

                divDadosPagamento.classList.remove('on')
                divDadosPagamento.classList.add('off')

                divDadosCompras.classList.remove('on')
                divDadosCompras.classList.add('off')
                break;
            case 'endereco':
                divDadosPessoais.classList.remove('on')
                divDadosPessoais.classList.add('off')

                divDadosEndereco.classList.remove('off')
                divDadosEndereco.classList.add('on')

                divDadosPagamento.classList.remove('on')
                divDadosPagamento.classList.add('off')

                divDadosCompras.classList.remove('on')
                divDadosCompras.classList.add('off')
                break;
            case 'pagamento':
                divDadosPessoais.classList.remove('on')
                divDadosPessoais.classList.add('off')

                divDadosEndereco.classList.remove('on')
                divDadosEndereco.classList.add('off')

                divDadosPagamento.classList.remove('off')
                divDadosPagamento.classList.add('on')

                divDadosCompras.classList.remove('on')
                divDadosCompras.classList.add('off')
                break;
            case 'compras':
                divDadosPessoais.classList.remove('on')
                divDadosPessoais.classList.add('off')

                divDadosEndereco.classList.remove('on')
                divDadosEndereco.classList.add('off')

                divDadosPagamento.classList.remove('on')
                divDadosPagamento.classList.add('off')

                divDadosCompras.classList.remove('off')
                divDadosCompras.classList.add('on')
                break;
        }
    }
</script>

</html>