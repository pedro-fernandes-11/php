<?php
    session_start();
    include('connection.php');

    if(isset($_POST['name']) && isset($_POST['title']) && isset($_POST['rating'])){
        if(strlen($_POST['name']) < 21){
            if(strlen($_POST['title']) < 4){
                if(strlen($_POST['rating']) < 5){
                    $imgRoot = $_FILES['img'];
                    $extension = explode('.', $imgRoot['name'])[1];
                    $hash = md5(time());
                    $imgFinal = $hash.'.'.$extension;
        
                    #moving file to ../uploads
                    move_uploaded_file($imgRoot['tmp_name'], '../uploads/'.$imgFinal);
        
                    $name = $_POST['name'];
                    $title = $_POST['title'];
                    $rating = $_POST['rating'];
                    $id = $_POST['id'];
                    
                    if($_FILES['img']['size'] == 0){
                        $query = "update chessplayers set name = '$name', title = '$title', fide_rating = '$rating' where id = '$id'";
                    }else{
                        $query = "update chessplayers set name = '$name', title = '$title', fide_rating = '$rating', image = '$imgFinal' where id = '$id'";
                    }

                    mysqli_query($conn, $query);
                    header("Location: ../pages/table.php");
                }else{
                    $_SESSION['updatingError'] = "O rating deve ter no máximo 4 caracteres!";
                    header("Location: ../pages/updateTable.php?id={$_POST['id']}");
                }
            }else{
                $_SESSION['updatingError'] = "O título deve ter no máximo 3 caracteres!";
                header("Location: ../pages/updateTable.php?id={$_POST['id']}");
            }
        }else{
            $_SESSION['updatingError'] = "O nome deve ter no máximo 20 caracteres!";
            header("Location: ../pages/updateTable.php?id={$_POST['id']}");
        }
    }else{
        header("Location: ../pages/updateTable.php?id={$_POST['id']}");
    }
?>