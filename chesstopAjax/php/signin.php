<?php
    session_start();
    include("connection.php");

    if(isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["pass"])){
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $pass = mysqli_real_escape_string($conn, md5($_POST['pass']));

        $query = "select * from users where email = '$email' and nome = '$name' and senha = '$pass'";

        $result = mysqli_query($conn, $query);
        $row = mysqli_num_rows($result);

        if($row == 0){
            $_SESSION['loginError'] = 'Usuário não encontrado!';
            header('Location: ../pages/login.php');
        }else{
            $_SESSION["logged"] = true;
            $_SESSION["name"] = $_POST["name"];
            setcookie("LoggedCookie", $_POST["name"], time()+3600);
            header("Location: ../index.php");
        }
    }else{
        header("Location: ../pages/login.php");
    }
?>