<?php
function listaProdutos($conexao){
    $produtos = array();
    $resultado = mysqli_query($conexao, "select p.*, c.nome as categoria_nome from produtos as p join categorias as c on p.categoria_id = c.id");

    while ($produto = mysqli_fetch_assoc($resultado)){
        array_push($produtos, $produto);
    }

    return $produtos;
}

function buscarProduto($conexao, $id){
    $query = "select * from produtos where id = {$id}";
    $resultado = mysqli_query($conexao, $query);
    return mysqli_fetch_assoc($resultado);
}

function alterarProduto($conexao, $id, $nome, $preco, $descricao, $categoria, $usado){
    $query = "update produtos set nome = '{$nome}', preco = {$preco}, descricao = '{$descricao}', categoria = {$categoria}, usado = {$usado} where id = '{$id}'";
    return mysqli_query($conexao, $query);
}

function insereProduto($conexao, $nome, $preco, $descricao, $categoria, $usado){
    $query = "insert into produtos (nome, preco, descricao, categoria_id, usado) values('{$nome}', {$preco}, '{$descricao}', {$categoria}, {$usado})";
    $resultadoDaInsercao = mysqli_query($conexao, $query);
    return $resultadoDaInsercao;
}

function deletarProduto($conexao, $id){
    $query = "delete from produtos where id = {$id}";
    return mysqli_query($conexao, $query);
}
