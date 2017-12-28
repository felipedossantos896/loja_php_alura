<?php
    include ('cabecalho.php');
    include ('conecta.php');
    include ('banco-produto.php');

    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $preco = $_POST['preco'];
    $descricao = $_POST['descricao'];
    $categoria = $_POST['categoria'];

    if(array_key_exists('usado', $_POST)){
        $usado = "true";
    } else {
        $usado = "false";
    }
?>

<?php
    if (alterarProduto($conexao, $id, $nome, $preco, $descricao, $categoria, $usado)){ ?>
        <p class="text-success texto-centro">Produto <?= $nome ?>, R$ <?= $preco ?> alterado com sucesso!</p>
    <?php
    } else {
        $msg = mysqli_error($conexao); ?>

        <p class="text-danger texto-centro">Produto <?= $nome ?> não foi alterado! <?= $msg ?></p><?php
    }
?>

<?php include ('rodape.php'); ?>