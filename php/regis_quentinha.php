<?php
$seg = $_POST['segunda'];
$ter = $_POST['terca'];
$qua = $_POST['quarta'];
$qui = $_POST['quinta'];
$sex = $_POST['sexta'];
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
$connect = mysqli_connect("localhost","root","","marmita");
$insert = "insert into alunos (segunda, terça, quarta, quinta, sexta) values('$seg','$ter','$qua','$qui','$sex')";
$result = mysqli_query($connect,$insert);
?>