<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="apple-touch-icon" sizes="180x180" href="../images/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../images/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../images/favicon-16x16.png">
</head>
<body>
    <?php

    if(!isset($_SESSION)) {
        session_start();
    }

    if(!isset($_SESSION['matricula'])) {
        ///die("Você não pode acessar essa página porque não está logado!<p><a href=\"index.html\">Logar!</a></p>");
        header('location:index.html');
        exit();
    }

    ?>
</body>
</html>