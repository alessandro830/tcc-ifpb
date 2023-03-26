<?php
$mat = $_POST['matricula'];
$senha = $_POST['senha'];

if(empty($mat) || empty($senha)) {
    echo "<script> alert('erro no login');
        window.location.href='index.php';
    </script>";
}
else {
    $connect = mysqli_connect("localhost","root","","marmita");
    $select = "select * from funcionario f where f.matricula='" . $mat . "' and f.senha='". $senha. "'";
    $result = mysqli_query($connect, $select);
    if($result -> num_rows == 0) {
        echo "<script>
        alert('senha e/ou matricula incorreta(s), por favor tente novamente.');";
        echo "javascript:window.location='../login_func.html';</script>";  
    }
    else {
        header('location:../#');
    }
    }
?>