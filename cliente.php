<?php
class Cliente{
    private $nome;
    private $contato;

    public function getNome(){
        return $this->nome;
    }

    public function setNome($nome){
        $this->nome = $nome;
    }

    public function getcontato(){
        return $this->contato;
    }

    public function setcontato($contato){
        $this->contato = $contato;
    }
}