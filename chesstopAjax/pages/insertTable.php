<?php
    session_start();
    if(!isset($_SESSION['logged'])){
        header("Location: table.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/login.css">
    <link rel="stylesheet" href="../css/insertTable.css">
    <title>Insert</title>
</head>
<body>
    <header>
        <a href="../index.php"><img src="../assets/home.webp"></a>
    </header>
    <div id="main">
        <form>
            <?php
                if(isset($_SESSION["insertingError"])){
                    echo "<div class='loginError'>{$_SESSION['insertingError']}</div>";
                    unset($_SESSION["insertingError"]);
                }else{
                    echo "<h1>Insert into table</h1>";
                }
            ?>
            <input type="text" name="name" id="name" placeholder="Digite o nome do jogador" autocomplete="off"><br>
            <input type="text" name="title" id="title" placeholder="Digite o título (GM, IM, FM, ...)" autocomplete="off"><br>
            <input type="text" name="rating" id="rating" placeholder="Digite o rating fide" autocomplete="off"><br>
        </form>
        <div class="positioningTheButton"><button onclick="insertNewRecord();">Enviar</button></div>
        
    </div>
    <script src="../ajax.js"></script>
</body>
</html>