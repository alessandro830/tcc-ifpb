<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "marmita";
$presenca = $_POST['presenca'];

    if($presenca == 'true'){
        $quant = 0;
        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Falha na conexão com o banco de dados: " . $conn->connect_error);
        }else{
        $stmt = $conn->prepare("INSERT INTO alunos (falta_aluno) VALUES (?)");
        $stmt->bind_param("s", $quant);
        echo "<script>alert('Faltas Salvas');</script>";
        echo "<script>javascript:window.location='../funcionario.php';</script>";
        }
        $stmt->close();
        $conn->close();
    }else{
        $quant = 1;
        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Falha na conexão com o banco de dados: " . $conn->connect_error);
        }
        $stmt = $conn->prepare("INSERT INTO alunos (falta_aluno) VALUES (?)");
        $stmt->bind_param("s", $quant);
        echo $stmt;
        $stmt->close();
        $conn->close();
}
?>