<?php
session_start(); 

$seg = $_POST['segunda'];
$ter = $_POST['terca'];
$qua = $_POST['quarta'];
$qui = $_POST['quinta'];
$sex = $_POST['sexta'];
$matricula = $_SESSION['matricula'];

$connect = mysqli_connect("localhost","root","","marmita");

if (isset($_POST['segunda'])) {
    $updateQuery001 = "UPDATE quent_dias SET segunda = 'sim' WHERE matricula = " . $_SESSION['matricula'];
}
elseif (empty ($_POST['segunda'])){
    $updateQuery001 = "UPDATE quent_dias SET segunda = 'nao' WHERE matricula = " . $_SESSION['matricula'];
}
$result = mysqli_query($connect, $updateQuery001);


if (isset($_POST['terca'])) {
    $updateQuery002 = "UPDATE quent_dias SET terca = 'sim' WHERE matricula = " . $_SESSION['matricula'];
}
elseif (empty ($_POST['terca'])){
    $updateQuery002 = "UPDATE quent_dias SET terca = 'nao' WHERE matricula = " . $_SESSION['matricula'];
}
$result = mysqli_query($connect, $updateQuery002);


if (isset($_POST['quarta'])) {
    $updateQuery003 = "UPDATE quent_dias SET quarta = 'sim' WHERE matricula = " . $_SESSION['matricula'];
}
elseif (empty ($_POST['quarta'])){
    $updateQuery003 = "UPDATE quent_dias SET quarta = 'nao' WHERE matricula = " . $_SESSION['matricula'];
}
$result = mysqli_query($connect, $updateQuery003);


if (isset($_POST['quinta'])) {
    $updateQuery004 = "UPDATE quent_dias SET quinta = 'sim' WHERE matricula = " . $_SESSION['matricula'];
}
elseif (empty ($_POST['quinta'])){
    $updateQuery004 = "UPDATE quent_dias SET quinta = 'nao' WHERE matricula = " . $_SESSION['matricula'];
}
$result = mysqli_query($connect, $updateQuery004);


if (isset($_POST['sexta'])) {
    $updateQuery005 = "UPDATE quent_dias SET sexta = 'sim' WHERE matricula = " . $_SESSION['matricula'];
}
elseif (empty ($_POST['sexta'])){
    $updateQuery005 = "UPDATE quent_dias SET sexta = 'nao' WHERE matricula = " . $_SESSION['matricula'];
}
$result = mysqli_query($connect, $updateQuery005);


if($result){
    header("location:../aluno.php");
}
else {
    echo "<script>alert('Algo deu errado, por favor tente novamente.');</script>";
    echo "<script>javascript:window.location='../aluno.php';</script>";
}
?>