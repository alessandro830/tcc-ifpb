<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $targetDir = "arquivos/justificativa/";
    $targetFile = $targetDir . basename($_FILES["arquivo"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
    $allowedFileTypes = array("pdf");
    $maxFileSize = 5 * 1024 * 1024; // 5 MB
    $caminho_A = $targetFile;

    // Verificar se o upload ocorreu sem erros
    if ($_FILES["arquivo"]["error"] !== UPLOAD_ERR_OK) {
        echo "Erro ao fazer o upload do arquivo.";
        exit;
    }

    // Verificar o tipo de arquivo e o tamanho
    if (!in_array($imageFileType, $allowedFileTypes) || $_FILES["arquivo"]["size"] > $maxFileSize) {
        echo "Desculpe, o arquivo enviado não é um PDF válido ou é muito grande.";
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        echo "Desculpe, seu arquivo não foi enviado.";
    } else {
        if (move_uploaded_file($_FILES["arquivo"]["tmp_name"], $targetFile)) {
            echo "O arquivo " . basename($_FILES["file"]["name"]) . " foi enviado.";

            // Conexão com o banco de dados
            $servername = "localhost";
            $username = "root";
            $password = "usbw";
            $dbname = "marmita";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Falha na conexão com o banco de dados: " . $conn->connect_error);
            }

            // Usar consulta preparada para evitar injeção de SQL
            $stmt = $conn->prepare("INSERT INTO alunos (caminho) VALUES ($caminho_A)");
            $stmt->bind_param("s", $targetFile);

            if ($stmt->execute()) {
                echo "O caminho do arquivo foi salvo no banco de dados.";
            } else {
                echo "Erro ao salvar o caminho do arquivo no banco de dados.";
            }

            $stmt->close();
            $conn->close();
        } else {
            echo "Desculpe, houve um erro ao enviar o seu arquivo.";
        }
    }
}
?>
