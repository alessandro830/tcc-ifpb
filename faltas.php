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
    <link rel="apple-touch-icon" sizes="180x180" href="images/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="images/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon-16x16.png">
    <title>Funcionário</title>
</head>
<body>
    <header>
        <img src="images/ifpb-horizontal200.png" alt="logo horizontal do ifpb">
        <div class="nav_buttons">
            <a href="funcionario.php"><button>Voltar</button></a>
        </div>
    </header>
    <main>
    <div class="box">
            <table>
                <caption>lista de alunos com falta</caption>
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Matrícula</th>
                        <th>Faltas</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $con = mysqli_connect("localhost", "root", "usbw", "marmita");
                    $select = "SELECT * FROM faltas WHERE falta_aluno >= 1";
                    $result = mysqli_query($con, $select) or die (mysqli_error($con));
                    while($linha = mysqli_fetch_array($result)){
                        echo "<tr>";
                            echo "<td><a href='falta_aluno.php'>" . $linha['nome'] . "</a></td>";
                            echo "<td>" . $linha['matricula'] . "</td>";
                            echo "<td>" . $linha['falta_alunos'] . "</td>";
                        echo "<tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </main>
</body>
</html>