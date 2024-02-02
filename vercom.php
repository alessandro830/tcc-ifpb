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
    <title>Comentário dos Alunos</title>
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
            <h1>Comentário dos Alunos</h1>
            <?php
                $con = mysqli_connect("localhost", "root", "", "marmita");
                $select = "SELECT nome, feedback FROM alunos WHERE feedback IS NOT NULL";
                $result = mysqli_query($con, $select);
                
                while ($com = mysqli_fetch_assoc($result)) {
                    $nome = htmlspecialchars($com['nome']);
                    $feedback = htmlspecialchars($com['feedback']);

                    echo "<div class='coment'>";
                    echo "<p><strong>".$nome.": </strong>".$feedback."</p>";
                    echo "</div>";
                    echo "<hr>";
                }

                mysqli_close($con);
            ?>
        </div>
    </main>
</body>
</html>
