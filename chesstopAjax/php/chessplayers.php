<?php
    session_start();
    include_once("tableInstancing.php");

    $table = new Table("connection.php");
    $op = $_GET['op'] ?? null;
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $data = json_decode(file_get_contents("php://input"));
        $name = $data->nome;
        $rating = $data->rating;
        $title = $data->title;

        $table->updateData($id, $name, $rating, $title);
    }else{
        if($op  == "ler"){
            $printTableData = $table->getData();
            print $printTableData;
        }else{
            $data = json_decode(file_get_contents("php://input"));
            $name = $data->nome;
            $rating = $data->rating;
            $title = $data->title;
    
            $table->insertData($name, $rating, $title);
        }
    }
?>