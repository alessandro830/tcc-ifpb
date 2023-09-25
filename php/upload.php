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
        alert('ERR04:Erro no upload do arquivo.');<script>";
        echo "<script>javascript:window.location='../falta_justificativa.php';</script>";
        exit;
    }

    // Verificar o tipo de arquivo e o tamanho
    if (!in_array($imageFileType, $allowedFileTypes) || $_FILES["arquivo"]["size"] > $maxFileSize) {
        echo "<script>
        alert('desculpe o arquivo enviado não é um pdf ou é muito grande (tamanho limite de 5MB)');<script>";
        echo "<script>javascript:window.location='../falta_justificativa.php';</script>";
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        echo "<script>
        alert('ERR05: Arquivo não enviado');";
        echo "<script>javascript:window.location='../falta_justificativa.php';</script>";
    } else {
        if (move_uploaded_file($_FILES["arquivo"]["tmp_name"], $targetFile)) {
            echo "<script> alert('O arquivo " . basename($_FILES["arquivo"]["name"]) . " foi enviado.')</script>;";
            echo "<script>javascript:window.location='../falta_justificativa.php';</script>";

            // Conexão com o banco de dados
            $servername = "localhost";
            $username = "root";
            $password = "usbw";
            $dbname = "marmita";

            $conn = new mysqli($servername, $username, $password, $dbname);

// Usar consulta preparada para evitar injeção de SQL
$stmt = $conn->prepare("SELECT * FROM faltas WHERE matricula = ?");
$stmt->bind_param("s", $matricula);
$stmt->execute();
$result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // Atualizar o caminho do arquivo para o aluno existente
            $stmt = $conn->prepare("UPDATE faltas SET caminho = ? WHERE matricula = ?");
            $stmt->bind_param("ss", $caminho_A, $matricula);

            if ($stmt->execute()) {
                echo "O caminho do arquivo foi atualizado no banco de dados.";
            } else {
                echo "<script>alert('Erro ao atualizar o caminho do arquivo no banco de dados " . $stmt->error;
            }
        } else {
            // Inserir um novo aluno com a matrícula e caminho do arquivo
            $stmt = $conn->prepare("UPDATE faltas SET caminho = ? WHERE matricula = ?;");
            $stmt->bind_param("ss",  $caminho_A,$matricula);

            if ($stmt->execute()) {
                echo "O caminho do arquivo foi salvo no banco de dados.";
            } else {
                echo "Erro ao salvar o caminho do arquivo no banco de dados: " . $stmt->error;
            }
        }

        $stmt->close();
        $conn->close();

        }
    }
}
?>
