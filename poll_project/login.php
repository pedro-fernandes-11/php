<?php
session_start();

if(isset($_POST['email']) && isset($_POST['pass'])){
    if($_POST['email'] == 'admin@admin' && $_POST['pass'] == 'admin'){
        $_SESSION['userName'] = $_POST['login'];
        $_SESSION['infoLogged'] = true;
        header("Location: votacao.php");
    }else{
        $_SESSION['errorToLogin'] = true;
        header("Location: index.php");
    }
}else{
    $_SESSION['errorToLogin'] = true;
    header("Location: index.php");
}
?>