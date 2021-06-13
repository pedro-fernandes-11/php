<?php
    session_start();
    include("connection.php");

    if(isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["pass"]) && isset($_POST["passAgain"])){
        if($_POST["pass"] == $_POST["passAgain"]){
            if(strlen($_POST["name"]) < 16){
                $name = mysqli_real_escape_string($conn, $_POST['name']);
                $pass = mysqli_real_escape_string($conn, md5($_POST['pass']));
                $email = mysqli_real_escape_string($conn, $_POST['email']);

                $query = "select count(*) as total from users where email = '$email'";
                $result = mysqli_query($conn, $query);
                $row = mysqli_fetch_assoc($result);

                if($row['total'] == 1){
                    $_SESSION['registerError'] = "Já existe uma conta para o email inserido!";
                    header('Location: ../pages/register.php');
                }

                #user added to the database
                mysqli_query($conn, "insert into users (nome, email, senha) values ('$name', '$email', '$pass')");

                $_SESSION["logged"] = true;
                $_SESSION["name"] = $_POST["name"];
                setcookie("LoggedCookie", $_POST["name"], time()+3600);
                header("Location: ../index.php");
            }else{
                $_SESSION['registerError'] = "O nome deve ter no máximo 15 caracteres!";
                header("Location: ../pages/register.php");
            }
        }else{
            $_SESSION['registerError'] = "As senhas não coincidem!";
            header("Location: ../pages/register.php");
        }
    }else{
        header("Location: ../pages/register.php");
    }
?>