<?php

require_once 'vendor/autoload.php';

use \App\Model\{Produto, ProdutoDao};


if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
    header('location: produtos.php?status=error');
    exit;
}

$ProdutoSelecionado = ProdutoDao::readCliente($_GET['id']);


if (isset($_POST['excluir'])){

    $ProdutoDao = new ProdutoDao();
    $ProdutoDao->delete($_GET['id']);

    header('location: produtos.php?status=success');
    exit;
}

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/exclusao.php';
include __DIR__.'/includes/footer.php';