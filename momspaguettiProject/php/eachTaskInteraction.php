<?php
    session_start();
    include("connection.php");

    $i = 0;
    foreach($_GET as $each){
        $result = array_search($each, $_GET);
        $newGet[$i] = $result;
        $i++;
    }  

    if(gettype($newGet[1]) == gettype($i)){
        $completedTasks_query = "select completedtasks from users where user_id = {$_SESSION['user_id']}";
        $completedTasks = mysqli_query($conexao, $completedTasks_query);
        $completedTasks_int = (int)implode(mysqli_fetch_assoc($completedTasks));
        $completedTasks_int++;
        $updateCompletedTasks_query = "update users set completedTasks = {$completedTasks_int} where user_id = {$_SESSION['user_id']}";
        mysqli_query($conexao, $updateCompletedTasks_query);

        $_SESSION['completed_tasks'] = $completedTasks_int;

        $deleteTask_query = "delete from tasks where user_id = {$_SESSION['user_id']} and task_id = $newGet[1]";
        mysqli_query($conexao, $deleteTask_query);
        header("Location: ../pages/tasks.php");
    }else{
        echo $_SESSION['user_id'];
        $newGet[1] = explode("|", $newGet[1]);
        echo $newGet[1][0];
        $deleteTask_query = "delete from tasks where user_id = {$_SESSION['user_id']} and task_id = {$newGet[1][0]}";
        mysqli_query($conexao, $deleteTask_query);
        header("Location: ../pages/tasks.php");
    }

?>