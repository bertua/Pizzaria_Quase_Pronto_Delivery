<?php
class Pedido{
    private $total;
    private $taxaEntrega;
    private $dataHoraPedido;

    private $cliente;
    private $itensDoPedido;

    public function getTotal() {
        return $this->total;
    }

    public function addTotal($total) {
        $this->total += $total;
    }

    public function getTaxaEntrega() {
        return $this->taxaEntrega;
    }

    public function setTaxaEntrega($taxaEntrega) {
        $this->taxaEntrega = $taxaEntrega;
    }

    public function getDataHoraPedido() {
        return $this->dataHoraPedido;
    }

    public function setDataHoraPedido($dataHoraPedido) {
        $this->dataHoraPedido = $dataHoraPedido;
    }

    public function imprimir(){}
}