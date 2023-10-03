<?php
$mat = $_POST['matricula'];
$nome = $_POST['nome'];
$senha = $_POST['senha'];

if (isset($mat) && isset($nome) && isset($senha)) {
    $connect = mysqli_connect("localhost", "root", "", "marmita");
    $insert = "INSERT INTO alunos (matricula, nome, senha) VALUES ('$mat', '$nome', '$senha')";
    $result1 = mysqli_query($connect, $insert);
    if ($result1) {
        $insert2 = "INSERT INTO quent_dias (matricula) VALUES ('$mat')";
        $result2 = mysqli_query($connect, $insert2);
        if ($result2) {
            echo header("location:../login_aluno.html");
        } else {
            echo "Erro ao inserir na tabela quent_dias: " . mysqli_error($connect);
        }
    } else {
        echo "Erro ao inserir na tabela alunos: " . mysqli_error($connect);
    }
} else {
    echo "<script>
        alert('Erro no cadastro, por favor, tente novamente');
        window.location='../cad_aluno.html';
    </script>";
}
?>
