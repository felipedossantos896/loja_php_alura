<?php include ("cabecalho.php") ?>
<?php
    include ("conecta.php");
    include ("banco-produto.php");

    $produtos = listaProdutos($conexao);
?>

<?php
    if (array_key_exists("removido", $_GET) && $_GET["removido"]=true){
?>      <p class="alert alert-success">Produto removido com sucesso!</p>
<?php } ?>

<table class="table table-striped">

    <thead>
        <tr>
            <th>Id</th>
            <th>Nome</th>
            <th>Preço</th>
            <th>Descrição</th>
            <th>Categoria</th>
            <th></th>
        </tr>
    </thead>
    <?php
        foreach ($produtos as $produto):
    ?>
    <tbody>
        <tr>
            <td><?= $produto["id"] ?></td>
            <td><?= $produto["nome"] ?></td>
            <td><?= $produto["preco"] ?></td>
            <td><?= substr($produto["descricao"], 0, 40) ?></td>
            <td><?= $produto["categoria_nome"] ?></td>
            <td><a class="btn btn-primary" href="altera-formulario-produto.php?id=<?= $produto['id'] ?>">alterar</a></td>
            <td>
                <form action="remove-produto.php" method="post">
                    <input type="hidden" name="id" value="<?=$produto['id']?>">
                    <button class="btn btn-danger" title="deletar">deletar</button>
                </form>
            </td>
        </tr>
    </tbody>
    <?php
        endforeach;
    ?>
</table>

<?php include ("rodape.php") ?>
