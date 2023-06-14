<?php
    $msg = @$_GET['MSG']; // informação recebida por url
    if ($msg != null || $msg != '') {
        echo "<script>alert('$msg')</script>"; // envia um alerta para a página
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bugigangas</title>
    <link rel="stylesheet" href="./Visao/css/index.css">
    <link rel="stylesheet" href="./Visao/css/form.css">

</head>
<body onload="checkEnvio()">
    <header>
        <?php
            include './Visao/cabecalho.php';
            include './Visao/menu.php';
        ?>
    </header>
    <main>
        <div class="formulario">
            <?php
            
            $cadastro = @$_GET['Cadastros']; // informação recebida por url
            switch($cadastro) { // baseado na informação ele farrega diferentes cadastros
                case 'Emprestimos':
                    include './Visao/FormCadEmprestimos.php';
                    break;
                case 'Itens':
                    include './Visao/FormCadItem.php';
                    break;
                case 'Locatarios':
                    include './Visao/FormCadLocatario.php';
                    break;
                case 'altItem':
                    include './Visao/FormAltItem.php';
                    break;
                case 'altLocatario':
                    include './Visao/FormAltLocatario.php';
                    break;
                case 'altAtrasados':
                    include './Visao/FormAltEmprestimo.php';
                    break;
                default:
                    break;
            }
            
            ?>
        </div>
    </main>
    <footer>
        <?php
            include './Visao/rodape.php'
        ?>
    </footer>
    <script src="./Visao/js/index.js"></script>
    <script src="./Visao/js/envioFormulario.js"></script>
</body>
</html>