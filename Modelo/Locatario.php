<?php
    class Locatario {
    private $cpfLoca;
    private $nomeLoca;
    private $enderecoLoca;

    public function inserirDados($cpfLoca, $nomeLoca, $enderecoLoca) {
        $this->cpfLoca = $cpfLoca;
        $this->nomeLoca = $nomeLoca;
        $this->enderecoLoca = $enderecoLoca;
    }

    public function getCpfLoca() {
        return $this->cpfLoca;
    }

    public function setCpfLoca($cpfLoca) {
        $this->cpfLoca = $cpfLoca;
    }

    public function getNomeLoca() {
        return $this->nomeLoca;
    }

    public function setNomeLoca($nomeLoca) {
        $this->nomeLoca = $nomeLoca;
    }

    public function getEnderecoLoca() {
        return $this->enderecoLoca;
    }

    public function setEnderecoLoca($enderecoLoca) {
        $this->enderecoLoca = $enderecoLoca;
    }
}


?>