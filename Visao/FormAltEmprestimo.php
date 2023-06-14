<?php
require './Modelo/Emprestimos.php';
require './Modelo/DAO/BugigangaDAO.php';

$id = @$_GET['idex']; // pega as infomações que são passadas por url da lista com seu respctivo dado
$emprestimos = new Emprestimos(); // cria um objeto da tabela
$bugigangasDAO = new BugigangaDAO();
$emprestimos = $bugigangasDAO->encontrarAtrasados($id); // aciona o método usando o idex como parametro
?>

<table>
    <form action="./Controle/ControleBugigangas.php?ACAO=alterarAtrasados" method="post"> <!--vemos aqui quele tem um ? depois que indica o final do diretório e depois começão a ser digitados os parâmetros que pode sem mais deum usando o & que seria um and ou uma ,-->
        <tr>
            <th colspan="2">
                <h2>Alterar Emprestimos</h2>
            </th>
        </tr>
        <tr>
            <td><label>Nome Item:</label></td>
            <td>
                <select name="nomeItem" class="inputs">
                    <option value="<?php echo $emprestimos->getNomeItem() ?>" selected><?php echo $emprestimos->getNomeItem() // vemos aqui que depois de usa o método, ele vai devolver um objeto com informações nos seus atributos, que podem ser chamados por seus respectivos métodos?></option> 
                    <?php
                    $bg = new BugigangaDAO();
                    $itens = $bg->listarItens();// um foreach usado como nas listas              
                    foreach ($itens as $item) {
                        $nomeItem = $item["nomeItem"];
                        echo "<option value='$nomeItem'>$nomeItem</option>";
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td><label>Nome do Locatário:</label></td>
            <td>
                <select name="nomeLoca" class="inputs">
                    <option value="<?php echo $emprestimos->getNomeLoca() ?>" selected><?php echo $emprestimos->getNomeLoca() ?></option>
                    <?php
                    $bg = new BugigangaDAO();
                    $locatarios = $bg->listarLocatarios();
                    foreach ($locatarios as $locatario) {
                        $nomeLoca = $locatario["nomeLoca"];
                        echo "<option value='$nomeLoca'>$nomeLoca</option>";
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td><label>Data de Devolução:</label></td>
            <td><input type="date" name="devolucao_str" class="inputs" value="<?php echo $emprestimos->getDevolucao_str() ?>"></td>
        </tr>
        <tr>
            <td colspan="2"><button type="submit" onclick="cadastrar()">Cadastrar</button></td>
        </tr>
        <tr>
            <td><input type="hidden" name="atrasados" id="" value="<?php echo $emprestimos->getIdEmprestimos()?>"></td>
        </tr>
    </form>
</table>
