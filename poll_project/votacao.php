<?php
session_start();

if(!isset($_SESSION['infoLogged'])){
    $_SESSION['errorToLogin'] = true;
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/votacao.css">
    <?php
    echo "<title>Usuário {$_SESSION['userName']}</title>";
    ?>
</head>
<body>
    <header>
        <a href="php/destroy_session.php">Desconectar</a>
    </header>
    <?php
        echo "<div class='text'><h1>Olá {$_SESSION['userName']}, <br>programador mais famoso da área da computação:</h1></div>";
    ?>
    <div id="outside">
        <div id="displayForm">
            <div>
                <img src="assets/ada-lovelace.png" alt="Ada Lovelace Picture" onclick="location.href='salvar.php?adalovelace=on'">
                <h2>Ada Lovelace</h2>
            </div>
            <div>
                <img src="assets/edsger_dijkstra.jpg" alt="Edsger Dijkstra Picture" onclick="location.href='salvar.php?edsgerdijkstra=on'">
                <h2>Edsger Dijkstra</h2>
            </div>
            <div>
                <img src="assets/grace-murray-hopper.jpg" alt="Grace Murray Hopper Picture" onclick="location.href='salvar.php?gracemurrayhopper=on'">
                <h2>Grace Murray Hopper</h2>
            </div>
            <div>
                <img src="assets/Tim_Berners-Lee.jpg" alt="Tim Berners-Lee Picture" onclick="location.href='salvar.php?timbernerslee=on'">
                <h2>Tim Berners-Lee</h2>
            </div>
            <div>
                <img src="assets/branco.png" alt="" onclick="location.href='salvar.php?branco=on'">
                <h2>Branco</h2>
            </div>
        </div>
    </div>
</body>
</html>