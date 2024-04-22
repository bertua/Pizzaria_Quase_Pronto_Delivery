<?php

include "Pizza.php";
include "Refrigerante.php";
include "Batatinha.php";
include "Cerveja.php";
include "Faturamento.php";
include "Avalicao.php";
include "Cliente.php";
include "Endereco.php";
include "ItemDoPedido.php";
include "Pedido.php";



$faturamento = new Faturamento();

/*
$pizza = new Pizza();
$batatinha = new Batatinha();
$cerveja = new Cerveja();
$refrigerante = new Refrigerante();
$avaliacao = new Avaliacao();
*/

echo "Bem vindo a pizzaria!";

while(true){
    $menu = readline(
        "Selecione:<br>
        1.Pedido<br>
        2.Imprimir histórico<br>
        3.Imprimir pedido<br>
        #.Sair<br>");

    if($menu === "#"){
        break;
    }
    else if($menu === "1"){
        $pedido = new Pedido();
        $cliente = new Cliente();
        $endereco = new Endereco();

        while(true){
            $itemDoPedido = new ItemDoPedido();

            $itemDoPedido->setTipo(readline("Informe o tipo de pizza: "));
            $itemDoPedido->setSabor(readline("Informe o sabor de pizza: "));

            $pedido->addItemDoPedido($itemDoPedido);

            $pedido->addTotal($itemDoPedido->getValor());

            $faturamento->addQtdPizzas();

            $continuar = readline("mais alguma coisa?");
            if($continuar === ""){
                break;
            }
        }

        $cliente->setNome(readline("Cliente: "));
        $cliente->setContato(readline("Contato: "));
        $endereco->setBairro(readline("Bairro: "));
        $endereco->setRua(readline("Rua: "));
        $endereco->setRua(readline("Cidade: "));

        $pedido->setTaxaEntrega($endereco->getBairro());
        $pedido->addTotal($pedido->getTaxaEntrega());

        $faturamento->addPedido($pedido);
        $faturamento->addTotalMotoboy($pedido->getTaxaEntrega());
        $faturamento->addTotalGeral($pedido->getTotal());
        $faturamento->setTotalLiquido();

    }
    else if($menu === "2"){
       // $faturamento->imprimirCabecalho();
        //$faturamento->imprimirRelatorio();
    }
    else if($menu === "3"){

    }
}