<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <title>Login votação</title>
</head>
<body>
    <div class="formDiv">
        <?php
            if(isset($_SESSION['errorToLogin'])){
                echo "<div class='err'><h2> Login inválido, tente novamente</h2></div>";
            }
            unset($_SESSION['errorToLogin']);
        ?>
        <h1>Login</h1>
        <form action="login.php" method="POST" autocomplete="off">
            <label>Nome</label><br>
            <input type="text" name="login" class="textInput" required><br>
            <label>E-mail</label><br>
            <input type="email" name="email" class="emailInput" required>
            <label>Senha</label><br>
            <input type="password" name="pass" class="passInput" required>
            <div class="button">
            <input type="submit" name="submit" value="Enviar">
            </div>
        </form>
    </div>
</body>
</html>