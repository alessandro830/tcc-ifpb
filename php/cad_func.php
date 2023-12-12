<?php
$mat = $_POST['matricula'];
$nome = $_POST['nome'];
$senha = $_POST['senha'];

if (isset($mat) && isset($nome) && isset($senha)) {
    $connect = mysqli_connect("localhost", "root", "", "marmita");

    if (mysqli_connect_errno()) {
        echo "<script>
                alert('Erro no cadastro, por favor, tente novamente');
                window.location='../cad_func.html';
            </script>";
    }

    $insertFunc = "INSERT INTO funcionario (mat, nome, senha) VALUES (?, ?, ?)";
    $stmt1 = mysqli_prepare($connect, $insertFunc);

    if ($stmt1) {
        mysqli_stmt_bind_param($stmt1, "sss", $mat, $nome, $senha);

        if (mysqli_stmt_execute($stmt1)) {
            header("location:../login_func.html");
        } else {
            echo "<script>
                alert('Erro no cadastro, por favor, tente novamente');
                window.location='../cad_func.html';
            </script>";
        }

        mysqli_stmt_close($stmt1);
    } else {
        echo "<script>
            alert('Erro no cadastro, por favor, tente novamente');
            window.location='../cad_func.html';
        </script>";
    }
    mysqli_close($connect);
} else {
    echo "<script>
        alert('Erro no cadastro, por favor, tente novamente');
        window.location='../cad_func.html';
    </script>";
}
?>
