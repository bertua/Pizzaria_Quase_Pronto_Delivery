<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <?php 
        include "Faturamento.php";
        include "Cliente.php";
        include "Endereco.php";
        include "Pedido.php";
        include "ItemDoPedido.php";
        include "Pizza.php";
        include "Batatinha.php";
        include "Cerveja.php";
        include "Refrigerante.php";

        $tamanhoPizza = $_POST['tpizza'];
        $saborPizza = $_POST['spizza'];
        $bordaPizza = $_POST['borda'];
        $tamanhoBatata = $_POST['tbatatinha'];
        $tipoCerveja = $_POST['ctipo'];
        $tamanhoCerveja = $_POST['ctamanho'];
        $tamanhoRefri = $_POST['rtamanho'];
        $saborRefri = $_POST['rsabor'];
        $nome = $_POST['nome'];
        $contato = $_POST['contato'];
        $rua = $_POST['rua'];
        $bairro = $_POST['bairro'];
        $cidade = $_POST['cidade'];

        $faturamento = new Faturamento();

        $endereco = new Endereco();
        $endereco->setRua($rua);
        $endereco->setBairro($bairro);
        $endereco->setCidade($cidade);

        $cliente = new Cliente();
        $cliente->setNome($nome);
        $cliente->setContato($contato);

        $pedido = new Pedido();
        $pedido->setDataHoraPedido(time());
        $pedido->setCliente($cliente);
        $pedido->setEndereco($endereco);
        if(isset($_POST['itemDoPedido']['pizza'])){
            $pizza = new Pizza();
            $pizza->setTamanho($tamanhoPizza);
            $pizza->setSabor($saborPizza);
            $pizza->setBorda($bordaPizza);
            $pedido->addItemDoPedido($pizza);
            $pedido->addTotal($pizza->getValor());
            $faturamento->addQtdPizzas();
            $faturamento->addPedido($pedido);
        }
        if(isset($_POST['itemDoPedido']['batatinha'])){
            $batatinha = new Batatinha();
            $batatinha->setTamanho($tamanhoBatata);
            $pedido->addItemDoPedido($batatinha);
            $pedido->addTotal($batatinha->getValor());
            $faturamento->addQtdBatatinhas();
            $faturamento->addPedido($pedido);
        }

        if(isset($_POST['itemDoPedido']['cerveja'])){
            $cerveja = new Cerveja();
            $cerveja->setTamanho($tamanhoCerveja);
            $cerveja->setTipo($tipoCerveja);
            $pedido->addItemDoPedido($cerveja);
            $pedido->addTotal($cerveja->getValor());
            $faturamento->addQtdCerveja();
            $faturamento->addPedido($pedido);
        }

        if(isset($_POST['itemDoPedido']['refrigerante'])){
            $refrigerante = new Refrigerante();
            $refrigerante->setTamanho($tamanhoRefri);
            $refrigerante->setTipo($saborRefri);
            $pedido->addItemDoPedido($refrigerante);
            $pedido->addTotal($refrigerante->getvalor());
            $faturamento->addQtdRefrigerante();
            $faturamento->addPedido($pedido);
        }
        $pedido->setTaxaEntrega($endereco->getBairro());
        $pedido->addTotal($pedido->getTaxaEntrega());
        $faturamento->addTotalMotoboy($pedido->getTaxaEntrega());
        $faturamento->addTotalGeral($pedido->getTotal());
        $faturamento->setTotalLiquido();
        
        echo $faturamento->imprimirRelatorio();

    ?>

</body>
</html>
