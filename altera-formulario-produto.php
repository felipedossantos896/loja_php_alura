<?php
include ("cabecalho.php");
include ("conecta.php");
include ("banco-categoria.php");
include ("banco-produto.php");

$id = $_GET['id'];
$produto = buscarProduto($conexao, $id);
$categorias = listarCategorias($conexao);
$usado = $produto['usado'] ? "checked='checked'" : "";
?>
        <h1>Alteração de Produto</h1>

        <form class="form-horizontal" action="altera-produto.php" method="post">

            <input type="hidden" name="id" value="<?= $produto['id'] ?>">

            <div class="form-group">
                <label for="nome" class="col-sm-1 control-label">Nome</label>
                <div class="col-sm-8">
                    <input class="form-control" id="nome" name="nome" type="text" value="<?= $produto['nome'] ?>"/>
                </div>
            </div>

            <div class="form-group">
                <label for="preco" class="col-sm-1 control-label">Preço</label>
                <div class="col-sm-5">
                    <input class="form-control" id="preco" name="preco" type="number" value="<?= $produto['preco'] ?>"/>
                </div>
            </div>

            <div class="form-group">
                <label for="descricao" class="col-sm-1 control-label">Descrição</label>
                <div class="col-sm-5">
                    <textarea class="form-control" id="descricao" name="descricao" type="text"><?= $produto['descricao'] ?></textarea>
                </div>
            </div>

            <div class="form-group">
                <label for="categoria" class="col-sm-1 control-label">Categoria</label>
                <div class="col-sm-2">

                    <select name="categoria" class="form-control">
                        <?php foreach ($categorias as $categoria):
                            $isCategoria = $produto['categoria'] == $gategoria['id'];
                            $selecao = $isCategoria ? "selected='selected'" : "";
                        ?>
                            <option value="<?= $categoria['id'] ?>" <?= $selecao ?>>
                                <?= $categoria['nome'] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>

                </div>
            </div>

            <div class="form-group">
                <label for="usado" class="col-sm-1 control-label">Usado</label>
                <div class="col-sm-5">
                    <input id="usado" name="usado" type="checkbox" value="true" <?= $usado ?>>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-1 col-sm-10">
                    <input class="btn btn-primary" type="submit" value="Alterar"/>
                </div>
            </div>
        </form>
<?php include("rodape.php");