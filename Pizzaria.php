<?php

include "Faturamento.php";
include "Cliente.php";
include "Endereco.php";
include "Pedido.php";
include "ItemDoPedido.php";
include "Pizza.php";
include "Refrigerante.php";
include "Batatinha.php";
include "Cerveja.php";
include "Avaliacao.php";



$faturamento = new Faturamento();

/*
$pizza = new Pizza();
$batatinha = new Batatinha();
$cerveja = new Cerveja();
$refrigerante = new Refrigerante();
$avaliacao = new Avaliacao();
*/

echo "Bem vindo a pizzaria!\n";

while(true){
    echo "Selecione:\n";
    echo "1.Pedido\n";
    echo "2.Imprimir histórico\n";
    echo "3.Imprimir pedido\n";
    echo "#.Sair\n";
    $menu = readline();

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
        $pedido->setCliente($cliente);
        $endereco->setBairro(readline("Bairro: "));
        $endereco->setRua(readline("Rua: "));
        $endereco->setRua(readline("Cidade: "));
        $pedido->setDataHoraPedido();

        $pedido->setTaxaEntrega($endereco->getBairro());
        $pedido->addTotal($pedido->getTaxaEntrega());

        $faturamento->addPedido($pedido);
        $faturamento->addTotalMotoboy($pedido->getTaxaEntrega());
        $faturamento->addTotalGeral($pedido->getTotal());
        $faturamento->setTotalLiquido();

    }
    else if($menu === "2"){
        $faturamento->imprimirCabecalho();
        $faturamento->imprimirRelatorio();
    }
    else if($menu === "3"){
        echo "Qual pedido: \n";
        $pedido = readline();
        $faturamento->imprimirCabecalho();
        $faturamento->imprimirPedido($pedido);
    }
}
