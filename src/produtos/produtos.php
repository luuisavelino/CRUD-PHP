<?php

require_once './sessao-produtos.php';
require_once '../../vendor/autoload.php';

use \App\Infrastructure\Repository\ProdutoDao;

$produtoDao = new ProdutoDao();
$produtos = $produtoDao->read();

$produtosID = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if (!empty($produtosID['excluirProduto'])) {
    if(isset($produtosID['excluir'])) {
        $i=0;
        foreach($produtosID['excluir'] as $id => $produto) {
            $ids[$i] = $id;
            $i++;
        }
        
        $ProdutoDao = new ProdutoDao();
        $ProdutoDao->delete($ids);
    
        $_SESSION['time'] = time();
        $_SESSION['status'] = 'success';
        $_SESSION['typeSuccess'] = 'Produtos excluidos';
        header('location: produtos.php');
        exit;

    } else {
        $_SESSION['time'] = time();
        $_SESSION['status'] = 'error';
        $_SESSION['typeError'] = 'Nenhum produto selecionado';
        header('location: produtos.php');
        exit;
    }
}

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/listagem.php';
include __DIR__.'/includes/footer.php';

