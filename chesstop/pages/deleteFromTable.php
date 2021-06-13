<?php
    session_start();
    include('../php/connection.php');

    if(isset($_SESSION['logged']) && isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "delete from chessplayers where id = '$id'";
        mysqli_query($conn, $query);
        header('Location: table.php');
    }else{
        header('Location: table.php');
    }
?>