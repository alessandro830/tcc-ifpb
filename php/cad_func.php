<?php
$mat = $_POST['matricula'];
$nome = $_POST['nome'];
$senha = $_POST['senha'];
if(isset($mat) && isset($nome) && isset($senha)) {
$connect = mysqli_connect("localhost","root","usbw","marmita");
$insert = "insert into funcionario (mat, nome, senha) values('$mat','$nome','$senha')";
$result = mysqli_query($connect,$insert);
echo header("location:../login_func.html");
}

else {
    echo "<script>
        alert('erro no cadastro por favor tente novamente');";
    echo "javascript:window.location='../cad_func.html';</script>";
}
?>