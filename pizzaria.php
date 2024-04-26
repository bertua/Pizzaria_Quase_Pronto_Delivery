<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <pre><?php print_r($_POST)?></pre>
    <?php if(isset($_POST['itemDoPedido']['cerveja'])){
        echo "Pediu cerveja";
    }?>
</body>
</html>