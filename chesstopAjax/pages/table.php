<?php
    session_start();
    include('../php/connection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/table.css">
    <link rel="stylesheet" href="../css/format.css">
    <title>Table</title>
</head>
<body>
<header>
        <div>
            <img src="../assets/logo.png">
        </div>
        <div>
            <ul>
                <li><a href="../index.php">Home</a></li>
                <li><a href="table.php">Tabela</a></li>
                <?php
                    if (isset($_SESSION["logged"])){
                        echo "<li class='special'><a href='../php/signout.php'>Sair</a></li>";
                    }else{
                        echo "<li class='special'><a href='login.php'>Entrar</a></li>";
                    }
                ?>
            </ul>
        </div>
</header>
<div id="main">
    <div>
        <?php 
        if(isset($_SESSION['logged'])){echo "<a href='insertTable.php'>Adicionar um novo registro</a>";}
        else{echo "<a href='login.php'>Faça login para alterar a tabela</a>";}
        ?>
        <table id="chessplayers">
            <script src="../ajax.js"></script>
        </table>
    </div>
</div>
</body>
</html>