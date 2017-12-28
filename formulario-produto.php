<?php
include ("cabecalho.php");
include ("conecta.php");
include ("banco-categoria.php");

$categorias = listarCategorias($conexao);
?>
        <h1>Cadastro de Produtos</h1>

        <form class="form-horizontal" action="adiciona-produto.php" method="post">
            <div class="form-group">
                <label for="nome" class="col-sm-1 control-label">Nome</label>
                <div class="col-sm-8">
                    <input class="form-control" id="nome" name="nome" type="text"/>
                </div>
            </div>

            <div class="form-group">
                <label for="preco" class="col-sm-1 control-label">Preço</label>
                <div class="col-sm-5">
                    <input class="form-control" id="preco" name="preco" type="number"/>
                </div>
            </div>

            <div class="form-group">
                <label for="descricao" class="col-sm-1 control-label">Descrição</label>
                <div class="col-sm-5">
                    <textarea class="form-control" id="descricao" name="descricao" type="text"></textarea>
                </div>
            </div>

            <div class="form-group">
                <label for="categoria" class="col-sm-1 control-label">Categoria</label>
                <div class="col-sm-2">

                    <select name="categoria_id" class="form-control">
                        <?php foreach ($categorias as $categoria): ?>
                            <option value="<?=$categoria['id']?>"> <?=$categoria['nome']?> </option>
                        <?php endforeach; ?>
                    </select>

                </div>
            </div>

            <div class="form-group">
                <label for="usado" class="col-sm-1 control-label">Usado</label>
                <div class="col-sm-5">
                    <input id="usado" name="usado" type="checkbox" value="true">
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-1 col-sm-10">
                    <input class="btn btn-primary" type="submit" value="Salvar"/>
                </div>
            </div>
        </form>
<?php include("rodape.php");