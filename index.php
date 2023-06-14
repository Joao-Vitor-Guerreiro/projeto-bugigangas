<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bugigangas</title>
    <link rel="stylesheet" href="./Visao/css/index.css">k
    <link rel="stylesheet" href="./Visao/css/entrada.css">
</head>
<body>
   <header>
    <?php
        include './Visao/cabecalho.php';
        include './Visao/menu.php'
    ?>
   </header>
   <main onmouseout="entrarMain()">
    <div class="item">
        <img src="Visao/imagens/Emprestimos-p.png" alt="Emprestimo">
        <br>
        <a href="./Cadastros.php?Cadastros=Emprestimos"><button>Emprestimo</button></a>
    </div>
    <div class="item">
        <img src="Visao/imagens/locatario-p.png" alt="CADLocatario">
        <br>
        <a href="./Cadastros.php?Cadastros=Locatarios"><button>Locatário</button></a>
    </div>
    <div class="item">
        <img src="Visao/imagens/Item-p.png" alt="CADItem">
        <br>
        <a href="./Cadastros.php?Cadastros=Itens"><button>Item</button></a>
    </div>
   </main>
   <footer>
        <?php
            include './Visao/rodape.php'
        ?>
   </footer>

   
<script src="./Visao/js/index.js"></script> 
</body>
</html>