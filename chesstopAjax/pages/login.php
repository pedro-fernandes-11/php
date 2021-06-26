<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/login.css">
    <title>Login</title>
</head>
<body>
    <header>
        <a href="../index.php"><img src="../assets/home.webp"></a>
    </header>
    <div id="main">
        <form action="../php/signin.php" method="post">
            <?php
                if(isset($_SESSION["loginError"])){
                    echo "<div class='loginError'>{$_SESSION['loginError']}</div>";
                    unset($_SESSION["loginError"]);
                }else{
                    echo "<h1>Login</h1>";
                }
            ?>
            <input type="text" name="name" placeholder="Digite seu nome" required autocomplete="off"><br>
            <input type="email" name="email" placeholder="Digite seu email" required autocomplete="off"><br>
            <input type="password" name="pass" placeholder="Digite uma senha forte" required><br>
            <input type="submit" name="submit">
        </form>
    </div>
</body>
</html>