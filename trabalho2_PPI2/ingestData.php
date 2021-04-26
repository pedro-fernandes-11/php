<?php
if($_FILES){
    $arq = $_FILES['arquivo'];

    $extensao = explode('.', $arq['name'])[1];
    $hash = md5(time());
    $nomeImg = $hash.'.'.$extensao;

    move_uploaded_file($arq['tmp_name'], 'imagem/'.$nomeImg);

    $arrayData = file("dados.txt");
    $i = 0;

    while($i < count($arrayData)){
        $row = $arrayData[$i];
        $rowArray = explode(";", $row);
        $i++;
    }
    if(count($arrayData) == 0){
        $newRow = (count($arrayData)+1).";".$_POST['nome'].";".$_POST['produto'].";".$_POST['paymentOptions'].";".$nomeImg;
    }else{
        $newRow = "\n".(count($arrayData)+1).";".$_POST['nome'].";".$_POST['produto'].";".$_POST['paymentOptions'].";".$nomeImg;
    }

    array_push($arrayData, $newRow);

    file_put_contents("dados.txt", $arrayData);
    header("Location: table.php");
}
?>