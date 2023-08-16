<?php

include('php/protect.php')

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
        <h1>Total de extras:...</h1>
        <form action="#">
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome" autocomplete="off">
            <label for="matricula">matricula</label>
            <input type="number" name="matricula" id="matricula">
            <input type="submit" value="Concluir">
        </form>
    </div>
</body>
</html>