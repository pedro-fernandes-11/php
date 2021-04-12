<?php
    session_start();
    include("connection.php");
    
    $nome = mysqli_real_escape_string($conexao, $_POST['namesign']);
    $usuario = mysqli_real_escape_string($conexao, $_POST['usernamesign']);
    $senha = mysqli_real_escape_string($conexao, md5($_POST['passwordsign']));

    $sql = "select count(*) as total from users where username = '$usuario'";
    $result = mysqli_query($conexao, $sql);
    $row = mysqli_fetch_assoc($result);

    if($row['total'] == 1){
        $_SESSION['usuario_existe'] = True;
        header('Location: ../sign.php');
        exit();
    }

    $sql = "insert into users (name, username, pass, date) values ('$nome', '$usuario', '$senha', NOW())";

    if($conexao->query($sql) === True){
        $_SESSION['cadastro_validado'] = true;
        $_SESSION['name'] = $name;
    }

    $conexao->close();

    header('Location: ../sign.php');
    exit;

?>