<?php

include("php/protect.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/aluno.css">
    <link rel="stylesheet" href="css/navbar.css">
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
            <a href="php/logout.php"><button>Sair</button></a>
        </div>
    </header>
    <main>
        
        <section id="secao_cardapio" class="secao_cardapio">

            <h1>Cardápios</h1>

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

        </section>
        <section id="secao_quentinha" class="secao_quentinha">

            <h1>Marque sua quentinha</h1>
            <form action="php/regis_quentinha.php" method="post">

            <div class="dias_semana">

                    <div class="dia">
                        <label for="segunda">Segunda-Feira</label>
                        <input type="checkbox" name="segunda" id="segunda" value="1" class="checkbox">
                    </div>

                    <div class="dia">
                        <label for="terca">Terça-Feira</label>
                        <input type="checkbox" name="terca" id="terca" value="1" class="checkbox">
                    </div>

                    <div class="dia">
                        <label for="quarta">Quarta-Feira</label>
                        <input type="checkbox" name="quarta" id="quarta" vavalue="1" class="checkbox">
                    </div>

                    <div class="dia">
                        <label for="quinta">Quinta-Feira</label>
                        <input type="checkbox" name="quinta" id="quinta" vavalue="1" class="checkbox">
                    </div>

                    <div class="dia">
                        <label for="sexta">Sexta-Feira</label>
                        <input type="checkbox" name="sexta" id="sexta" value="1" class="checkbox">
                    </div>

                </div>

                <div class="opc">
                    <input type="radio" name="opc" id="marcar" value="1" checked> <label for="marcar">Marcar</label>
                    <input type="radio" name="opc" id="desmarcar" value="2"> <label for="desmarcar">Desmarcar</label>
                </div>

                <div class="div_button">
                    <input class="button_save" type="submit" value="Salvar">
                </div>  

            </form>

            <h1>Comentário</h1>

                <form action="" method="post" class="form_coment">
                    <input type="text" name="comentario" id="comentario" autocomplete="off" required>
                    <input type="submit" value="Concluir">
                </form>

        </section>
    </main>
</body>
</html>
