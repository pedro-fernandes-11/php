<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/table.css"> 
</head>
<body>
    <table>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Produto</th>
            <th>Pagamento</th>
            <th>Imagem</th>
        </tr>
        <?php
            $i = 0;
            $arrayData = file("dados.txt");
            while($i < count($arrayData)){
                $arrayRow = explode(";", $arrayData[$i]);
                $f = 0;

                echo "<tr>";
                for($f = 0;$f < 5;$f++){
                    if($f == 4){
                        echo "<td><img src='imagem/{$arrayRow[$f]}'></td>";
                    }else{
                        echo "<td>{$arrayRow[$f]}</td>";
                    }
                }
                echo "</tr>";
                $i++;
            }
        ?>
    </table>
</body>
</html>