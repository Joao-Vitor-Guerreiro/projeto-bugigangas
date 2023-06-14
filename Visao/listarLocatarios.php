<div class="list">
    <?php
             // a explicação está em ListLocatarios
            require_once './Modelo/DAO/BugigangaDAO.php';
    
        $bugiganga = new BugigangaDAO();
        $listarLocatarios = $bugiganga->listarLocatarios(); // aqui é criado um array com as inforações da tabela
    
    
        echo "<table class='list'>";
        echo "
                <tr>
                    <th>Locatário</th>
                    <th>CPF</th>
                    <th>Endereço</th>
                    <th>Alterar</th>
                    <th>Excluir</th>
                </tr>
        ";
    
        foreach ($listarLocatarios as $lista) { // aqui é usado um for each que ler linha por linha cada indice e seu valor relacionado 
            echo "
                <tr>
                    <td>" . $lista["nomeLoca"] . "</td>
                    <td>" . $lista["cpfLoca"] . "</td>
                    <td>" . $lista["enderecoLoca"] . "</td>
                    <td><a href='./Cadastros.php?Cadastros=altLocatario&idex=" . $lista["cpfLoca"] . "' onclick='checkComfirm()'><button name='alterar' id='alterar' value='alterar' type='submit'>Alterar</button></a></td>
                    <td><a href='Controle/ControleBugigangas.php?ACAO=excluirLocatario&idex=".$lista["cpfLoca"]."' onclick='checkComfirm()'><button name='excluir' id='excluir' value='excluir' type='submit'>Excluir</button></a></td>
                </tr>
            ";
        }
        echo "</table>"
    ?>



    
    
</div>
