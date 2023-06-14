<?php
    $msg = @$_GET['MSG'];
    if ($msg != null || $msg != '') {
        echo "<script>alert('$msg')</script>";
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
        <div class="lista">
            <?php
            
            $listas = @$_GET['Listas']; // mesma coisa dos Cadastros
            switch($listas) {
                case 'Atrasados':
                    include './Visao/listarAtrasados.php';
                    break;
                case 'Itens':
                    include './Visao/listarItens.php';
                    break;
                case 'Locatarios':
                    include './Visao/listarLocatarios.php';
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
    <script src="./Visao/js/envioFormulario.js"></script>
    <script src="./Visao/js/index.js"></script>
    <script>
        function checkComfirm(){ // envia um comfirm na página caso os botões alterar ou excluir forem clicados 
            if(confirm('Deseja Continuar?')){

            } else {
                event.preventDefault(); // se for em cancelar, ele cancela o evento padrao do botão que no caso é o redireciona mento da página
            }
        }
    </script>
</body>
</html>