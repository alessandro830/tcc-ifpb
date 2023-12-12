<?php
include("php/protect.php");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/falta_just.css">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/popup.css">
    <link rel="apple-touch-icon" sizes="180x180" href="images/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="images/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon-16x16.png">
    <title>Falta/justificativa</title>
</head>
<body>
    <header>
        <img src="images/ifpb-horizontal200.png" alt="logo horizontal do ifpb">
        <div class="nav_buttons">
            <a href="aluno.php"><button>Voltar</button></a>
        </div>
    </header>
    <div class="box">
        <h1>Justificativa</h1>
        <form action="php/upload.php" method="post" enctype="multipart/form-data">
            <label for="just">Justificativa</label>
            <input type="text" name="just" id="just" autocomplete="off">
            <label for="data_falta">Data das faltas</label>
            <div class="select_container">
                <select name="datas" id="data_falta" class="select_box">
                    <?php
                    $matricula = $_SESSION['matricula'];
                    $con = mysqli_connect("localhost", "root", "", "marmita");

                    $select = $con->prepare("SELECT * FROM faltas WHERE matricula = ? AND falta_aluno = 1");
                    $select->bind_param("s", $matricula);
                    $select->execute();
                    $result = $select->get_result();

                    while ($linha = mysqli_fetch_array($result)) {
                        echo '<option value="' . $linha['dia_falta'] . '">' . $linha['dia_falta'] . '</option>';
                    }

                    $select->close();
                    mysqli_close($con);
                    ?>
                </select>
            </div>
            <label for="arquivo" class="label_arq" id="index-label">Indexar arquivo (PDF)</label>
            <input type="file" name="arquivo" id="arquivo" onchange="updateFileName(this)">
            <div id="file-name"></div>
            <input class="button_just" type="submit" value="Enviar">
        </form>
        <dialog class="conf-msg003" id="conf-msg">
            <p>Mensagem</p>
            <button class="ok" id="ok1">Ok</button>
        </dialog>
    </div>

    <script src="js/script.js"></script>
    <script type="module" src="js/popup_just.js"></script>

</body>
</html>
