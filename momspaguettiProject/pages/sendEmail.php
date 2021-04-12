<?php
    session_start();
    include("../php/connection.php");
    if(empty($_SESSION['name'])){
        $msgbool = False;
    }else{
        $msgbool = True;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/format.css">
    <link rel="stylesheet" href="../css/aboutus.css">
    <link rel="stylesheet" href="../css/newTask.css">
</head>
<body>
<header>
        <div id="left">
            <div id="logo">
                <img src="../assets/logo.png" alt="momspaghetti">
            </div>
        </div>
        <div id="right">
            <div id="leftinside">
                <ul class="navbar">
                    <li class="navbar-item"><a href="../index.php">Home</li></a>
                    <li class="navbar-item"><a href="tasks.php">Tarefas</li></a>
                    <li class="navbar-item"><a href="aboutus.php">Saiba mais</li></a>
                </ul>
            </div> 
            
            <div id="rightinside">
                <?php
                    if($msgbool){

                        date_default_timezone_set("America/Sao_Paulo");
                        $now = (int)substr(date("h:i:sa"), 0, 2);
                        if($now > 4){
                            $daytimeMsg = "Bom dia";
                        }elseif($now > 13){
                            $daytimeMsg = "Boa tarde";
                        }elseif($now > 18 || $now <= 4){
                            $daytimeMsg = "Boa noite";
                        }

                        echo "<p> {$daytimeMsg}, {$_SESSION['name']}! ";
                        echo "<a href='../php/destroy_session.php'>sair </a>";
                        echo "</p>";
                    }else{
                        echo "<p> já é cadastrado? faça <a href='../login.php'> login </a></p>";
                    }
                ?>
            </div>
        </div>
</header>

<div id="contentNewTask">
    <form action="aboutus.php">
        <?php
            if(isset($_POST['email'])){
                echo "<h1>Email: {$_POST['email']}";
                echo "<h1>Titulo: {$_POST['title']}";
                echo "<h1>Conteúdo: {$_POST['content']}";
                if(isset($_POST['duvida'])){
                    echo "<h1>Dúvida: Sim";
                }else{
                    echo "<h1>Dúvida: Não";
                }
                if(isset($_POST['reclamacao'])){
                    echo "<h1>Reclamação: Sim";
                }else{
                    echo "<h1>Reclamação: Não";
                }
                if(isset($_POST['sugestao'])){
                    echo "<h1>Sugestão: Sim";
                }else{
                    echo "<h1>Sugestão: Não";
                }
                echo "<div class='btn'><input type='submit'></div>";
            }
            else{
                echo "<h1>Conteúdo da nova tarefa não foi definido</h1>";
            }
        ?>
    </form>
</div>

<footer>
</footer>
</body>
</html>