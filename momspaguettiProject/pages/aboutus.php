<?php
    session_start();
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
    <link rel="stylesheet" href="../css/aboutus.css">
    <link rel="stylesheet" href="../css/format.css">
    <title>Saiba mais</title>
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
                    <li class="navbar-item"><a href="">Saiba mais</li></a>
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
                        echo "<a href='php/destroy_session.php'>sair </a>";
                        echo "</p>";
                    }else{
                        echo "<p> já é cadastrado? faça <a href='../login.php'> login </a></p>";
                    }
                ?>
            </div>
        </div>
    </header>
    
    <div id="contentAboutus">
        <div id="theTeam">
            <h1>O time</h1>
                <div class="eachPerson">
                    <p><img src="../assets/teamMembers.png">
                    <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse fermentum. </span>
                    </p>
                </div>
                <div class="eachPerson">
                    <p><img src="../assets/teamMembers.png">
                    <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse fermentum. </span>
                    </p>
                </div>
                <div class="eachPerson">
                    <p><img src="../assets/teamMembers.png">
                    <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse fermentum. </span>
                    </p>
                </div>
            <div id="bottomText">
                <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam urna ex, sodales vitae purus vel, vulputate lobortis augue. Nulla vitae massa nec tellus pharetra porttitor. Sed id enim pharetra tortor maximus eleifend viverra vel neque. Donec ultrices, nibh sit amet volutpat accumsan, nulla mi efficitur velit, non faucibus ex odio sed magna. Sed ultrices dapibus odio, eget eleifend purus vulputate vel. Nullam quis mi vitae risus hendrerit rutrum ut a dolor. Ut sit amet dolor ac velit tempus dignissim. Phasellus eget enim magna.
                </p>
                <br>
                <p>
                Aliquam aliquet pharetra porttitor. Fusce in mollis ipsum. Suspendisse suscipit libero dolor, nec scelerisque dui interdum vel. Nunc posuere ut mauris vitae viverra. Duis eu nunc vulputate sem posuere convallis ac a mi. Nam rutrum urna erat, quis faucibus lacus dapibus malesuada. Sed quis commodo dolor, nec fermentum erat. Praesent consequat maximus nisl, eu lacinia ligula molestie sed. Sed id dapibus metus. Mauris neque neque, ultrices convallis feugiat eu, blandit eget est. Fusce id leo nec mauris maximus ullamcorper.
                </p>
            </div>
        </div>
        <div class="sendEmailMsg">
            <div>
                <h1>Enviar um email</h1>
            </div>
        </div>
        <div id="formEmail">
            <form action="sendEmail.php" method="post">
                <label>Email</label><br>
                <input type="email" name="email"><br>
                <label>Título da mensagem</label><br>
                <input type="text" name="title"><br>
                <label>Conteúdo</label><br>
                <textarea name="content" cols="30" rows="10"></textarea><br>
                <div>
                    <h1 class="titleClass">Classificação</h1><br>
                    <label>Dúvida</label>
                    <input type="radio" name="duvida"><br>
                    <label>Reclamação</label>
                    <input type="radio" name="reclamacao"><br>
                    <label>Sugestão</label>
                    <input type="radio" name="sugestao">
                </div>
                <div class="btn">
                    <input type="submit" value="Enviar" name="btn">
                </div>
            </form>
        </div>
    </div>
     

    <footer>
        
    </footer>
</body>
</html>
