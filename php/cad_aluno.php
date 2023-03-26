<?php
$mat = $_POST['matricula'];
$nome = $_POST['nome'];
$senha = $_POST['senha'];
if(isset($mat) && isset($nome) && isset($senha)) {
$connect = mysqli_connect("localhost","root","","marmita");
$insert = "insert into alunos (matricula, nome, senha) values('$mat','$nome','$senha')";
$result = mysqli_query($connect,$insert);
echo header("location:../aluno.html");
}

else {
    echo "<script>
        alert('erro no cadastro por favor tente novamente');";
    echo "javascript:window.location='../index.html';</script>";
}
?>