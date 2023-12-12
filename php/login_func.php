<?php
session_start();

$mat = $_POST['matricula'];
$senha = $_POST['senha'];

if (empty($mat) || empty($senha)) {
    echo "<script>alert('Erro no login'); window.location.href='';</script>";
} 
else {
    $connect = mysqli_connect("localhost", "root", "", "marmita");

    if (mysqli_connect_errno()) {
        echo "<script>alert('Erro no login'); window.location.href='';</script>";
    }

    $select = "SELECT * FROM funcionario WHERE mat = ? AND senha = ?";
    $stmt = mysqli_prepare($connect, $select);
    mysqli_stmt_bind_param($stmt, "ss", $mat, $senha);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    if ($result->num_rows == 0) {
        echo "<script>alert('Senha e/ou matrícula incorreta(s), por favor, tente novamente.');
            window.location='../login_func.html';</script>";
    } else {
        $usuario = $result->fetch_assoc();

        $_SESSION['matricula'] = $usuario['mat'];
        $_SESSION['nome'] = $usuario['nome'];

        header("location:../funcionario.php");
    }

    mysqli_stmt_close($stmt);
    mysqli_close($connect);
}
?>
