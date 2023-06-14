<?php

class Item {
    private $idItem;
    private $nomeItem;
    private $proprietarioItem;

    public function inserirDados($nomeItem, $proprietarioItem) {
        $this->nomeItem = $nomeItem;
        $this->proprietarioItem = $proprietarioItem;
    }

    public function getIdItem() {
        return $this->idItem;
    }

    public function setIdItem($idItem) {
        $this->idItem = $idItem;
    }

    public function getNomeItem() {
        return $this->nomeItem;
    }

    public function setNomeItem($nomeItem) {
        $this->nomeItem = $nomeItem;
    }

    public function getProprietarioItem() {
        return $this->proprietarioItem;
    }

    public function setProprietarioItem($proprietarioItem) {
        $this->proprietarioItem = $proprietarioItem;
    }
}

?>