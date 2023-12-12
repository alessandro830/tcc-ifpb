<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "marmita";

if(isset($_POST['matriculas'])){
    $matriculas = $_POST['matriculas'];

    $connect = mysqli_connect($servername, $username, $password, $dbname);
    foreach($matriculas as $mat) {
        $presenca = isset($_POST[$mat]) ? $_POST[$mat] : '';
        $quant = ($presenca == 'sim') ? 0 : 1;

        $insert = "INSERT INTO faltas (falta_aluno, matricula) VALUES (?, ?)";
        $stmt = mysqli_prepare($connect, $insert);
        mysqli_stmt_bind_param($stmt, "is", $quant, $mat);

        $result = mysqli_stmt_execute($stmt);

        if (!$result) {
            echo "Erro ao inserir falta para a matrícula $mat";
        }
        mysqli_stmt_close($stmt);
    }
    mysqli_close($connect);

    header('location:../funcionario.php');
} 
else {
    echo "<script>alert('Err010; por favor reporte o erro.');</script>";
    echo "<script>javascript:window.location='../funcionario.php';</script>";
}
?>
