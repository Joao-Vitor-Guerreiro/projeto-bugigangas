<?php
    require './Modelo/DAO/BugigangaDAO.php';
    // a explicação está em FormAltEmprestimos
?>
    <table>
        <form action="./Controle/ControleBugigangas.php?ACAO=Emprestimo" method="post">
            <tr>
                <th colspan="2"><h2>Realizar Emprestimos</h2></th>
            </tr>
            <tr>
                <td><label>Nome Item:</label></td>
                <td>
                    <select name="nomeItem" class="inputs">
                    <option value="Selecione" selected>Selecione</option>
                    <?php
                        $bg = new BugigangaDAO();
                        $itens = $bg->listarItens();
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
                        <option value="Selecione" selected>Selecione</option>
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
                <td><input type="date" name="devolucao_str" class="inputs"></td>
            </tr>
            <tr>
                <td colspan="2"><button type="submit" onclick="cadastrar()">Cadastrar</button></td>
            </tr>
        </form>
    </table>