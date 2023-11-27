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
        if($presenca == 'sim'){
            $quant = 0;
            $insert = "INSERT INTO faltas(falta_aluno, matricula) VALUES ('$quant','$mat')";
            $result = mysqli_query($connect, $insert);
        } else {
            $quant = 1;
            $insert = "INSERT INTO faltas(falta_aluno, matricula) VALUES ('$quant','$mat')";
            $result = mysqli_query($connect, $insert);
        }
    }
    header('location:../funcionario.php');
} 
else {
    echo "<script>alert('Err010; por favor reporte o erro.');</script>";
    echo "<script>javascript:window.location='../funcionario.php';</script>";
}
?>
