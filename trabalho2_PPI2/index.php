<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/index.css">
</head>
<body>
    <div>
        <h1>Cadastro de pedido</h1> 
        <form action="ingestData.php" enctype="multipart/form-data" method="post">
            <label>Insira seu nome</label><br>
            <input type="text" name="nome"><br>
            <label>Insira o nome do produto</label><br>
            <input type="text" name="produto"><br>
            <label>Escolha o método de pagamento</label><br>
            <select name="paymentOptions">
                <option value="cartao">Cartão</option>
                <option value="dinheiro">Dinheiro</option>
                <option value="boleto">Boleto</option>
                <option value="none" selected>Nenhum</option>
            </select><br>
            <label>Escolha uma foto</label><br>
            <input type="file" name="arquivo"><br>
           <div> 
                <input type="submit" value= "Enviar">
            </div>
        </form>
    </div>
</body>
</html>