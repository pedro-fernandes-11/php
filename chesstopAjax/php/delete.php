<?php
    define('HOST', 'localhost');
    define('USUARIO', 'root');
    define('SENHA', '');
    define('DB', 'chesstop');

    $conn = mysqli_connect(HOST, USUARIO, SENHA, DB) or die("Não foi possível conectar");   
    $id = $_GET['id'];
    $query = "delete from chessplayers where id = '$id'";
    mysqli_query($conn, $query);
?>