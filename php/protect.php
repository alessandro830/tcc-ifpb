<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Erro</title>
</head>
<body>
    <?php

    if(!isset($_SESSION)) {
        session_start();
    }

    if(!isset($_SESSION['matricula'])) {
        header('location:index.html');
        exit();
    }

    ?>
</body>
</html>