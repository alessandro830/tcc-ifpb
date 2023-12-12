<?php
$mat = $_POST['matricula'];
$nome = $_POST['nome'];
$senha = $_POST['senha'];

if (isset($mat) && isset($nome) && isset($senha)) {
    $connect = mysqli_connect("localhost", "root", "", "marmita");

    if (mysqli_connect_errno()) {
        echo "<script>
                alert('Erro no cadastro, por favor, tente novamente');
                window.location='../cad_aluno.html';
            </script>";
    }

    $insertAlunos = "INSERT INTO alunos (matricula, nome, senha) VALUES (?, ?, ?)";
    $stmt1 = mysqli_prepare($connect, $insertAlunos);
    mysqli_stmt_bind_param($stmt1, "sss", $mat, $nome, $senha);

    if (mysqli_stmt_execute($stmt1)) {
        $insertQuentDias = "INSERT INTO quent_dias (matricula) VALUES (?)";
        $stmt2 = mysqli_prepare($connect, $insertQuentDias);
        mysqli_stmt_bind_param($stmt2, "s", $mat);

        if (mysqli_stmt_execute($stmt2)) {
            header("location:../login_aluno.html");
            exit();
        } else {
            echo "<script>
            alert('Erro no cadastro, por favor, tente novamente');
            window.location='../cad_aluno.html';
            </script>";
        }
    } else {
        echo "<script>
        alert('Erro no cadastro, por favor, tente novamente');
        window.location='../cad_aluno.html';
        </script>";
    }
    mysqli_stmt_close($stmt1);
    mysqli_stmt_close($stmt2);
    mysqli_close($connect);
} else {
    echo "<script>
        alert('Erro no cadastro, por favor, tente novamente');
        window.location='../cad_aluno.html';
    </script>";
}
?>
