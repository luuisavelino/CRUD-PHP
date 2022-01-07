<?php

require_once 'vendor/autoload.php';

define('TITLE','Edição de Cliente');

use \App\Model\{Cliente, ClienteDao};


if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
    header('location: clientes.php?status=error');
    exit;
}

$clienteSelecionado = ClienteDao::readCliente($_GET['id']);

if(empty($clienteSelecionado)){
    header('location: clientes.php?status=error');
    exit;
}


if ($_SERVER["REQUEST_METHOD"] === 'POST'){

    if (empty($_POST['nome']) || empty($_POST['empresa'])) {
        header('location: cadastro-clientes.php');
        exit;
    }

    $cliente = new Cliente();
    $cliente->setId($_GET['id']);
    $cliente->setNome($_POST['nome']);
    $cliente->setEmpresa($_POST['empresa']);

    $ClienteDao = new ClienteDao();
    $ClienteDao->update($cliente);

    header('location: clientes.php?status=success');
    exit;

}


include __DIR__.'/includes/header.php';
include __DIR__.'/includes/formulario.php';
include __DIR__.'/includes/footer.php';