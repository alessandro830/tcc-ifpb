<?php

include('php/protect.php')

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
            <a href="php/logout.php"><button>Sair</button></a>
        </div>
    </header>
    <main>
        <div class="box">
            <form action="#" method="post">
                <table>
                    <caption>lista de alunos que marcaram marmita</caption>
                    <thead>
                        <!--
                            puxar os dados nessa ordem
                            repetir o checkbox em todos os alunos
                        -->
                        <tr>
                            <th>Nome</th>
                            <th>Matrícula</th>
                            <th>Presença</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>...</td>
                            <td>...</td>
                            <td><input type="checkbox" name="presenca" id="presenca" class="checkbox"></td>
                        </tr>
                        <tr>
                            <td>...</td>
                            <td>...</td>
                            <td><input type="checkbox" name="presenca" id="presenca" class="checkbox"></td>
                        </tr>
                        <tr>
                            <td>...</td>
                            <td>...</td>
                            <td><input type="checkbox" name="presenca" id="presenca" class="checkbox"></td>
                        </tr>

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