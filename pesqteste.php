<?php
include_once "conexao.php";
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Pesquisar com PHP - Celke</title>
</head>

<body>

    <?php
    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    //var_dump($dados);
    ?>
    <h2>Pesquisar Usuário</h2>

    <form method="POST" action="">
        <label>Nome: </label>
        <input type="text" name="nome_usuario" placeholder="Digite o nome" value="<?php if(isset($pregao['nome_usuario'])){ echo $pregao['nome_usuario']; } ?>"><br><br>

        <input type="submit" name="pesqUsuario" id="pesqUsuario"><br><br>
    </form>

    <?php

    if (!empty($pregao['pesqUsuario'])) {
        $nome = "%" . $pregao['nome_usuario'] . "%";
        //$nome = "%Cesar%";

        $query_usuarios = "SELECT id, pregao, ata FROM produtos WHERE pregao LIKE pregao";
        $result_usuarios = $conn->prepare($query_usuarios);
        $result_usuarios->bindParam(':pregao', $pregao, PDO::PARAM_STR);

        $result_usuarios->execute();

        while ($row_usuario = $result_usuarios->fetch(PDO::FETCH_ASSOC)) {
            //var_dump($row_usuario);
            extract($row_usuario);
            echo "ID: $id <br>";
            echo "Nome: $pregao <br>";
            echo "E-mail: $ata <br>";

            echo "<hr>";
        }
    }



    ?>


</body>

</html>