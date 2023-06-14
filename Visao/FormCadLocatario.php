    <table>
        <form action="./Controle/ControleBugigangas.php?ACAO=addLocatario" method="post">
            <tr>
                <th colspan="2"><h2>Locatário</h2></th>
            </tr>
            <tr>
                <td><label></label>Locatário:</td>
                <td><input type="text" name="nomeLoca" class="inputs"></td>
            </tr>
            <tr>
                <td><label></label>CPF:</td>
                <td><input type="text" name="cpfLoca" class="inputs"></td>
            </tr>
            <tr>
                <td><label>CEP:</label></td>
                <td><input type="text" name="enderecoLoca" class="inputs"></td>
            </tr>
            <tr>
                <td colspan="2"><button type="submit" onclick="cadastrar()">Cadastrar</button></td>
            </tr>
        </form>
    </table>