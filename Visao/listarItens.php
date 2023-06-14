<div class="list">
    <?php
     // a explicação está em ListLocatarios
        require_once './Modelo/DAO/BugigangaDAO.php';
    
        $bugiganga = new BugigangaDAO();
        $listaItens = $bugiganga->listarItens();
    
    
        echo "<table class='list'>";
        echo "
                <tr>
                    <th>Item</th>
                    <th>Proprietário</th>
                    <th>Alterar</th>
                    <th>Excluir</th>
                </tr>
        ";
    
        foreach ($listaItens as $lista) {
            echo "
                <tr>
                    <td>" . $lista["nomeItem"] . "</td>
                    <td>" . $lista["proprietarioItem"] . "</td>
                    <td><a href='./Cadastros.php?Cadastros=altItem&idex=" . $lista["idItem"] . "' onclick='checkComfirm()'><button name='alterar' id='alterar' value='alterar' type='submit'>Alterar</button></a></td>
                    <td><a href='Controle/ControleBugigangas.php?ACAO=excluirItem&idex=".$lista["idItem"]."' onclick='checkComfirm()'><button name='excluir' id='excluir' value='excluir' type='submit'>Excluir</button></a></td>
                </tr>
            ";
        }
        echo "</table>"
    ?>



    
    
</div>
