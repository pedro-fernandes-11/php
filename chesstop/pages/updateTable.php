<?php
    session_start();
    if(!isset($_SESSION['logged'])){
        header("Location: table.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/login.css">
    <link rel="stylesheet" href="../css/insertTable.css">
    <title>Update</title>
</head>
<body>
    <header>
        <a href="../index.php"><img src="../assets/home.webp"></a>
    </header>
    <div id="main">
        <form action="../php/updateRecord.php" enctype="multipart/form-data" method="post">
            <?php
                if(isset($_SESSION["updatingError"])){
                    echo "<div class='loginError'>{$_SESSION['updatingError']}</div>";
                    unset($_SESSION["updatingError"]);
                }else{
                    echo "<h1>Update table</h1>";
                }
            ?>
            <?php
                include("../php/connection.php");
                $id = $_GET['id'];
                $q = "select * from chessplayers where id = '$id'";
                $result = mysqli_query($conn, $q);
                while ($row = mysqli_fetch_assoc($result)){
                    $name = $row['name'];
                    $rating = $row['fide_rating'];
                    $title = $row['title'];
                    $img = $row['image'];
                }
            ?>
            <input type="text" name="name" placeholder="Digite o nome do jogador" required autocomplete="off" value="<?php echo $name?>"><br>
            <input type="text" name="title" placeholder="Digite o título (GM, IM, FM, ...)" required autocomplete="off" value=<?php echo $title?>><br>
            <input type="text" name="rating" placeholder="Digite o rating fide" required autocomplete="off" value=<?php echo $rating?>><br>
            <input type="hidden" value="<?php echo $id?>" name="id"/>
            <div>
                <label>Insira uma imagem</label>
                <input type="file" name="img" class="imageInput"><br>
            </div>
            <input type="submit" name="submit">
        </form>
    </div>
</body>
</html>