<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="box">
            <?php
            $con = mysqli_connect("localhost", "root", "", "marmita");
            $select = "select * from alunos ";
            $result = mysqli_query($con, $select) or die (mysqli_error($con));
            while($linha = mysqli_fetch_array($result)){
                
                    echo "<h1>" . $linha['nome'] . "</h1>";


            }
            var_dump($result);
            ?>
        </div>
        <h1></h1>
</body>
</html>