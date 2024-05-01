<?php
class Pedido{
    private $total = 0;
    private $taxaEntrega = 0;
    private $dataHoraPedido;
    private $cliente;
    private $endereco;
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
            $this->taxaEntrega = 10;
        }
        elseif($bairro === "periferia"){
            $this->taxaEntrega = 15;
        }
        else{
            $this->taxaEntrega = 20;
        }
    }

    public function setCliente($cliente) {
        $this->cliente = $cliente;
    }

    public function setEndereco($endereco) {
        $this->endereco = $endereco;
    }

    public function getDataHoraPedido() {
        return $this->dataHoraPedido;
    }

    public function setDataHoraPedido($hora) {
        $this->dataHoraPedido = $hora;
    }

    public function addItemDoPedido($itensDoPedido) {
        $this->itemDoPedido[] = $itensDoPedido;
    }

    public function imprimir($n){
        echo "Pedido nº: $n <br>";
        echo $this->formatar("Cliente", $this->cliente->getNome())."<br>";
        echo $this->formatar("Contato", $this->cliente->getContato())."<br>";
        echo $this->formatar("Rua", $this->endereco->getRua())."<br>";
        echo $this->formatar("Bairro", $this->endereco->getBairro())."<br>";
        echo $this->formatar("Cidade", $this->endereco->getCidade())."<br>";
        echo "----------------------------------------<br>";
        for($i = 0; $i < count($this->itemDoPedido); $i++){
            echo $this->formatar("", $this->itemDoPedido[$i]->getTipo()." ".$this->itemDoPedido[$i]->getTamanho()." ".$this->itemDoPedido[$i]->getSabor()." ".strval($this->itemDoPedido[$i]->getValor()))."<br>";
        }

        echo "----------------------------------------<br>";
        echo $this->formatar("Tx. Entrega", $this->taxaEntrega)."<br>";
        echo $this->formatar("Total", $this->total)."<br>";
        echo $this->formatar("", date("H:i:s d-m-Y", $this->getDataHoraPedido()))."<br>";
        echo "----------------------------------------<br>";
        echo "----------------------------------------<br>";
    }

    public function formatar($titulo, $valor) {
       $divisoria = "----------------------------------------";
       $finalDiv = strlen($divisoria);
       $finalValor = strlen($titulo) + strlen($valor);
       while($finalDiv !== $finalValor && strlen($valor) < strlen($divisoria)){
        $valor = " " . $valor;
        $finalValor = strlen($titulo) + strlen($valor);
       }
       return $titulo . $valor;
    }
}

