<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign in</title>
    <link rel="stylesheet" href="css/index.css">
</head>
<body id="bodylogin">
    <a href="index.php"><img src="assets/home.webp" id="imgHome"></a>
    <div id="form">
        <h1>Cadastro</h1>
        <?php
            if(isset($_SESSION['cadastro_validado'])):
        ?>
        <div id='validated'>Cadastro efetuado, faça login <a href="login.php">aqui</a></div>
        <?php
            endif;
            unset($_SESSION['cadastro_validado']);
        ?>

        <?php
            if(isset($_SESSION['usuario_existe'])):
        ?>
        <div id='erro'>ERRO: Usuário já existente</div>
        <?php
            endif;
            unset($_SESSION['usuario_existe']);
        ?>

        <form action="php/signauth.php" method="post">
            <label>Nome </label>
            <input class="inputtext" id="username" type="text" name="namesign" required />
            <label>Login </label>
            <input class="inputtext" id="username" type="text" name="usernamesign" required />
            <label>Senha </label>
            <input class="inputtext" id="password" autocomplete="new-password" type="password" name="passwordsign" required />
            <div id="btn">
                <input id="btn-login" type="submit" name="submit" value="Enviar" />
            </div>
        </form>
        <div id="switch">Ir para o <a href="login.php">login </a></div>
    </div>
</body>
</html>