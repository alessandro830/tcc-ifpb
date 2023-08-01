<?php
$mat = $_POST['matricula'];
$senha = $_POST['senha'];

if(empty($mat) || empty($senha)) {
    echo "<script> alert('erro no login');
        window.location.href='../login_func.html';
    </script>";
}
else {
    $connect = mysqli_connect("localhost","root","","marmita");
    $select = "select * from funcionario f where f.mat='" . $mat . "' and f.senha='". $senha. "'";
    $sql_query = $connect->query($select) or die ("Falha na execução do código SQL");
    $result = mysqli_query($connect, $select);

    if($result -> num_rows == 0) {
        echo "<script>
        alert('senha e/ou matricula incorreta(s), por favor tente novamente.');";
        echo "javascript:window.location='../login_func.html';</script>";  
    }
    else {

        $usuario = $sql_query->fetch_assoc();

        if (!isset($_SESSION)) {
            session_start();
        }

        $_SESSION['matricula'] = $usuario ['mat'];
        $_SESSION['nome'] = $usuario ['nome'];

        header('location:../funcionario.php');
    }
    }
?>