<?php
    session_start();
    include("connection.php");
    
    $newGet = array_search('Confirmar', $_GET);
    $newGet = explode('|', $newGet);
    $user_id = $_SESSION['user_id'];
    $title = str_replace('_', ' ', $newGet[0]);
    $desc = str_replace('_', ' ', $newGet[1]);
    $type = $newGet[2];
    if($newGet[3]){
        $important = True;
    }else{
        $important = False;
    }
    $query = "insert into tasks (user_id, title, description, type, important) values ('{$user_id}', '{$title}', '{$desc}', '{$type}', '{$important}')";
    mysqli_query($conexao, $query);
    header('Location: ../pages/tasks.php');
?>