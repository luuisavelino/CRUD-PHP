<?php

require_once './sessao-produtos.php';
require_once '../../vendor/autoload.php';

use \App\Domain\Model\{Produto, Estatisticas, AtualizarCodigo};
use \App\Infrastructure\Repository\{ProdutoDao, EstatisticasDao};

define('TITLE','Edição de Produto');

if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
    $_SESSION['time'] = time();
    $_SESSION['status'] = 'error';
    $_SESSION['typeError'] = 'ID do produto inválido';
    header('location: produtos.php');
    exit;
}

$produtoSelecionadoDao = new ProdutoDao();
$produtoSelecionado = $produtoSelecionadoDao->readProduto($_GET['id']);
$codigoProdutoSelecionado = $produtoSelecionado[0]['codigo'];


if(empty($produtoSelecionado)){
    $_SESSION['time'] = time();
    $_SESSION['status'] = 'error';
    $_SESSION['typeError'] = 'Nenhum produto selecionado';
    header('location: produtos.php');
    exit;
}


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
        $text = preg_replace("/[^a-zA-Z0-9 ]+/", "", $entrada);
        return $text;
    }

    //Compara se a entrada possui ou não caracteres especiais
    if ($_POST['nome'] != filtroEntrada($_POST['nome']) || $_POST['descricao'] != filtroEntrada($_POST['descricao'])) {
        $_SESSION['time'] = time();
        $_SESSION['status'] = 'error';
        $_SESSION['typeError'] = 'Caracteres inválidos';
        header('location: produtos.php');
        exit;
    }

    //Pega a entrada e deixa somente números e ponto
    function filtroEntradaNumero($entrada)
    {
        $text = preg_replace("/[^0-9\.]+/", "", $entrada);
        return $text;
    }

    //Compara se a entrada possui somente números
    if ($_POST['codigo'] != filtroEntradaNumero($_POST['codigo']) || $_POST['preco'] != filtroEntradaNumero($_POST['preco']) || $_POST['quantidade'] != filtroEntradaNumero($_POST['quantidade'])) {
        $_SESSION['time'] = time();
        $_SESSION['status'] = 'error';
        $_SESSION['typeError'] = 'Caracteres inválidos';
        header('location: produtos.php');
        exit;
    }

    $produto = new Produto();
    $produto->setId($_GET['id']);
    $produto->setCodigo($_POST['codigo']);
    $produto->setNome($_POST['nome']);
    $produto->setPreco($_POST['preco']);
    $produto->setQuantidade($_POST['quantidade']);
    $produto->setDescricao($_POST['descricao']);

    $ProdutoDao = new ProdutoDao();
    $ProdutoDao->update($produto);


    //Cadastrando ação no estoque
    if ($_POST['codigo'] != $codigoProdutoSelecionado) {
        
        $atualizarCodigo = new AtualizarCodigo();
        $atualizarCodigo->setCodigoAntigo($codigoProdutoSelecionado);
        $atualizarCodigo->setCodigo($_POST['codigo']);
        
        $EstatisticasDao = new EstatisticasDao();
        $EstatisticasDao->update($atualizarCodigo);

        if ($_POST['preco'] == $produtoSelecionado[0]['preco'] && $_POST['quantidade'] == $produtoSelecionado[0]['quantidade']) {
            
            echo "<pre>"; print_r($_POST['quantidade']); echo "</pre>";
            echo "<pre>"; print_r($produtoSelecionado[0]['quantidade']); echo "</pre>"; exit;

            $_SESSION['time'] = time();
            $_SESSION['status'] = 'success';
            $_SESSION['typeSuccess'] = 'Produto editado';
            header('location: produtos.php');
            exit;
        }
    }

    if ($_POST['preco'] != $produtoSelecionado[0]['preco'] || $_POST['quantidade'] != $produtoSelecionado[0]['quantidade']) {
        
        $estatisticas = new Estatisticas();
        $estatisticas->setCodigo($_POST['codigo']);
        $estatisticas->setPreco($_POST['preco']);
        $estatisticas->setQuantidade($_POST['quantidade']);
        
        $EstatisticasDao = new EstatisticasDao();
        $EstatisticasDao->create($estatisticas);

    }

    $_SESSION['time'] = time();
    $_SESSION['status'] = 'success';
    $_SESSION['typeSuccess'] = 'Produto editado';
    header('location: produtos.php');
    exit;
}

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/formulario.php';
include __DIR__.'/includes/footer.php';