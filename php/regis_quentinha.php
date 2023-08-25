<?php
session_start(); 

$seg = $_POST['segunda'];
$ter = $_POST['terca'];
$qua = $_POST['quarta'];
$qui = $_POST['quinta'];
$sex = $_POST['sexta'];
$matricula = $_SESSION['matricula'];

$connect = mysqli_connect("localhost","root","","marmita");

if (empty($seg)){
    $seg= 'não';
}
else{
    $seg='sim';
}
if (empty($ter)){
    $ter='nao';

}
else{
    $ter='sim';
}
if (empty($qua)){
    $qua='nao';
}
else{
    $qua='sim';
}
if (empty($qui)){
    $qui= 'não';
}
else{
    $qui= 'sim';
}
if (empty($sex)){
    $sex='nao';

}
else{
    $sex='sim';
}

$updateQuery = "UPDATE alunos SET segunda = '$segunda', terca = '$terca', quarta = '$quarta', quinta = '$quinta', sexta = '$sexta' WHERE matricula = $matricula";
$result = mysqli_query($connect,$insert);
?>