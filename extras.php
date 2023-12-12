<?php
include('php/protect.php');
include('php/horario.php');
include('php/quantidade.php');


$con = mysqli_connect("localhost", "root", "", "marmita");
$dia_atual = date('D');
$dia_portugues = obter_dia($dia_atual);


$select = "SELECT count(*) FROM quent_dias WHERE $dia_portugues = ?";
$stmtSelect = mysqli_prepare($con, $select);
mysqli_stmt_bind_param($stmtSelect, "s", $dia_portugues);
mysqli_stmt_execute($stmtSelect);

$result = mysqli_stmt_get_result($stmtSelect);
$row = mysqli_fetch_row($result);

$quant_resultado = $row[0];



$select2 = "SELECT count(*) FROM extras WHERE dia = ?";
$stmtSelect2 = mysqli_prepare($con, $select2);
mysqli_stmt_bind_param($stmtSelect2, "s", $dia_portugues);
mysqli_stmt_execute($stmtSelect2);

$result2 = mysqli_stmt_get_result($stmtSelect2);
$row2 = mysqli_fetch_row($result2);

$quant_quent = $row2[0];

$quant = quant($dia_portugues);
$quant_quent2 = $quant - $quant_resultado - $quant_quent;

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
        echo "<h1>Total de extras:" . $quant_quent2 . "</h1>";
        ?>
        <form action="php/regis_extra.php" method="post">
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome" autocomplete="off">
            <label for="matricula">Matrícula</label>
            <input type="number" name="matricula" id="matricula">
            <input type="submit" value="Concluir">
        </form>
    </div>
</body>
</html>
