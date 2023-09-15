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
    if ($_POST['opc'] == 1) {
        $updateQuery001 = "UPDATE alunos SET segunda = 'sim' WHERE matricula = " . $_SESSION['matricula'];
    }
    elseif ($_POST['opc'] == 2) {
        $updateQuery001 = "UPDATE alunos SET segunda = 'nao' WHERE matricula = " . $_SESSION['matricula'];
    }
    $result = mysqli_query($connect, $updateQuery001);
}

if (isset($_POST['terca'])) {
    if ($_POST['opc'] == 1) {
        $updateQuery002 = "UPDATE alunos SET terca = 'sim' WHERE matricula = " . $_SESSION['matricula'];
    }
    elseif ($_POST['opc'] == 2) {
        $updateQuery002 = "UPDATE alunos SET terca = 'nao' WHERE matricula = " . $_SESSION['matricula'];
    }
    $result = mysqli_query($connect, $updateQuery002);
}

if (isset($_POST['quarta'])) {
    if ($_POST['opc'] == 1) {
        $updateQuery003 = "UPDATE alunos SET quarta = 'sim' WHERE matricula = " . $_SESSION['matricula'];
    }
    elseif ($_POST['opc'] == 2) {
        $updateQuery003 = "UPDATE alunos SET quarta = 'nao' WHERE matricula = " . $_SESSION['matricula'];
    }
    $result = mysqli_query($connect, $updateQuery003);
}

if (isset($_POST['quinta'])) {
    if ($_POST['opc'] == 1) {
        $updateQuery004 = "UPDATE alunos SET quinta = 'sim' WHERE matricula = " . $_SESSION['matricula'];
    }
    elseif ($_POST['opc'] == 2) {
        $updateQuery004 = "UPDATE alunos SET quinta = 'nao' WHERE matricula = " . $_SESSION['matricula'];
    }
    $result = mysqli_query($connect, $updateQuery004);
}

if (isset($_POST['sexta'])) {
    if ($_POST['opc'] == 1) {
        $updateQuery005 = "UPDATE alunos SET sexta = 'sim' WHERE matricula = " . $_SESSION['matricula'];
    }
    elseif ($_POST['opc'] == 2) {
        $updateQuery005 = "UPDATE alunos SET sexta = 'nao' WHERE matricula = " . $_SESSION['matricula'];
    }
    $result = mysqli_query($connect, $updateQuery005);
}
if($result){
    header("location:../aluno.php");
}
else {
    echo "<script>alert('Algo deu errado, por favor tente novamente.');</script>";
    echo "<script>javascript:window.location='../aluno.php';</script>";
}
?>