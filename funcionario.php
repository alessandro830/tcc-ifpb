<?php

include('php/protect.php');
include('php/func_dia.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/table.css">
    <link rel="stylesheet" href="css/funcionario.css">
    <link rel="stylesheet" href="css/form_presen.css">
    <link rel="apple-touch-icon" sizes="180x180" href="images/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="images/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon-16x16.png">
    <title>Funcionário</title>
</head>
<body>
    <header>
        <img src="images/ifpb-horizontal200.png" alt="logo horizontal do ifpb">
        <div class="nav_buttons">
            <a href="faltas.php"><button>Faltas</button></a>
            <a href="extras.php"><button>Extras</button></a>
            <a href="php/logout.php"><button class="btn_logout">Sair</button></a>
        </div>
    </header>
    <main>
        <div class="box">
            <form action="#" method="post">
                <table>
                    <caption>lista de alunos que marcaram marmita</caption>
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Matrícula</th>
                            <th colspan="2">Presença</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            date_default_timezone_set('America/Sao_Paulo');
                            $dia_atual = date('D');
                            $dia_portugues = obter_dia($dia_atual);
                            
                            $con = mysqli_connect("localhost", "root", "usbw", "marmita");
                            $select = "SELECT * FROM quent_dias WHERE `" . $dia_portugues . "` = 'sim';";
                            $result = mysqli_query($con, $select) or die (mysqli_error($con));
                            while($linha = mysqli_fetch_array($result)){
                                echo "<tr>";
                                    echo "<td>" . $linha['nome'] . "</td>";
                                    echo "<td>" . $linha['matricula'] . "</td>";
                                    echo "<td><input type='radio' name='".$linha['matricula']."' id='presenca' value='true' class='checkbox'> <label for='presenca'>Sim</label></td>";
                                    echo "<td><input type='radio' name='".$linha['matricula']."' id='presenca' value='false' class='checkbox'> <label for='presenca'>Não</label></td>";
                                echo "<tr>";
                            }

                            ?>
                    </tbody>
                </table>
                <div class="div_btn_finalizar">
                    <input type="submit" value="Finalizar">
                </div>
            </form>
        </div>
    </main>
</body>
</html>