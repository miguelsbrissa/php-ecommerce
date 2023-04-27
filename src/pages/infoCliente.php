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
                    <input type="button" value="Endereçoes" onclick="switchContent('endereco')">
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
            </div>
            <div class="info-dados off" id="dados-endereco">
                
            </div>
            <div class="info-dados off" id="dados-pagamento">
                pagamento
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
                divDadosEndereco.classList.add('off')
                divDadosPagamento.classList.add('off')
                divDadosCompras.classList.add('off')
                break;
            case 'endereco':
                divDadosEndereco.classList.remove('off')
                divDadosEndereco.classList.add('on')
                divDadosPessoais.classList.add('off')
                divDadosPagamento.classList.add('off')
                divDadosCompras.classList.add('off')
                break;
            case 'pagamento':
                divDadosPagamento.classList.remove('off')
                divDadosPagamento.classList.add('on')
                divDadosEndereco.classList.add('off')
                divDadosPessoais.classList.add('off')
                divDadosPessoais.divDadosCompras.add('off')
                break;
            case 'compras':
                divDadosCompras.classList.remove('off')
                divDadosCompras.classList.add('on')
                divDadosEndereco.classList.add('off')
                divDadosPessoais.classList.add('off')
                divDadosPagamento.classList.add('off')
                break;
        }
    }
</script>

</html>