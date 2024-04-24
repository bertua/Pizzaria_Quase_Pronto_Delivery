<?php
class Pizza extends ItemDoPedido{
    protected $tamanho;
    protected $sabor;
    protected $borda;

    public function getTamanho(){
        return $this->tamanho;
    }

    public function setTamanho($tamanho){
        $this->tamanho = $tamanho;
    }

    public function getSabor(){
        return $this->sabor;
    }

    public function setSabor($sabor){
        $this->sabor = $sabor;
    }

    public function getborda(){
        return $this->borda;
    }

    public function setborda($borda){
        $this->borda = $borda;
    }

    if(empty($this->borda)){}

    public function getValor(){
        if($this->tamanho === "grande"){
            if(empty($this->borda)){
                return 50;
            } else {
                return 55;
            }
        } elseif ($this->tamanho === "media"){
            if(empty($this->borda)){
                return 40;
            } else{
                return 45;
            }
        }
    }
}