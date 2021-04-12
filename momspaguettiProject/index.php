<?php
    session_start();
    include('php/connection.php');
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
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/format.css">
    <title>Home</title>
</head>
<body>
    <header>
        <div id="left">
            <div id="logo">
                <img src="assets/logo.png" alt="momspaghetti">
            </div>
        </div>
        <div id="right">
            <div id="leftinside">
                <ul class="navbar">
                    <li class="navbar-item"><a href="index.php">Home</li></a>
                    <li class="navbar-item"><a href="pages/tasks.php">Tarefas</li></a>
                    <li class="navbar-item"><a href="pages/aboutus.php">Saiba mais</li></a>
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
                        
                        $query = "select user_id from users where name = '{$_SESSION['name']}'";
                        $resultado = mysqli_fetch_assoc(mysqli_query($conexao, $query))['user_id'];
                        $_SESSION['user_id'] = $resultado;

                        echo "<p> {$daytimeMsg}, {$_SESSION['name']}! ";
                        echo "<a href='php/destroy_session.php'>sair </a>";
                        echo "</p>";
                    }else{
                        echo "<p> já é cadastrado? faça <a href='login.php'> login </a></p>";
                    }
                ?>
            </div>
        </div>
    </header>
    
    <div id="content">
        <div id="asideinfo">
            <div id="insideasideinfo">
                <div class="eachInside">
                    <h1>Nada como um irresistível spaguetti da mamãe!</h1>
                    <p>
                        MS é uma ferramenta online para a organização de tarefas pendentes e projetos em andamento. Conecte-se a sua conta para ver suas tarefas ou cadastre-se caso ainda não possuir uma conta:
                    </p>
                </div>
                <div class="eachInside">
                    <a href="sign.php">Cadastre-se</a>
                </div>
            </div>
        </div>
        <div id="asidepicture">
            <img id="blondude" src="assets/character 2.svg">
        </div>
    </div>

    <footer>
        
    </footer>
</body>
</html>