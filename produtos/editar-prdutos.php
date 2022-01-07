<?php

require_once 'vendor/autoload.php';

define('TITLE','Edição de Produto');

use \App\Model\{Produto, ProdutoDao};


if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
    header('location: produtos.php?status=error');
    exit;
}

$produtoSelecionado = ProdutoDao::readCliente($_GET['id']);

if(empty($clienteSelecionado)){
    header('location: produtos.php?status=error');
    exit;
}


if ($_SERVER["REQUEST_METHOD"] === 'POST'){

    if (empty($_POST['codigo']) || empty($_POST['nome']) || empty($_POST['preco']) || empty($_POST['descricao'])) {
        header('location: cadastrar-produtos.php');
        exit;
    }

    $produto = new Produto();
    $produto->setId($_GET['id']);
    $produto->setCodigo($_GET['codigo']);
    $produto->setNome($_POST['nome']);
    $produto->setPreco($_POST['preco']);
    $produto->setDescricao($_POST['descricao']);

    $ProdutoDao = new ProdutoDao();
    $ProdutoDao->update($produto);

    header('location: produtos.php?status=success');
    exit;

}


include __DIR__.'/includes/header.php';
include __DIR__.'/includes/formulario.php';
include __DIR__.'/includes/footer.php';