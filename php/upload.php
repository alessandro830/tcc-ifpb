<?php
session_start();
$matricula = $_SESSION['matricula'];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $targetDir = "../arquivos/justificativa/";
    $targetFile = $targetDir . basename($_FILES["arquivo"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
    $allowedFileTypes = array("pdf");
    $maxFileSize = 5 * 1024 * 1024; // 5 MB
    $caminho_A = $targetFile;

    // Verificar se o upload ocorreu sem erros
    if ($_FILES["arquivo"]["error"] !== UPLOAD_ERR_OK) {
        echo "<script>
        alert('ERR04:Erro no upload do arquivo.');";
        echo "javascript:window.location='../falta_justificativa.php';</script>";
        exit;
    }

    // Verificar o tipo de arquivo e o tamanho
    if (!in_array($imageFileType, $allowedFileTypes) || $_FILES["arquivo"]["size"] > $maxFileSize) {
        echo "<script>
        alert('desculpe o arquivo enviado não é um pdf ou é muito grande (tamanho limite de 5MB)');";
        echo "javascript:window.location='../falta_justificativa.php';</script>";
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        echo "<script>
        alert('ERR05: Arquivo não enviado');";
        echo "javascript:window.location='../falta_justificativa.php';</script>";
    } else {
        if (move_uploaded_file($_FILES["arquivo"]["tmp_name"], $targetFile)) {
            echo "<script> alert('O arquivo " . basename($_FILES["arquivo"]["name"]) . " foi enviado.')</script>;";
            echo "javascript:window.location='../falta_justificativa.php';</script>";

            // Conexão com o banco de dados
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "marmita";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                echo "<script> alert('ERR06: falha ou tentar conectar-se, ". $conn->connect_error"')</script>";
                echo "javascript:window.location='../falta_justificativa.php';</script>";
            }


            // Usar consulta preparada para evitar injeção de SQL
            $stmt = $conn->prepare("INSERT INTO alunos (caminho) VALUES (?)");
            $stmt->bind_param("s", $caminho_A);

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
