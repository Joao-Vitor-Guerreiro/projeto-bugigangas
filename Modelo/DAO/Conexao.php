<?php

abstract class Conexao { // abstrata porque não vamos instancia-la diretamente

    public static function criarConexao() {
        $infoDB = 'mysql:host=localhost;dbname=bugigangas'; // aqui vao algumas informações sobr o banco de dados
        $usuario = 'root'; // adminitrador golbal do DB, ou seja tem todos os acessos
        $senha = ''; // por padrão não tem senha a menos que tenha sido definida por alguém
    try{
        $pdo = new PDO($infoDB, $usuario, $senha);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // :: é usado para chamar métodos em te que instanciar on=bjetos e usar metodos e atributos estaticos
        // o pdo foi criado para chamar a exeção caso algo de errado
        return $pdo;

    } catch (PDOException $ex) {
        echo $ex->getMessage(); // getmesage especifica o tipo do erro

    } // o try carch lida com exeções, ou seja, quando a ação der certo, o bloco do try e executado, ao dar um erro que tem que ser expecificado nos parametros do catch
}

}

?>