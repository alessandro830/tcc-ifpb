<?php
session_start();
$matricula = $_SESSION['matricula'];
$just =$_POST['just'];
echo $just;
if($just != null ){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "marmita";

    $conn = new mysqli($servername, $username, $password, $dbname);

$stmt = $conn->prepare("SELECT * FROM faltas WHERE matricula = ?");
$stmt->bind_param("s", $matricula);
$stmt->execute();
$result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $stmt = $conn->prepare("UPDATE faltas SET caminho = ?, just_escrita =?  WHERE matricula = ?");
            $stmt->bind_param("sss", $caminho_A,$just,$matricula);

            if ($stmt->execute()) {
                header('location:../falta_justificativa.php');
            } else {
                echo "<script>alert('Erro ao atualizar o caminho do arquivo no banco de dados " . $stmt->error;
            }
        } else {
            $stmt = $conn->prepare("UPDATE faltas SET caminho = ? WHERE matricula = ?;");
            $stmt->bind_param("sss", $caminho_A, $just, $matricula);

    if ($stmt->execute()) {
        echo "<script>alert('O caminho do arquivo foi salvo no banco de dados.');</script>";
        echo "<script>javascript:window.location='../falta_justificativa.php';</script>";
    } else {
        "<script>alert('O caminho do arquivo foi salvo no banco de dados.');</script>";
        echo "Erro ao salvar o caminho do arquivo no banco de dados: " . $stmt->error;
    }
}
}else{

            $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "marmita";

                $conn = new mysqli($servername, $username, $password, $dbname);

            $stmt = $conn->prepare("SELECT * FROM faltas WHERE matricula = ?");
            $stmt->bind_param("s", $matricula);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {

                $stmt = $conn->prepare("UPDATE faltas SET caminho = ? WHERE matricula = ?");
                $stmt->bind_param("ss", $caminho_A, $matricula);

                if ($stmt->execute()) {
                    header('location:../falta_justificativa.php');
                } else {
                    echo "<script>alert('Erro ao atualizar o caminho do arquivo no banco de dados " . $stmt->error. ");</script>";
                }
            } else {

                $stmt = $conn->prepare("INSERT INTO faltas (matricula, caminho) VALUES (?, ?)");
                $stmt->bind_param("ss", $matricula, $caminho_A);

                if ($stmt->execute()) {
                    header('location:../falta_justificativa.php');
                } else {
                    echo "Erro ao salvar o caminho do arquivo no banco de dados: " . $stmt->error;
                }
            }
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $targetDir = "../arquivos/justificativa/";
                $targetFile = $targetDir . basename($_FILES["arquivo"]["name"]);
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
                $allowedFileTypes = array("pdf");
                $maxFileSize = 5 * 1024 * 1024; // 5 MB
                $caminho_A = $targetFile;

                if ($_FILES["arquivo"]["error"] !== UPLOAD_ERR_OK) {
                    echo "<script>alert('ERR04:Erro no upload do arquivo.');</script>";
                    echo "<script>javascript:window.location='../falta_justificativa.php';</script>";
                    exit;
                }

                if (!in_array($imageFileType, $allowedFileTypes) || $_FILES["arquivo"]["size"] > $maxFileSize) {
                    echo "<script>alert('desculpe o arquivo enviado não é um pdf ou é muito grande (tamanho limite de 5MB)');</script>";
                    echo "<script>javascript:window.location='../falta_justificativa.php';</script>";
                    $uploadOk = 0;
                }

                if ($uploadOk == 0) {
                    echo "<script>
                    alert('ERR05: Arquivo não enviado');</script>";
                    echo "<script>javascript:window.location='../falta_justificativa.php';</script>";
                } else {
                    if (move_uploaded_file($_FILES["arquivo"]["tmp_name"], $targetFile)) {
                        echo "<script> alert('O arquivo " . basename($_FILES["arquivo"]["name"]) . " foi enviado.')</script>;";
                        echo "<script>javascript:window.location='../falta_justificativa.php';</script>";

                        $servername = "localhost";
                        $username = "root";
                        $password = "";
                        $dbname = "marmita";

                        $conn = new mysqli($servername, $username, $password, $dbname);
            $stmt = $conn->prepare("SELECT * FROM faltas WHERE matricula = ?");
            $stmt->bind_param("s", $matricula);
            $stmt->execute();
            $result = $stmt->get_result();
                    if ($result->num_rows > 0) {

                        $stmt = $conn->prepare("UPDATE faltas SET caminho = ? WHERE matricula = ?");
                        $stmt->bind_param("ss", $caminho_A, $matricula);
                        if ($stmt->execute()) {
                            echo "O caminho do arquivo foi atualizado no banco de dados.";
                        } else {
                            echo "<script>alert('Erro ao atualizar o caminho do arquivo no banco de dados " . $stmt->error. ");</script>";
                        }
                    } else {
                        $stmt = $conn->prepare("INSERT INTO faltas (matricula, caminho) VALUES (?, ?)");
                        $stmt->bind_param("ss", $matricula, $caminho_A);

                        if ($stmt->execute()) {
                            header('location:../falta_justificativa.php');
                        } else {
                            echo "Erro ao salvar o caminho do arquivo no banco de dados: " . $stmt->error;
                        }
                    }
                    $stmt->close();
                    $conn->close();
                    }
                }
            }


        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href=""></a>
</body>
</html>