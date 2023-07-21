<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $targetDir = "tcc-ifbp/php/arquivos/";
    $targetFile = $targetDir . basename($_FILES["file"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "marmita";
    
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["file"]["tmp_name"]);
        if ($check !== false) {
            echo "O arquivo é uma imagem - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "O arquivo não é uma imagem.";
            $uploadOk = 0;
        }
    }
    if (file_exists($targetFile)) {
        echo "Desculpe, o arquivo já existe.";
        $uploadOk = 0;
    }
    $maxFileSize = 5 * 1024 * 1024;
    if ($_FILES["file"]["size"] > $maxFileSize) {
        echo "Desculpe, o tamanho do arquivo é muito grande.";
        $uploadOk = 0;
    }

    $allowedFileTypes = array("pdf");
    if (!in_array($imageFileType, $allowedFileTypes)) {
        echo "Desculpe, apenas arquivos PDF são permitidos.";
        $uploadOk = 0;
    }
    if ($uploadOk == 0) {
        echo "Desculpe, seu arquivo não foi enviado.";
    } else {
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile)) {
            echo "O arquivo " . basename($_FILES["file"]["name"]) . " foi enviado.";
        } else {
            echo "Desculpe, houve um erro ao enviar o seu arquivo.";
        }
    }
        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Falha na conexão com o banco de dados: " . $conn->connect_error);
        }
        $sql = "INSERT INTO arquivos (caminho) VALUES ('$targetFile')";

        if ($conn->query($sql) === true) {
            echo "O caminho do arquivo foi salvo no banco de dados.";
        } else {
            echo "Erro ao salvar o caminho do arquivo no banco de dados: " . $conn->error;
        }

        $conn->close();
    } else {
        echo "Desculpe, houve um erro ao enviar o seu arquivo.";
    }
?>
