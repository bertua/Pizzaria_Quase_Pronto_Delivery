<?php
date_default_timezone_set('America/Sao_Paulo');

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
        $pedido->setDataHoraPedido(time());

        while(true){
            $item = readline("Qual item:\n1.pizza\n2.batata\n3.cerveja\n4.refrigerante\n");
            switch($item){
                case "pizza":
                    $pizza= new Pizza();
                    $pizza->setSabor(readline("Informe o sabor de pizza: "));
                    $pizza->setTamanho(readline("Informe o tamanho da pizza: "));
                    $pizza->setBorda(readline("Informe o sabor da borda: "));


                case "batata":
                case "cerveja":
                case "refrigerante":
            }
            $itemDoPedido = new ItemDoPedido();


            $pedido->addItemDoPedido($itemDoPedido);

            $pedido->addTotal($itemDoPedido->getValor());

            $faturamento->addQtdPizzas();

            $continuar = readline("mais alguma coisa?");
            if($continuar === ""){
                break;
            }
        }

        $cliente = new Cliente();
        $cliente->setNome(readline("Cliente: "));
        $cliente->setContato(readline("Contato: "));
        $pedido->setCliente($cliente);

        $endereco = new Endereco();
        $endereco->setRua(readline("Rua: "));
        $endereco->setBairro(readline("Bairro: "));
        $endereco->setCidade(readline("Cidade: "));
        echo "\n";
        $pedido->setEndereco($endereco);

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
        echo "Qual pedido: ";
        $p = readline();
        $faturamento->imprimirCabecalho();
        $faturamento->imprimirPedido($p);
    }
}
