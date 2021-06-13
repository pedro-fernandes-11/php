<?php
    session_start();
    include('../php/connection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/table.css">
    <link rel="stylesheet" href="../css/format.css">
    <title>Table</title>
</head>
<body>
<header>
        <div>
            <img src="../assets/logo.png">
        </div>
        <div>
            <ul>
                <li><a href="../index.php">Home</a></li>
                <li><a href="table.php">Tabela</a></li>
                <?php
                    if (isset($_SESSION["logged"])){
                        echo "<li class='special'><a href='../php/signout.php'>Sair</a></li>";
                    }else{
                        echo "<li class='special'><a href='login.php'>Entrar</a></li>";
                    }
                ?>
            </ul>
        </div>
</header>
<div id="main">
    <div>
        <?php 
        if(isset($_SESSION['logged'])){echo "<a href='insertTable.php'>Adicionar um novo registro</a>";}
        else{echo "<a href='login.php'>Faça login para alterar a tabela</a>";}
        ?>
        <?php
            $query = 'select * from chessplayers order by fide_rating desc';
            $result = mysqli_query($conn, $query);
            if(mysqli_num_rows($result) == 0){
                echo "Nenhuma registro na tabela.";
            }else{
        ?>
        <table>
            <tr>
                <th></th>
                <th>Name</th>
                <th>Title</th>
                <th>Fide rating</th>
                <th>Image</th>
                <?php
                    if(isset($_SESSION['logged'])){
                        echo "<th colspan='2'>Actions</th>";
                    }
                ?>
            </tr>
            <?php
            $i = 1;
            while ($row = mysqli_fetch_assoc($result)){
                echo "
                    <tr>
                        <td>{$i}</td>
                        <td>{$row['name']}</td>
                        <td>{$row['title']}</td>
                        <td>{$row['fide_rating']}</td>
                        <td><img src='../uploads/{$row['image']}'></td>";
                    if(isset($_SESSION['logged'])){
                        echo "
                        <td><a href='updateTable.php?id={$row['id']}'><img src='../assets/table/edit.svg' class='svg'></a></td>
                        <td><a href='deleteFromTable.php?id={$row['id']}'><img src='../assets/table/delete.svg' class='svg'></a></td>
                    </tr>";
                    }
                $i++;
            }}
            ?>
        </table>
    </div>
</div>
</body>
</html>