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
    <title>Login</title>
</head>
<body id="bodylogin">
    <a href="index.php"><img src="assets/home.webp" id="imgHome"></a>
    <div id="form">
        <h1>Login</h1>
        <?php
        if(isset($_SESSION['nao_autenticado'])):
        ?>
        <div id='erro'>ERRO: Usuário ou senha inválidos.</div>
        <?php
        endif;
        unset($_SESSION['nao_autenticado']);
        ?>
        <form action="php/authentication.php" method="post">
            <label>Login </label>
            <input class="inputtext" id="username" type="text" name="username" required />
            <label>Senha </label>
            <input class="inputtext" id="password" autocomplete="new-password" type="password" name="password" required />
            <div id="btn">
                <input id="btn-login" type="submit" name="submit" value="Enviar" />
            </div>
        </form>
        <div id="switch">Ir para o <a href="sign.php">cadastro </a></div>
    </div>
</body>
</html>