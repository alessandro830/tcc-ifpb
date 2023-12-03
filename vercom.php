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
    <title>Comentário</title>
</head>
<header>
        <img src="images/ifpb-horizontal200.png" alt="logo horizontal do ifpb">
        <div class="nav_buttons">
            <a href="funcionario.php"><button>Voltar</button></a>
        </div>
    </header>
    <main>
    <div class="box">
            <table>
                <caption>Comentarios sobre a refeição</caption>
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Matrícula</th>
                        <th>Comentário</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $con = mysqli_connect("localhost", "root", "", "marmita");
                    $select = "SELECT * FROM alunos WHERE feedback IS NOT NULL";
                    $result = mysqli_query($con, $select) or die (mysqli_error($con));
                    while($linha = mysqli_fetch_array($result)){
                        echo "<tr>";
                            echo "<td>" . $linha['nome'] . "</td>";
                            echo "<td>" . $linha['matricula'] . "</td>";
                            echo "<td>" . $linha['feedback'] . "</td>";
                        echo "<tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </main>
</body>
</html>
