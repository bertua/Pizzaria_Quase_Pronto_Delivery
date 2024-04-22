<?php
class Pedido{
    private $total = 0;
    private $taxaEntrega;
    private $dataHoraPedido;
    private $cliente;
    private $itemDoPedido = [];

    public function getTotal() {
        return $this->total;
    }

    public function addTotal($total) {
        $this->total += $total;
    }

    public function getTaxaEntrega() {
        return $this->taxaEntrega;
    }

    public function setTaxaEntrega($bairro) {
        if($bairro === "centro"){
            return 10;
        }
        elseif($bairro === "periferia"){
            return 15;
        }
        else{
            return 20;
        }
    }

    public function getDataHoraPedido() {
        return $this->dataHoraPedido;
    }

    public function setDataHoraPedido($dataHoraPedido) {
        $this->dataHoraPedido = $dataHoraPedido;
    }

    public function addItemDoPedido($itensDoPedido) {
        $this->itemDoPedido[] = $itensDoPedido;
    }

    public function imprimir(){}
}