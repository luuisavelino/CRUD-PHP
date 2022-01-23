<?php

require_once './sessao-produtos.php';
require_once '../../vendor/autoload.php';

use \App\Domain\Model\Produto;
use \App\Infrastructure\Repository\ProdutoDao;

define('TITLE','Cadastro de Produto');

if ($_SERVER["REQUEST_METHOD"] === 'POST'){

    if (empty($_POST['codigo']) || empty($_POST['nome']) || empty($_POST['preco']) || empty($_POST['quantidade']) || empty($_POST['descricao'])) {
        $_SESSION['time'] = time();
        $_SESSION['status'] = 'error';
        $_SESSION['typeError'] = 'Campos não preenchidos';
        header('location: produtos.php');
        exit;
    }

    //Pega a entrada e retira todos os caracteres especiais
    function filtroEntrada($entrada)
    {
        $text = preg_replace("/[^a-zA-Z0-9]+/", "", $entrada);
        return $text;
    }

    //Compara se a entrada possui ou não caracteres especiais
    if ($_POST['nome'] != filtroEntrada($_POST['nome']) || $_POST['descricao'] != filtroEntrada($_POST['descricao'])) {
        $_SESSION['time'] = time();
        $_SESSION['status'] = 'error';
        $_SESSION['typeError'] = 'Caracteres inválidos';
        header('location: tarefas.php');
        exit;
    }

    //Pega a entrada e deixa somente números
    function filtroEntradaNumero($entrada)
    {
        $text = preg_replace("/[^0-9]+/", "", $entrada);
        return $text;
    }

    //Compara se a entrada possui somente números
    if ($_POST['codigo'] != filtroEntradaNumero($_POST['codigo']) || $_POST['preco'] != filtroEntradaNumero($_POST['preco']) || $_POST['quantidade'] != filtroEntradaNumero($_POST['quantidade'])) {
        $_SESSION['time'] = time();
        $_SESSION['status'] = 'error';
        $_SESSION['typeError'] = 'Caracteres inválidos';
        header('location: tarefas.php');
        exit;
    }



    $produto = new Produto();
    $produto->setCodigo($_POST['codigo']);
    $produto->setNome($_POST['nome']);
    $produto->setPreco($_POST['preco']);
    $produto->setQuantidade($_POST['quantidade']);
    $produto->setDescricao($_POST['descricao']);

    $ProdutoDao = new ProdutoDao();
    $ProdutoDao->create($produto);

    $_SESSION['time'] = time();
    $_SESSION['status'] = 'success';
    $_SESSION['typeSuccess'] = 'Novo produto cadastrado';
    header('location: produtos.php');
    exit;

}


include __DIR__.'/includes/header.php';
include __DIR__.'/includes/formulario.php';
include __DIR__.'/includes/footer.php';