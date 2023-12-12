<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/verjust.css">
    <title>Justificativa do Aluno</title>
</head>
<body>
    <header>
        <img src="images/ifpb-horizontal200.png" alt="logo horizontal do ifpb">
        <div class="nav_buttons">
            <a href="funcionario.php"><button>Voltar</button></a>
        </div>
    </header>
    <div class="box">
        <h1>Justificativa do Aluno</h1>
        <?php
        $con = mysqli_connect("localhost", "root", "", "marmita");

        $select = "SELECT a.nome, a.matricula, f.just_escrita FROM alunos a, faltas f WHERE a.matricula = ? AND f.matricula = a.matricula";
        $stmt = mysqli_prepare($con, $select);
        mysqli_stmt_bind_param($stmt, "s", $_GET['matriculas']);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($result) {
            echo "<div class='just'>";
            $linha = mysqli_fetch_array($result);
            echo "<h1>" . $linha['nome'] . " - " . $linha['matricula'] . "</h1>";
            echo "<p>" . $linha['just_escrita'] . "</p>";
            echo "</div>";
        } else {
            echo "Erro ao executar a consulta: " . mysqli_error($con);
        }

        mysqli_stmt_close($stmt);
        mysqli_close($con);
        ?>
    </div>
</body>
</html>
