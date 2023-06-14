<?php

require_once '../Modelo/Emprestimos.php';
require_once '../Modelo/Item.php';
require_once '../Modelo/Locatario.php';
require_once '../Modelo/DAO/BugigangaDAO.php';

// ITEM
$idItem = @$_POST['idItem']; // usado na alteração               variáveis Criadas para receber as infomações dos formularios
$nomeItem = @$_POST['nomeItem'];
$proprietarioItem = @$_POST['proprietarioItem'];

// LOCATARIO
$cpfLoca = @$_POST['cpfLoca']; // usado na alteração
$nomeLoca = @$_POST['nomeLoca'];
$enderecoLoca = @$_POST['enderecoLoca'];

// EMPRESTIMOS
$idEmprestimos = @$_POST['atrasados']; // usado na alteração
$nomeItem = @$_POST['nomeItem'];
$nomeLoca = @$_POST['nomeLoca'];
$devolucao_str = @$_POST['devolucao_str'];


$acao = @$_GET['ACAO']; // recebe uma informação pela url e baseada nisso toma as seguintes decisões

//criação de obejtos
$itens = new Item();
$emprestimos = new Emprestimos();
$locatarios = new Locatario();

// métodos para inserir as informações dos formularios dentro dos objetos
$itens->inserirDados($nomeItem, $proprietarioItem);
$itens->setIdItem($idItem); // usado na hora da alteração 
$emprestimos->inserirDados($nomeItem, $nomeLoca, $devolucao_str);
$emprestimos->setIdEmprestimos($idEmprestimos); // usado na hora da alteração 
$locatarios->inserirDados($cpfLoca, $nomeLoca, $enderecoLoca);
$locatarios->setCpfLoca($cpfLoca); // usado na hora da alteração 

$bugigangasDAO = new BugigangaDAO();

switch ($acao) {
    case 'cadItem':
        $item = $bugigangasDAO->addItem($itens);
        if ($item >= 1) {
            header('Location:../Cadastros.php?Cadastros=Itens&MSG=Cadastro Efetuado com Sucesso!!!'); // envia enformações para o destino como, qual pasta carregar e a mensagem de sucesso ou erro
        } else {
            header('Location:../Cadastros.php?Cadastros=Itens&MSG=Erro ao Efetuar Cadastro!!!');
        }
        break;
    case 'excluirItem':
        if (isset($_GET['idex'])) { // chega se a url tem o idex
            $idItem = $_GET['idex']; // muda o valor da variavel para o valor que estiver na url
            $bugigangasDAO = new BugigangaDAO();
            $item = $bugigangasDAO->excluirItem($idItem);
        if ($item == TRUE) {
            header('Location:../Listas.php?Listas=Itens&MSG=Excluido com Sucesso!!!');
        } else {
            header('Location:../Listas.php?Listas=Itens&MSG=Erro ao excluir dado!!!');
        }
        }
        break;
    case 'alterarItem':
        $item = $bugigangasDAO->alterarItem($itens);
        if ($itens == 1) {
            header('Location:../Listas.php?Listas=Itens&MSG=Alterado com Sucesso!!!');
        } else {
            header('Location:../Listas.php?Listas=Itens&MSG=Erro na Alteração!!!');
        }
        break;
    case 'Emprestimo':
        $emprestimo = $bugigangasDAO->addEmprestimos($emprestimos);
        if ($emprestimo >= 1) {
            header('Location:../Cadastros.php?Cadastros=Emprestimos&MSG=Cadastro Efetuado com Sucesso');
        } else {
            header('Location:../Cadastros.php?Cadastros=Emprestimos&MSG=Erro ao Efetuar Cadastro!!!');
        }
        break;
    case 'excluirAtrasados':
        if (isset($_GET['idex'])) {
            $idEmprestimos = $_GET['idex'];
            $bugigangasDAO = new BugigangaDAO();
            $emprestimo = $bugigangasDAO->excluirAtrasados($idEmprestimos);
        if ($emprestimo == TRUE) {
            header('Location:../Listas.php?Listas=Atrasados&MSG=Excluido com Sucesso!!!');
        } else {
            header('Location:../Listas.php?Listas=Atrasados&MSG=Erro ao excluir dado!!!');
        }
        }
        break;
    case 'alterarAtrasados':
        $emprestimo = $bugigangasDAO->alterarAtrasados($emprestimos);
        if ($emprestimo == 1) {
            header('Location:../Listas.php?Listas=Atrasados&MSG=Alterado com Sucesso!!!');
        } else {
            header('Location:../Listas.php?Listas=Atrasados&MSG=Erro na Alteração!!!');
        }
        break;
    case 'addLocatario':
        $locatario = $bugigangasDAO->addLocatario($locatarios);
        if ($locatario >= 1) {
            header('Location:../Cadastros.php?Cadastros=Locatarios&MSG=Cadastro Efetuado com Sucesso');
        } else {
            header('Location:../Cadastros.php?Cadastros=Locatarios&MSG=Erro ao Efetuar Cadastro!!!');
        }
        break;
    case 'excluirLocatario':
        if (isset($_GET['idex'])) {
            $cpfLoca = $_GET['idex'];
            $bugigangasDAO = new BugigangaDAO();
            $locatario = $bugigangasDAO->excluirLocatario($cpfLoca);
        if ($locatario == TRUE) {
            header('Location:../Listas.php?Listas=Locatarios&MSG=Excluido com Sucesso!!!');
        } else {
            header('Location:../Listas.php?Listas=Locatarios&MSG=Erro ao excluir dado!!!');
        }
        }
        break;
    case 'alterarLocatario':
        $locatario = $bugigangasDAO->alterarLocatario($locatarios);
        if ($locatario == 1) {
            header('Location:../Listas.php?Listas=Locatarios&MSG=Alterado com Sucesso!!!');
        } else {
            header('Location:../Listas.php?Listas=Locatarios&MSG=Erro na Alteração!!!');
        }
        break;
    default:
        break;
}
?>
