<?php
   class Emprestimos {
    private $idEmprestimos;
    private $nomeItem;
    private $nomeLoca;
    private $devolucao_str;

    public function inserirDados($nomeItem, $nomeLoca, $devolucao_str) {
        $this->nomeItem = $nomeItem;
        $this->nomeLoca = $nomeLoca;
        $this->devolucao_str = $devolucao_str;
    }

    function getIdEmprestimos() {
        return $this->idEmprestimos;
    }

    function getNomeLoca() {
        return $this->nomeLoca;
    }

    function getNomeItem() {
        return $this->nomeItem;
    }

    function getDevolucao_str() {
        return $this->devolucao_str;
    }

    function setIdEmprestimos($idEmprestimos) {
        $this->idEmprestimos = $idEmprestimos;
    }

    function setNomeLoca($nomeLoca) {
        $this->nomeLoca = $nomeLoca;
    }

    function setNomeItem($nomeItem) {
        $this->nomeItem = $nomeItem;
    }

    function setDevolucao_str($devolucao_str) {
        $this->devolucao_str = $devolucao_str;
    }
}


?>