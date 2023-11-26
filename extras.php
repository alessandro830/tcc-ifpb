<?php

include('php/protect.php');
include('php/horario.php');
include('php/quantidade.php');

$dia_atual = date('D');
$dia_portugues = obter_dia($dia_atual);

$con = mysqli_connect("localhost", "root", "", "marmita");

$select = "SELECT count(*) FROM quent_dias WHERE $dia_portugues = $dia_portugues";
$result = mysqli_query($con, $select) or die (mysqli_error($con));

$select_ex = "SELECT count(*) FROM extras WHERE dia = '$dia_portugues'";
$result_ex = mysqli_query($con, $select_ex) or die (mysqli_error($con));
$row_ex = mysqli_fetch_row($result_ex);
$quant_quent2 = $row_ex[0];

$quant =quant($dia_portugues) ;
$row = mysqli_fetch_row($result);
$quant_resultado = $row[0]; 

$quant_quent = $quant - $quant_resultado - $quant_quent2;

mysqli_close($con);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/extra.css">
    <link rel="stylesheet" href="css/navbar.css">
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
    <div class="box">
        <?php
        echo "<h1>Total de extras:". $quant_quent."</h1>";
        ?>
        <form action="php/regis_extra.php" method="post">
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome" autocomplete="off">
            <label for="matricula">matricula</label>
            <input type="number" name="matricula" id="matricula">
            <label for="date">Dia da Semana:</label>
            <select name="date" id="date">
            <option value="segunda">Segunda</option>
            <option value="terca">Terça</option>
            <option value="quarta">Quarta</option>
            <option value="quinta">Quinta</option>
            <option value="sexta">Sexta</option>
            </select>
            <input type="submit" value="Concluir">
        </form>
    </div>
</body>
</html>
