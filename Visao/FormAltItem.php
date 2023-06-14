<?php
    require './Modelo/Item.php';
    require './Modelo/DAO/BugigangaDAO.php';
    $id =@$_GET['idex'];
    $item = new Item();
    $bugigangasDAO = new BugigangaDAO();
    $item = $bugigangasDAO->encontrarItem($id);
    // a explicação está em FormAltEmprestimos
?>

<table>
        <form action="./Controle/ControleBugigangas.php?ACAO=alterarItem" method="post">
            <tr>
                <th colspan="2"><h2>Alteração de Itens</h2></th>
            </tr>
            <tr>
                <td><label></label>Nome Item:</td>
                <td><input type="text" name="nomeItem" class="inputs" value="<?php echo $item->getNomeItem()?>"></td>
            </tr>
            <tr>
                <td><label></label>Proprietário:</td>
                <td><input type="text" name="proprietarioItem" class="inputs" value="<?php echo $item->getProprietarioItem()?>"></td>
            </tr>
            <tr>
                <td><input type="hidden" name="idItem" class="inputs" value="<?php echo $item->getIdItem()?>"></td>
            </tr>
            <tr>
                <td colspan="2"><button type="submit" onclick="cadastrar()">Cadastrar</button></td>
            </tr>
        </form>
    </table>


