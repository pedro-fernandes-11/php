<?php
    class Table{
        public function getData(){
            define('HOST', 'localhost');
            define('USUARIO', 'root');
            define('SENHA', '');
            define('DB', 'chesstop');

            $conn = mysqli_connect(HOST, USUARIO, SENHA, DB) or die("Não foi possível conectar");

            $result = "";
                $query = 'select * from chessplayers order by fide_rating desc';
                $queryResult = mysqli_query($conn, $query);
                if(mysqli_num_rows($queryResult) == 0){
                    $result .= "Nenhuma registro na tabela.";
                }else{
                    $i = 1;
                    while ($row = mysqli_fetch_assoc($queryResult)){
                        $result .="<tr><td>{$i}</td><td>{$row['name']}</td><td>{$row['title']}</td><td>{$row['fide_rating']}</td>";
                        if(isset($_SESSION['logged'])){
                            $id = $row['id'];
                            $result .="<td><a href='updateTable.php?id={$id}'><img src='../assets/table/edit.svg' class='svg'></a></td><td><button onclick='deleteFromTableWhere({$id})'><img src='../assets/table/delete.svg' class='svg'></a></td>";
                        }
                        $result .= "</tr>";
                        $i++;
                    }
                }
            return $result;
        }
        public function insertData($name, $rating, $title){
            define('HOST', 'localhost');
            define('USUARIO', 'root');
            define('SENHA', '');
            define('DB', 'chesstop');

            $conn = mysqli_connect(HOST, USUARIO, SENHA, DB) or die("Não foi possível conectar");   

            $sql = "INSERT INTO chessplayers(name, fide_rating, title) values ('{$name}', '{$rating}', '{$title}')";
            mysqli_query($conn, $sql);
            header("Location: ../pages/table.php");
        }
        public function updateData($id, $name, $rating, $title){
            define('HOST', 'localhost');
            define('USUARIO', 'root');
            define('SENHA', '');
            define('DB', 'chesstop');
            
            $conn = mysqli_connect(HOST, USUARIO, SENHA, DB) or die("Não foi possível conectar");
            $query = "update chessplayers set name = '$name', title = '$title', fide_rating = '$rating' where id = '$id'";
            mysqli_query($conn, $query);
        }
    }
?>