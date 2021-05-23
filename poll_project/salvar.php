<?php
session_start();
if(isset($_COOKIE[$_SESSION['userName']])){
    $votou = false;
}else{
    $arrayData = file("resultado.txt");
    array_push($arrayData, array_search("on", $_GET)."\n");
    file_put_contents("resultado.txt", $arrayData);
    $votou = true;
    setcookie($_SESSION['userName'], true, time()+18000);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/votacao.css">
    <title>Computando votos</title>
</head>
<body>
    <header>
        <?php
            if($votou){
                echo "<p>Voto computado para usuário {$_SESSION['userName']}.</p>";
            }else{
                echo "<p>Voto inválido. Não é possível votar duas vezes.</p>";
            }
        ?>
        <a href="resultado.php">Mostrar resultados</a>
    </header>
</body>
</html>