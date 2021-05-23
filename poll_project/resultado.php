<?php
    $resultados = file("resultado.txt");
    $contagens = [0, 0, 0, 0, 0];
    for($i = 0;$i < count($resultados);$i++){
        if($resultados[$i] == "adalovelace"."\n"){
            $contagens[0]++;
        }
        if($resultados[$i] == "edsgerdijkstra"."\n"){
            $contagens[1]++;
        }
        if($resultados[$i] == "gracemurrayhopper"."\n"){
            $contagens[2]++;
        }
        if($resultados[$i] == "timbernerslee"."\n"){
            $contagens[3]++;
        }
        if($resultados[$i] == "branco"."\n"){
            $contagens[4]++;
        }
    }

    $porcentagens = [0, 0, 0, 0, 0];
    for($i = 0;$i < count($porcentagens);$i++){
        if($contagens[$i] == 0){
            $porcentagens[$i] = 0;
        }else{
            $porcentagens[$i] = round($contagens[$i]/count($resultados)*100)."%";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/table.css">
    <title>Resultados</title>
</head>
<body>
    <table>
        <tr>
            <th></th>
            <th>Ada Lovelace</th>
            <th>Edsger Djikstra</th>
            <th>Grace Murray Hopper</th>
            <th>Tim Berners-Lee</th>
            <th>Brancos</th>
        </tr>
        <tr>
            <td>Total de Votos</td>
            <td><?php echo $contagens[0]?></td>
            <td><?php echo $contagens[1]?></td>
            <td><?php echo $contagens[2]?></td>
            <td><?php echo $contagens[3]?></td>
            <td><?php echo $contagens[4]?></td>
        </tr>
        <tr>
            <td>%</td>
            <td><?php echo $porcentagens[0]?></td>
            <td><?php echo $porcentagens[1]?></td>
            <td><?php echo $porcentagens[2]?></td>
            <td><?php echo $porcentagens[3]?></td>
            <td><?php echo $porcentagens[4]?></td>
        </tr>
        <tr>
            <td>Colocação</td>
            <?php
                arsort($contagens);
                $array = ['Primeiro', 'Segundo', 'Terceiro', 'Quarto', 'Quinto'];
                $i = 0;
                foreach($contagens as $key => $value){
                    $new[$array[$i]] = $key;
                    $i++;
                }
                $i = 0;
                foreach($new as $key => $value){
                    $ind = array_search($i, $new);
                    echo "<td>{$ind}</td>";
                    $i++;
                }
            ?>
        </tr>
    </table>
</body>
</html>