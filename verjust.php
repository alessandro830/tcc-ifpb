<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/verjust.css">
    <title></title>
</head>
    <header>
        <img src="images/ifpb-horizontal200.png" alt="logo horizontal do ifpb">
        <div class="nav_buttons">
            <a href="funcionario.php"><button>Voltar</button></a>
        </div>
    </header>
<body>
    <div class="box">
        <h1>Justificativa do aluno</h1>
        <?php
        $con = mysqli_connect("localhost", "root", "", "marmita");
        $select = "SELECT a.nome, a.matricula, f.just_escrita FROM alunos a, faltas f WHERE a.matricula = '" . $_GET['matriculas'] . "' and f.matricula = a.matricula";
        $result = mysqli_query($con, $select) or die(mysqli_error($con));

        echo"<div class='just'>";
        $linha = mysqli_fetch_array($result);
        echo "<h1>" . $linha['nome'] . " - " . $linha['matricula'] . "</h1>";
        echo "<p>" .$linha['just_escrita']. "</p>";

        echo "</div>";
        ?>
    </div>
</body>
</html>
