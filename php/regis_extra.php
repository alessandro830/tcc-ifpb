<?php
$mat = $_POST['matricula'];
$nome = $_POST['nome'];
$dia = $_POST['date'];
$connect = mysqli_connect("localhost", "root", "", "marmita");
$insert = mysqli_prepare($connect, "INSERT INTO extras (mat, nome, dia) VALUES (?, ?, ?)");
mysqli_stmt_bind_param($insert, "iss", $mat, $nome, $dia);
mysqli_stmt_execute($insert);

echo header("location:../extras.php");

?>