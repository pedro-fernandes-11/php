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
        <form action="../php/addRecord.php" enctype="multipart/form-data" method="post">
            <?php
                if(isset($_SESSION["insertingError"])){
                    echo "<div class='loginError'>{$_SESSION['insertingError']}</div>";
                    unset($_SESSION["insertingError"]);
                }else{
                    echo "<h1>Insert into table</h1>";
                }
            ?>
            <input type="text" name="name" placeholder="Digite o nome do jogador" required autocomplete="off"><br>
            <input type="text" name="title" placeholder="Digite o título (GM, IM, FM, ...)" required autocomplete="off"><br>
            <input type="text" name="rating" placeholder="Digite o rating fide" required autocomplete="off"><br>
            <div>
                <label>Insira uma imagem</label>
                <input type="file" name="img" required class="imageInput"><br>
            </div>
            <input type="submit" name="submit">
        </form>
    </div>
</body>
</html>