<?php
session_start();
$com = $_POST["comentario"];
$matricula = $_SESSION['matricula'];

$connect = mysqli_connect("localhost", "root", "", "marmita");

$insert = mysqli_prepare($connect, "UPDATE alunos SET feedback = ? WHERE matricula = ?");
mysqli_stmt_bind_param($insert, "ss", $com, $matricula);
mysqli_stmt_execute($insert);
header('location:../aluno.php');
?>
