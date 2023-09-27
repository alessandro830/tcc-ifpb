<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "marmita";
$presenca = $_POST['veio'];

    if($presenca == 'sim'){
        $quant = 0;
        $connect = mysqli_connect("localhost","root","","marmita");
        $insert = "insert into faltas(falta_aluno) values('$quant')";
        $result = mysqli_query($connect,$insert);
        header('location:../funcionario.php');
    }else{
        $quant = 1;
        $connect = mysqli_connect("localhost","root","","marmita");
        $insert = "insert into faltas(falta_aluno) values('$quant')";
        $result = mysqli_query($connect,$insert);
        
    }
      
?>
