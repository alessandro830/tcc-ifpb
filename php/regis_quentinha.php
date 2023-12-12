<?php
session_start();

$matricula = $_SESSION['matricula'];
$connect = mysqli_connect("localhost", "root", "", "marmita");
$dias = ['segunda', 'terca', 'quarta', 'quinta', 'sexta'];

mysqli_begin_transaction($connect);

try {
    $update = "UPDATE quent_dias SET ";

    foreach ($dias as $dia) {
        $update .= "$dia = ?";

        if ($dia !== end($dias)) {
            $update .= ", ";
        }

        $updateP[] = isset($_POST[$dia]) ? 'sim' : 'nao';
    }
    $update .= " WHERE matricula = ?";
    $updateP[] = $matricula;
    $stmt = mysqli_prepare($connect, $update);
    mysqli_stmt_bind_param($stmt, str_repeat('s', count($updateP)), ...$updateP);
    $result = mysqli_stmt_execute($stmt);
    mysqli_commit($connect);

    if ($result) {
        header("location:../aluno.php");
    } 
    
    else {
        throw new Exception("Erro ao executar a consulta.");
    }
} 

catch (Exception $e) {
    mysqli_rollback($connect);
    
    echo "<script>alert('Algo deu errado, por favor tente novamente.');</script>";
    echo "<script>javascript:window.location='../aluno.php';</script>";
} 

finally {
    mysqli_stmt_close($stmt);
    mysqli_close($connect);
}
?>
