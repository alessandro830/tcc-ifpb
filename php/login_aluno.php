<?php
session_start();  
$matricula = $_SESSION['matricula'];
$mat = $_POST['matricula'];
$senha = $_POST['senha'];

if(empty($mat) || empty($senha)) {
    echo "<script> alert('erro no login');
        window.location.href='index.html';
    </script>";
}
else {
    $connect = mysqli_connect("localhost","root","usbw","marmita");
    $select = "select * from alunos a where a.matricula='" . $mat . "' and a.senha='". $senha. "'";
    $sql_query = $connect->query($select) or die ("Falha na execução do código SQL");
    $result = mysqli_query($connect, $select);

    if($result -> num_rows == 0) {

        echo "<script>
        alert('senha e/ou matricula incorreta(s), por favor tente novamente.');";
        echo "javascript:window.location='../login_aluno.html';</script>";  
        
    }
    else {

        $usuario = $sql_query->fetch_assoc();

        if (!isset($_SESSION)) {
            session_start();
        }

        $_SESSION['matricula'] = $usuario['matricula'];
        $_SESSION['nome'] = $usuario['nome'];

        header("location:../aluno.php");
    }
    }
?>