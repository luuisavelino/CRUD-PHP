<?php

require_once './sessao-produtos.php';
require_once '../../vendor/autoload.php';

use \App\Infrastructure\Repository\{ProdutoDao, EstatisticasDao};


if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
    $_SESSION['time'] = time();
    $_SESSION['status'] = 'error';
    $_SESSION['typeError'] = 'ID do produto inválido';
    header('location: produtos.php');
    exit;
}

$produtoSelecionadoDao = new ProdutoDao();
$produtoSelecionado = $produtoSelecionadoDao->readProduto($_GET['id']);
$codigoProdutoSelecionado = $produtoSelecionadoDao->readProduto($_GET['id'])[0]['codigo'];


if (isset($_POST['excluir'])){

    $ProdutoDao = new ProdutoDao();
    $ProdutoDao->delete([$_GET['id']]);

    $EstatisticasDao = new EstatisticasDao();
    $EstatisticasDao->delete([$codigoProdutoSelecionado]);

    $_SESSION['time'] = time();
    $_SESSION['status'] = 'success';
    $_SESSION['typeSuccess'] = 'Produto excluído';
    header('location: produtos.php');
    exit;
}

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/exclusao.php';
include __DIR__.'/includes/footer.php';