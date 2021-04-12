<?php
    session_start();
    include("connection.php");

    if(empty($_POST['username']) || empty($_POST['password'])){
        header('Location: ../login.php');
        $_SESSION['nao_autenticado'] = True;
        exit();
    }

    $username = mysqli_real_escape_string($conexao, $_POST['username']);
    $password = mysqli_real_escape_string($conexao, $_POST['password']);

    $query = "select user_id, username from users where username = '{$username}' and pass = md5('{$password}')";
    
    $result = mysqli_query($conexao, $query);
    $row = mysqli_num_rows($result);

    if($row == 0){
        header('Location: ../login.php');
        $_SESSION['nao_autenticado'] = True;
        exit();
    }else{
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);
        $query_get_name = "select name from users where username = '{$username}'";
        $resultado = mysqli_query($conexao, $query_get_name);
        $name = mysqli_fetch_assoc($resultado)['name'];
        $_SESSION['name'] = $name;
        header("Location: ../index.php");
        exit();
    }
?>