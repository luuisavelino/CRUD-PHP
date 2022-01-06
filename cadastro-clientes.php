<?php

require_once 'vendor/autoload.php';

define('TITLE','Cadastro de Cliente');


use \App\Model\{Cliente, ClienteDao};


if ($_SERVER["REQUEST_METHOD"] === 'POST'){


    if (empty($_POST['nome']) || empty($_POST['empresa'])) {
        header('location: cadastro-clientes.php');
        exit;
    }

    $cliente = new Cliente();
    $cliente->setNome($_POST['nome']);
    $cliente->setEmpresa($_POST['empresa']);

    $ClienteDao = new ClienteDao();
    $ClienteDao->create($cliente);

    header('location: clientes.php?status=success');
    exit;

}


include __DIR__.'/includes/header.php';
include __DIR__.'/includes/formulario.php';
include __DIR__.'/includes/footer.php';