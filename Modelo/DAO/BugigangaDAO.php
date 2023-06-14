<?php
    require_once 'Conexao.php';
    class BugigangaDAO{

        //Item
        public function addItem(Item $addItem) { // pega o objeto item como parametro
            try{
                $pdo = Conexao::criarConexao();// acessa o banco de dados 
                $sql = "INSERT INTO item (nomeItem, ProprietarioItem) VALUES (?,?)";
                $stmt = $pdo->prepare($sql); // prepara a string que contem as intruções sql para que possam receber valor
                $stmt->bindValue(1, $addItem->getNomeItem()); // cada indice coresponde a uma ?
                $stmt->bindValue(2, $addItem->getProprietarioItem());
                $stmt->execute(); // executa o código no banco de dados 
                return TRUE; // se der certo, ele retorna truee
            } catch (PDOException $ex) {
                echo $ex->getMessage(); // exibe mensagem de erro e o tipo
            }
        }

        public function listarItens(){
            try {
                $pdo = Conexao::criarConexao();
                $sql = "SELECT * FROM item";
                $stmt = $pdo->prepare($sql);
                $stmt->execute();
                $itens = $stmt->fetchAll(PDO::FETCH_ASSOC); // pega as informações que foram resgatadas do stmt e tranforma em um array
                return $itens; // retorna esse array 
            } catch (PDOException $ex) {
                echo $ex->getMessage();
            }
        }

        public function encontrarItem($idItem){
            try {
                $item = new Item(); // objeto item criado
                $pdo = Conexao::criarConexao();
                $sql = "SELECT idItem, nomeItem, proprietarioItem
                        FROM item
                        WHERE idItem =:idItem 
                        LIMIT 1"; // seleciona o item baseado no id
                $stmt = $pdo->prepare($sql);
                $stmt->bindValue(':idItem', $idItem); // parametro usado para identificar o id 
                $stmt->execute();

                $itemAssoc = $stmt->fetch(PDO::FETCH_ASSOC);
                $item->setIdItem($itemAssoc['idItem']); // seta as informações adquiridas no itemAssoc com o objeto criado
                $item->setNomeItem($itemAssoc['nomeItem']);
                $item->setProprietarioItem($itemAssoc['proprietarioItem']);
                
                return $item; //retorna o objeto
            } catch (PDOException $ex) {
                echo $ex->getMessage();
            }
        }

        public function alterarItem(Item $alterarItem) { 
            try {
                $pdo = Conexao::criarConexao();
                $sql = "UPDATE item 
                        SET nomeItem=?, proprietarioItem=?
                        WHERE idItem=?"; // vai mudar as informações baseado no id 
                $stmt = $pdo->prepare($sql);
                $stmt->bindValue(1, $alterarItem->getNomeItem());
                $stmt->bindValue(2, $alterarItem->getProprietarioItem());
                $stmt->bindValue(3, $alterarItem->getIdItem()); // aqui ele busca o id que vai ser buscado pelo formulario de alteração de aluno com o neme idex 
                $stmt->execute();
                return $stmt->rowCount();// retorna o numero de alterações feitas
            } catch (PDOException $ex) {
                echo $ex->getMessage();
            }
        }

        public function excluirItem($idItem) {
            try {
                $pdo = Conexao::criarConexao();
                $sql = "DELETE FROM item 
                        WHERE idItem = :idItem";// vai excluir o item baseado no id
                $stmt = $pdo->prepare($sql);
                $stmt->bindValue(':idItem', $idItem);// pega o paramero e transforma numa condição 
                $stmt->execute();
                return true;
            } catch (PDOException $ex) {
                echo $ex->getMessage();
            }
        }
        
        // Locatario

        public function addLocatario(Locatario $addLocatario) {
            try{
                $pdo = Conexao::criarConexao();
                $sql = "INSERT INTO locatario (nomeLoca, cpfLoca, enderecoLoca) VALUES (?,?,?)";
                $stmt = $pdo->prepare($sql);
                $stmt->bindValue(1, $addLocatario->getNomeLoca());
                $stmt->bindValue(2, $addLocatario->getCpfLoca());
                $stmt->bindValue(3, $addLocatario->getEnderecoLoca());
                $stmt->execute();
                return TRUE;
            } catch (PDOException $ex) {
                echo $ex->getMessage();
            }
        }

        public function listarLocatarios() {
            try {
                $pdo = Conexao::criarConexao();
                $sql = "SELECT * FROM locatario";
                $stmt = $pdo->prepare($sql);
                $stmt->execute();
                $locatarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $locatarios;
            } catch (PDOException $ex) {
                echo $ex->getMessage();
            }
        }

        public function encontrarLocatario($cpfLoca){
            try {
                $locatario = new Locatario();
                $pdo = Conexao::criarConexao();
                $sql = "SELECT *
                        FROM locatario
                        WHERE cpfLoca =:cpfLoca 
                        LIMIT 1";
                $stmt = $pdo->prepare($sql);
                $stmt->bindValue(':cpfLoca', $cpfLoca);
                $stmt->execute();

                $locatarioAssoc = $stmt->fetch(PDO::FETCH_ASSOC);
                $locatario->setCpfLoca($locatarioAssoc['cpfLoca']);
                $locatario->setEnderecoLoca($locatarioAssoc['enderecoLoca']);
                $locatario->setnomeLoca($locatarioAssoc['nomeLoca']);
                
                return $locatario;
            } catch (PDOException $ex) {
                echo $ex->getMessage();
            }
        }

        public function alterarLocatario(Locatario $alterarLocatario) {
            try {
                $pdo = Conexao::criarConexao();
                $sql = "UPDATE locatario 
                        SET nomeLoca=?, enderecoLoca=?
                        WHERE cpfLoca=?";
                $stmt = $pdo->prepare($sql);
                $stmt->bindValue(1, $alterarLocatario->getNomeLoca());
                $stmt->bindValue(2, $alterarLocatario->getEnderecoLoca());
                $stmt->bindValue(3, $alterarLocatario->getCpfLoca());
                $stmt->execute();
                return $stmt->rowCount();
            } catch (PDOException $ex) {
                echo $ex->getMessage();
            }
        }

        public function excluirLocatario($cpfLoca) {
            try {
                $pdo = Conexao::criarConexao();
                $sql = "DELETE FROM locatario 
                        WHERE cpfLoca = :cpfLoca";
                $stmt = $pdo->prepare($sql);
                $stmt->bindValue(':cpfLoca', $cpfLoca);
                $stmt->execute();
                return true;
            } catch (PDOException $ex) {
                echo $ex->getMessage();
            }
        }

      
        // Emprestimos

        public function addEmprestimos(Emprestimos $addEmprestimos) {
            try {
                $pdo = Conexao::criarConexao();
                $devolucao_date = date('Y-m-d', strtotime($addEmprestimos->getDevolucao_str())); // pega a data do input DD/MM/YYYY e tranforma em um dado aceito pelo sql, YYY-MM-DD

                $sql = "INSERT INTO emprestimos (nomeItem, proprietarioItem, nomeLoca, devolucao) 
                        SELECT ?, proprietarioItem, ?, ? 
                        FROM item 
                        WHERE nomeItem = ?";
                $stmt = $pdo->prepare($sql);
                $stmt->bindValue(1, $addEmprestimos->getNomeItem());
                $stmt->bindValue(2, $addEmprestimos->getNomeLoca());
                $stmt->bindValue(3, $devolucao_date);
                $stmt->bindValue(4, $addEmprestimos->getNomeItem());
                $stmt->execute();
                return true;
            } catch (PDOException $ex) {
                echo $ex->getMessage();
            }
        }
        

        public function atrasados() {
            try {
                $pdo = Conexao::criarConexao();
                $sql = "SELECT * FROM emprestimos WHERE devolucao < CURDATE()"; // vai selecionar as datas que forem menores que a data atual
                $stmt = $pdo->prepare($sql);
                $stmt->execute();
                $emprestimos = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $emprestimos;
            } catch (PDOException $ex) {
                echo $ex->getMessage();
            }
        }

        public function encontrarAtrasados($idEmprestimos){
            try {
                $Atrasados = new Emprestimos();
                $pdo = Conexao::criarConexao();
                $sql = "SELECT *
                        FROM emprestimos
                        WHERE idEmprestimos =:idAtrasados 
                        LIMIT 1";
                $stmt = $pdo->prepare($sql);
                $stmt->bindValue(':idAtrasados', $idEmprestimos);
                $stmt->execute();

                $emprestimosAssoc = $stmt->fetch(PDO::FETCH_ASSOC);
                $Atrasados->setIdEmprestimos($emprestimosAssoc['idEmprestimos']);
                $Atrasados->setNomeItem($emprestimosAssoc['nomeItem']);
                $Atrasados->setNomeLoca($emprestimosAssoc['nomeLoca']);
                $Atrasados->setDevolucao_str($emprestimosAssoc['devolucao']);
                
                return $Atrasados;
            } catch (PDOException $ex) {
                echo $ex->getMessage();
            }
        }

        public function alterarAtrasados(Emprestimos $alterarAtrasados) {
            try {
                $pdo = Conexao::criarConexao();
                $devolucao_date = date('Y-m-d', strtotime($alterarAtrasados->getDevolucao_str())); 
                $sql = "UPDATE emprestimos 
                        SET nomeItem = ?, proprietarioItem = (SELECT proprietarioItem FROM item WHERE nomeItem = ?), nomeLoca = ?, devolucao = ?
                        WHERE idEmprestimos = ?";
                $stmt = $pdo->prepare($sql);
                $stmt->bindValue(1, $alterarAtrasados->getNomeItem());
                $stmt->bindValue(2, $alterarAtrasados->getNomeItem());
                $stmt->bindValue(3, $alterarAtrasados->getNomeLoca());
                $stmt->bindValue(4, $devolucao_date);
                $stmt->bindValue(5, $alterarAtrasados->getIdEmprestimos());
                $stmt->execute();
                return $stmt->rowCount();
            } catch (PDOException $ex) {
                echo $ex->getMessage();
            }
        }

        public function excluirAtrasados($idAtrasados) {
            try {
                $pdo = Conexao::criarConexao();
                $sql = "DELETE FROM emprestimos 
                        WHERE idEmprestimos = :idAtrasados";
                $stmt = $pdo->prepare($sql);
                $stmt->bindValue(':idAtrasados', $idAtrasados);
                $stmt->execute();
                return true;
            } catch (PDOException $ex) {
                echo $ex->getMessage();
            }
        }



    }

?>