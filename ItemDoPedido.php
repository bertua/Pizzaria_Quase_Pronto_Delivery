<?php
abstract class ItemDoPedido{
    protected $tipo;
    protected $sabor;
    
    public function getTipo(){
        return $this->tipo;
    }

    public function setTipo($tipo){
        $this->tipo = $tipo;
    }

    public function getSabor(){
        return $this->sabor;
    }

    public function setSabor($sabor){
        $this->sabor = $sabor;
    }

    public function getValor(){
        if($this->tipo === "especial"){
            return 50;
        } elseif ($this->tipo === "tradicional"){
            return 40;
        }
    }

}