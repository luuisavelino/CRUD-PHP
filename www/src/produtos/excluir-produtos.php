<?php

require_once './sessao-produtos.php';
require_once '../../vendor/autoload.php';

use \App\Infrastructure\Repository\ProdutoDao;


if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
    $_SESSION['time'] = time();
    $_SESSION['status'] = 'error';
    $_SESSION['typeError'] = 'ID do produto inválido';
    header('location: produtos.php');
    exit;
}

$produtoDao = new ProdutoDao();
$produtoSelecionado = $produtoDao->readCliente($_GET['id']);


if (isset($_POST['excluir'])){

    $ProdutoDao = new ProdutoDao();
    $ProdutoDao->delete([$_GET['id']]);

    $_SESSION['time'] = time();
    $_SESSION['status'] = 'success';
    $_SESSION['typeSuccess'] = 'Produto excluído';
    header('location: produtos.php');
    exit;
}

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/exclusao.php';
include __DIR__.'/includes/footer.php';