<?php
    include ("cabecalho.php");
    include ("conecta.php");
    include ("banco-produto.php");

    $nome = $_POST["nome"];
    $preco = $_POST["preco"];
    $descricao = $_POST["descricao"];
    $categoria = $_POST["categoria_id"];

    if (array_key_exists("usado", $_POST)){
        $usado = "true";
    } else {
        $usado = "false";
    }

    if (insereProduto($conexao, $nome, $preco, $descricao, $categoria, $usado)){
        ?>
            <p class="text-success texto-centro">Produto <?=$nome?> de <?=$preco?> adicionado com sucesso!</p>
        <?php
    } else {
        $msg = mysqli_error($conexao);
        ?>
        <p class="text-danger texto-centro"><strong>Produto <?=$nome?> não foi adicionado ao banco de dados.</strong> <?=$msg?></p>
        <?php
        }

    include ("rodape.php");
?>