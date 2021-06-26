<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/format.css">
    <title>Chesstop</title>
</head>
<body>
    <header>
        <div>
            <img src="assets/logo.png">
        </div>
        <div>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="pages/table.php">Tabela</a></li>
                <?php
                    if (isset($_SESSION["logged"])){
                        echo "<li class='special'><a href='php/signout.php'>Sair</a></li>";
                    }else{
                        echo "<li class='special'><a href='pages/login.php'>Entrar</a></li>";
                    }
                ?>
            </ul>
        </div>
    </header>
    <div id="main">
        <div>
            <?php
                date_default_timezone_set('America/Sao_Paulo');
                if (isset($_SESSION["logged"])){
                    if(date('H') >= 20 || date('H') < 5){
                        $msg = "Boa noite!";
                        $tim = 2;
                    }else if(date('H') >= 12 && date('H') < 20){
                        $msg = "Boa tarde!";
                        $tim = 1;
                    }else if(date('H') >= 5 && date('H') < 12){
                        $msg = "Bom dia!";
                        $tim = 0;
                    }else{
                        $msg = "Chess top";
                    }
                    echo "<h1>$msg</h1>";
                }else{
                    echo "<h1>Aviso!</h1>";
                }
            ?>
        
            <?php
                if (isset($_SESSION["logged"])){
                    if($tim == 0){
                        echo "<img src='assets/morning.jpg'>";
                    }else if($tim == 1){
                        echo "<img src='assets/afternoon.jpg'>";
                    }else if($tim == 2){
                        echo "<img src='assets/night.jpg'>";
                    }else{
                        echo "<img src='assets/logged.png'>";
                    }
                    echo "<p>{$_SESSION['name']}, <a href='pages/table.php'>confira</a> os melhores jogadores de xadrez da atualidade</p>";
                }else{
                    echo "<img src='assets/unlogged.jpeg'>";
                    echo "<p><a href='pages/register.php'>Cadastre-se</a> ou <a href='pages/login.php'>entre</a> em uma conta existente</strong></p>";
                }
            ?>
        </div>
    </div>
    <footer></footer>
</body>
</html>