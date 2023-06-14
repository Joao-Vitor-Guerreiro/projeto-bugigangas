<div class="list">
    <?php
        // a explicação está em ListLocatarios
        require_once './Modelo/DAO/BugigangaDAO.php';
    
        $bugiganga = new BugigangaDAO();
        $listaAtrasados = $bugiganga->atrasados();
    
    
        echo "<table class='list'>";
        echo "
                <tr>
                    <th>ID</th>
                    <th>Item</th>
                    <th>Prorpietário</th>
                    <th>Locatário</th>
                    <th>Devolução</th>
                    <th>Alterar</th>
                    <th>Excluir</th>
                </tr>
        ";
    
        foreach ($listaAtrasados as $lista) {
            echo "
                <tr>
                    <td>{$lista['idEmprestimos']}</td>
                    <td>{$lista['nomeItem']}</td>
                    <td>{$lista['proprietarioItem']}</td>
                    <td>{$lista['nomeLoca']}</td>
                    <td>{$lista['devolucao']}</td>
                    <td><a href='./Cadastros.php?Cadastros=altAtrasados&idex=" . $lista["idEmprestimos"] . "' onclick='checkComfirm()'><button name='alterar' id='alterar' value='alterar' type='submit'>Alterar</button></a></td>
                    <td><a href='Controle/ControleBugigangas.php?ACAO=excluirAtrasados&idex=".$lista["idEmprestimos"]."' onclick='checkComfirm()'><button name='excluir' id='excluir' value='excluir' type='submit'>Excluir</button></a></td>
                </tr>
            ";
        }
    
        echo "</table>"
    ?>
</div>
