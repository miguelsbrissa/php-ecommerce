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
    <?php
    $cliente_nome = $_GET['cliente'];
    ?>
    <?php include '../components/nav.php'; ?>
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
                <div class="input-field">
                    <label for="">CPF:</label>
                    <input class="input" type="text" name="cpf" id="" value="123.456.789.10">
                </div>
                <div class="input-field">
                    <label for="">Nome:</label>
                    <input class="input" type="text" name="nome" id="" value="Miguel">
                </div>
                <div class="input-field">
                    <label for="">Data de nascimento:</label>
                    <input class="input" type="date" name="data_nasc" id="">
                </div>
                <div class="input-field">
                    <label for="">Email:</label>
                    <input class="input" type="email" name="email" id="" value="miguel@email.com">
                </div>
                <div class="input-field">
                    <label for="">Senha:</label>
                    <input class="input" type="password" name="senha" id="" value="123456">
                </div>
                <input class="input-add" type="submit" value="Atualizar cadastro">
            </div>
            <div class="info-dados off" id="dados-endereco">
                <div class="input-field">
                    <label for="">Rua:</label>
                    <input class="input" type="text" name="rua" id="" value="Eu, Robô">
                </div>
                <div class="input-field">
                    <label for="">Numero:</label>
                    <input class="input" type="number" name="numero" id="" value="1" min="1">
                </div>
                <div class="input-field">
                    <label for="">Bairro:</label>
                    <input class="input" type="text" name="bairro" id="" value="Asimov">
                </div>
                <div class="input-field">
                    <label for="">Cidade:</label>
                    <input class="input" type="text" name="cidade" id="" value="Ficção">
                </div>
                <div class="input-field">
                    <label for="">CEP:</label>
                    <input class="input" type="text" name="cep" id="" value="01001-01">
                </div>
                <input class="input-add" type="submit" value="Cadastrar endereço">
                <div class="lista">
                    <table class="tabela-dados" aria-label="">
                        <tr>
                            <th>Rua</th>
                            <th>Número</th>
                            <th>Bairro</th>
                            <th>Cidade</th>
                            <th>CEP</th>
                        </tr>
                        <tr>
                            <td>Eu, Robô</td>
                            <td>1</td>
                            <td>Asimov</td>
                            <td>Ficção</td>
                            <td>01001-01</td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="info-dados off" id="dados-pagamento">
                <div class="input-field">
                    <label for="tipo_cartao">Débito</label>
                    <input type="radio" name="tipo_cartao" id="debito" value="debito">
                    <label for="tipo_cartao">Crédito</label>
                    <input type="radio" name="tipo_cartao" id="credito" value="credito">
                </div>
                <div class="input-field">
                    <label for="">Número:</label>
                    <input class="input" type="text" name="numero" id="" value="1234 5678 9010 1112">
                </div>
                <div class="input-field">
                    <label for="">Nome titular:</label>
                    <input class="input" type="text" name="nome_titular" id="" value="Miguel Sbrissa">
                </div>
                <div class="input-field">
                    <label for="">Data validade:</label>
                    <input class="input" type="text" name="data_validade" id="" value="11/25">
                </div>
                <input class="input-add" type="submit" value="Cadastrar endereço">
                <div class="lista">
                <table class="tabela-dados" aria-label="">
                        <tr>
                            <th>Tipo de cartão</th>
                            <th>Número</th>
                            <th>Nome do titular</th>
                            <th>Data validade</th>
                        </tr>
                        <tr>
                            <td>Débito</td>
                            <td>1234 5678 9010 1112</td>
                            <td>Miguel Sbrissa</td>
                            <td>11/25</td>
                        </tr>
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