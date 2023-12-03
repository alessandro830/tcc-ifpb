<?php

include('php/protect.php');

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/comentarios.css">
    <title>Comentário dos alunos</title>
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
            <h1>Comentário dos alunos</h1>
            <div class="coment">
                <p><strong>(Nome do aluno:)</strong> (Comentário do aluno, não se esquerecer do espaço no início)</p>
            </div>
            <hr> <!-- Repetir essa tag no final dos comentários -->
        </div>
    </main>
</body>
</html>