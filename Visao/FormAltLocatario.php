<?php
    require './Modelo/Locatario.php';
    require './Modelo/DAO/BugigangaDAO.php';
    $id =@$_GET['idex'];
    $locatario = new Locatario();
    $bugigangasDAO = new BugigangaDAO();
    $locatario = $bugigangasDAO->encontrarLocatario($id);
    // a explicação está em FormAltEmprestimos
?>

<table>
        <form action="./Controle/ControleBugigangas.php?ACAO=alterarLocatario" method="post">
            <tr>
                <th colspan="2"><h2>Alteração de Locatário</h2></th>
            </tr>
            <tr>
                <td><label></label>Nome Item:</td>
                <td><input type="text" name="nomeLoca" class="inputs" value="<?php echo $locatario->getNomeLoca()?>"></td>
            </tr>
            <tr>
                <td><label></label>Proprietário:</td>
                <td><input type="text" name="enderecoLoca" class="inputs" value="<?php echo $locatario->getEnderecoLoca()?>"></td>
            </tr>
            <tr>
                <td><input type="hidden" name="cpfLoca" value="<?php echo $locatario->getCpfLoca()?>" readonly></td>
            </tr>
            <tr>
                <td colspan="2"><button type="submit" onclick="cadastrar()">Cadastrar</button></td>
            </tr>
        </form>
    </table>


