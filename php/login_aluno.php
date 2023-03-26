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
    $select = "select * from alunos a where a.matricula='" . $mat . "' and a.senha='". $senha. "'";
    $result = mysqli_query($connect, $select);
    if($result -> num_rows == 0) {
        echo "<script>
        alert('senha e/ou matricula incorreta(s), por favor tente novamente.');";
        echo "javascript:window.location='../login_aluno.html';</script>";  
    }
    else {
        header('location:../aluno.html');
    }
    }
?>