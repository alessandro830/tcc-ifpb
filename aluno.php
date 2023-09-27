<?php
include('php/func_dia.php');
include("php/protect.php");
$matricula = $_SESSION['matricula'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/aluno.css">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/popup.css">
    <script type="text/javascript" src="js/carrosel.js"></script>
    <link rel="apple-touch-icon" sizes="180x180" href="images/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="images/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon-16x16.png">
    <title>Aluno</title>
</head>
<body>
    <header>
        <img src="images/ifpb-horizontal200.png" alt="logo horizontal do ifpb">
        <div class="nav_buttons">
            <a href="falta_justificativa.php"><button>Justificativas/Faltas</button></a>
            <a href="php/logout.php"><button class="btn_logout">Sair</button></a>
        </div>
    </header>
    <main>
        
        <section id="secao_quentinha" class="secao_quentinha">

            <h1>Marque sua quentinha</h1>
            <form action="php/regis_quentinha.php" method="post">

            <div class="dias_semana">
                    <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "marmita";

                    $conn = new mysqli($servername, $username, $password, $dbname);
                    $stmt = $conn->prepare("SELECT segunda, terca, quarta, quinta, sexta FROM quent_dias WHERE matricula = ?");
                    $stmt->bind_param("s", $matricula);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    $semana = mysqli_fetch_array($result);

                    $seg = $semana['segunda'];
                    $ter = $semana['terca'];
                    $qua = $semana['quarta'];
                    $qui = $semana['quinta'];
                    $sex = $semana['sexta'];

                    date_default_timezone_set('America/Sao_Paulo');
                    $dia_atual = date('D');
                    $dia_portugues = obter_dia($dia_atual);

                    if($seg == 'sim' && $dia_portugues == 'segunda'){
                        echo"<div class='dia'>";
                            echo"<label for='segunda'>Segunda-Feira</label>";
                            echo"<input type='checkbox' name='segunda' id='segunda' value='1' class='checkbox' checked disabled='disabled'>";
                        echo"</div>";
                    }

                    elseif($seg == 'nao' && $dia_portugues == 'segunda'){
                        echo"<div class='dia'>";
                            echo"<label for='segunda'>Segunda-Feira</label>";
                            echo"<input type='checkbox' name='segunda' id='segunda' value='1' class='checkbox' disabled='disabled'>";
                        echo"</div>";
                    }

                    elseif($seg == 'sim' && $dia_portugues != 'segunda'){
                        echo"<div class='dia'>";
                            echo"<label for='segunda'>Segunda-Feira</label>";
                            echo"<input type='checkbox' name='segunda' id='segunda' value='1' class='checkbox' checked>";
                        echo"</div>";
                    }

                    else{
                        echo"<div class='dia'>";
                            echo"<label for='segunda'>Segunda-Feira</label>";
                            echo"<input type='checkbox' name='segunda' id='segunda' value='1' class='checkbox'>";
                        echo"</div>";
                    }

                    if($ter == 'sim' && $dia_portugues == 'terca'){
                        echo"<div class='dia'>";
                            echo"<label for='terca'>Terça-Feira</label>";
                            echo"<input type='checkbox' name='terca' id='terca' value='1' class='checkbox' checked disabled='disabled'>";
                        echo"</div>";
                    }

                    elseif($ter == 'nao' && $dia_portugues == 'terca'){
                        echo"<div class='dia'>";
                            echo"<label for='terca'>Terça-Feira</label>";
                            echo"<input type='checkbox' name='terca' id='terca' value='1' class='checkbox'disabled='disabled'>";
                        echo"</div>";
                    }

                    elseif($ter == 'sim' && $dia_portugues != 'terca'){
                        echo"<div class='dia'>";
                            echo"<label for='terca'>Terça-Feira</label>";
                            echo"<input type='checkbox' name='terca' id='terca' value='1' class='checkbox' checked>";
                        echo"</div>";
                    }

                    else{
                        echo"<div class='dia'>";
                            echo"<label for='terca'>Terça-Feira</label>";
                            echo"<input type='checkbox' name='terca' id='terca' value='1' class='checkbox'>";
                        echo"</div>";
                    }

                    if($qua == 'sim' && $dia_portugues == 'quarta'){
                        echo"<div class='dia'>";
                            echo"<label for='quarta'>Quarta-Feira</label>";
                            echo"<input type='checkbox' name='quarta' id='quarta' value='1' class='checkbox' checked disabled='disabled'>";
                        echo"</div>";
                    }

                    elseif($qua == 'nao' && $dia_portugues == 'quarta'){
                        echo"<div class='dia'>";
                            echo"<label for='quarta'>Quarta-Feira</label>";
                            echo"<input type='checkbox' name='quarta' id='quarta' value='1' class='checkbox' disabled>";
                        echo"</div>";
                    }

                    elseif($qua == 'sim' && $dia_portugues != 'quarta'){
                        echo"<div class='dia'>";
                            echo"<label for='quarta'>Quarta-Feira</label>";
                            echo"<input type='checkbox' name='quarta' id='quarta' value='1' class='checkbox' checked>";
                        echo"</div>";
                    }

                    else{
                        echo"<div class='dia'>";
                            echo"<label for='quarta'>Quarta-Feira</label>";
                            echo"<input type='checkbox' name='quarta' id='terca' value='1' class='checkbox'>";
                        echo"</div>";
                    }
                    if($qui == 'sim' && $dia_portugues == 'quinta'){
                        echo"<div class='dia'>";
                            echo"<label for='quinta'>Quinta-Feira</label>";
                            echo"<input type='checkbox' name='quinta' id='quinta' value='1' class='checkbox' checked disabled='disabled'>";
                        echo"</div>";
                    }

                    elseif($qui == 'nao' && $dia_portugues == 'quinta'){
                        echo"<div class='dia'>";
                            echo"<label for='quinta'>Quinta-Feira</label>";
                            echo"<input type='checkbox' name='quinta' id='quinta' value='1' class='checkbox' disabled='disabled'>";
                        echo"</div>";
                    }

                    elseif($qui == 'sim' && $dia_portugues != 'quinta'){
                        echo"<div class='dia'>";
                            echo"<label for='quinta'>Quinta-Feira</label>";
                            echo"<input type='checkbox' name='quinta' id='quinta' value='1' class='checkbox' checked>";
                        echo"</div>";
                    }

                    else{
                        echo"<div class='dia'>";
                            echo"<label for='quinta'>Quinta-Feira</label>";
                            echo"<input type='checkbox' name='quinta' id='quinta' value='1' class='checkbox'>";
                        echo"</div>";
                    }

                    if($sex == 'sim' && $dia_portugues == 'sexta'){
                        echo"<div class='dia'>";
                            echo"<label for='sexta'>Sexta-Feira</label>";
                            echo"<input type='checkbox' name='sexta' id='sexta' value='1' class='checkbox' checked disabled='disabled'>";
                        echo"</div>";
                    }

                    elseif($sex == 'nao' && $dia_portugues == 'sexta'){
                        echo"<div class='dia'>";
                            echo"<label for='sexta'>Sexta-Feira</label>";
                            echo"<input type='checkbox' name='sexta' id='sexta' value='1' class='checkbox' disabled='disabled'>";
                        echo"</div>";
                    }

                    elseif($sex == 'sim' && $dia_portugues != 'sexta'){
                        echo"<div class='dia'>";
                            echo"<label for='sexta'>Sexta-Feira</label>";
                            echo"<input type='checkbox' name='sexta' id='sexta' value='1' class='checkbox' checked>";
                        echo"</div>";
                    }

                    else{
                        echo"<div class='dia'>";
                            echo"<label for='sexta'>Sexta-Feira</label>";
                            echo"<input type='checkbox' name='sexta' id='sexta' value='1' class='checkbox'>";
                        echo"</div>";
                    }

                    $stmt->close();
                    $conn->close();
                    ?>
                </div>
                <div class="div_button">
                    <input class="button_save" type="submit" value="Salvar">
                </div>
                <dialog class="conf-msg" id="conf_msg001">
                    <p>Confirmar os dias?</p>
                    <button id="sim">Sim</button>
                    <button id="nao">Não</button>
                    <button id="ok2" style="visibility: hidden">Ok</button>
                </dialog>  

            </form>

            <h1>Comentário</h1>

                <form action="#" method="post" class="form_coment">
                    <input type="text" name="comentario" id="comentario" autocomplete="off" required>
                    <input class="button_comment" type="submit" value="Concluir">
                </form>
                <dialog class="conf-msg" id="conf-msg002">
                    <p>Mensagem</p>
                    <button id="ok">Ok</button>
                </dialog>
        </section>
        <section id="secao_cardapio" class="secao_cardapio">

        <h1>Cardápios</h1>

        <div class="div_download">
            <div class="btn_download">
                <span>Download das imagens</span>
                <ul>    
                    <li><a href="images/almoco001.PNG" download>almoço 1</a></li>
                    <li><a href="images/almoco002.PNG" download>almoço 2</a></li>
                    <li><a href="images/jantar001.PNG" download>jantar 1</a></li>
                    <li><a href="images/jantar002.PNG" download>jantar 2</a></li>
                </ul>
            </div>
        </div>


        <div class="slider">
            <div class="slides">

                <input type="radio" name="radio-btn" id="radio1">
                <input type="radio" name="radio-btn" id="radio2">
                <input type="radio" name="radio-btn" id="radio3">
                <input type="radio" name="radio-btn" id="radio4">

                <div class="slide" id="slide-first">
                    <img src="images/almoco001.PNG" alt="image do cardapio">
                </div>
                <div class="slide">
                    <img src="images/almoco002.PNG" alt="image do cardapio">
                </div>
                <div class="slide">
                    <img src="images/jantar001.PNG" alt="image do cardapio">
                </div>
                <div class="slide">
                    <img src="images/jantar002.PNG" alt="image do cardapio">
                </div>

            </div>

                <div class="navegation-manual">
                    <label for="radio1" class="manual-btn"></label>
                    <label for="radio2" class="manual-btn"></label>
                    <label for="radio3" class="manual-btn"></label>
                    <label for="radio4" class="manual-btn"></label>
                </div>

            </div>
        </section>
    </main>
<script type="module" src="js/popup.js"></script>
</body>
</html>
