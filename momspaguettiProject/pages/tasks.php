<?php
    session_start();
    include("../php/connection.php");
    if(isset($_SESSION['user_id'])){
        $msgbool = True;
    }else{
        $msgbool = False;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/tasks.css">
    <link rel="stylesheet" href="../css/format.css">
    <title>Document</title>
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
                    <li class="navbar-item"><a href="">Tarefas</li></a>
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

<div id="contentTasks">
        <?php
            if($msgbool == False){
                echo "<div id='msg'>Sessão não foi iniciada, <a href='../login.php'>entre</a> na sua conta para ver suas tarefas</div>";
            }else{
                $completedTasks_query = "select completedTasks from users where user_id = '{$_SESSION['user_id']}'";
                $result = mysqli_query($conexao, $completedTasks_query);
                $completedTasks_int = mysqli_fetch_assoc($result)['completedTasks'];
                if($completedTasks_int == null){
                    $completedTasks_int = 0;
                }
                echo "<div id='msg'>Você possui {$completedTasks_int} tarefas concluídas</div>";
            }
        ?>
        <?php 
            if($msgbool){
                $name_session = mysqli_real_escape_string($conexao, $_SESSION['name']);
                $id_session_query = "select user_id from users where name = '$name_session'";
                $id_session = mysqli_query($conexao, $id_session_query);
                $id_session_string = mysqli_fetch_assoc($id_session)['user_id'];
                $_SESSION['user_id'] = $id_session_string;

                $array_tasks_query = "select * from tasks where user_id = '$id_session_string'";
                $result = mysqli_query($conexao, $array_tasks_query);
                if(mysqli_num_rows($result) == 0){
                    echo "<div id='bottomMsg'>Nenhuma tarefa para ser mostrada</div>";
                }
            }
        ?>
        
        <div id="main">
            
            <?php
                if($msgbool){
                    
                    while ($row = mysqli_fetch_assoc($result)){
                        $completed_task_id = $row['task_id'];
                        $delete_task_id = $row['task_id']."|delete";
                        echo "<div class='taskTemplate'>
                            <form action='../php/eachTaskInteraction.php' method='get'>
                                <div class='infoTask'>
                                    <h1>{$row['title']}</h1>
                                    <div class='desc'><p>{$row['description']}</p></div>
                                    <div class='important'><p>Importante <input class='checkbox' type='checkbox' name='important|' checked={$row['important']}></p></div>
                                </div>
                                <div id='lineButtons'>
                                    <input class='taskButton done' type='submit' name='$completed_task_id' value='Completei'>
                                    <input class='taskButton delete' type='submit' name='$delete_task_id' value='Apagar'>
                                </div>
                            </form>
                        </div>";
                    }
                    echo "<div class='taskTemplate addTask'><h1>Nova tarefa</h1><a href='newTask.php'><img src='../assets/add.svg'></a></div>";
                }
            ?>

        </div>
    </div>

<footer>
    </footer>
</body>
</html>