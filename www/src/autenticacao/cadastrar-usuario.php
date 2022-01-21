<?php

require_once '../../vendor/autoload.php';

use \App\Domain\Model\Cliente;
use \App\Infrastructure\Repository\ClienteDao;


if ($_SERVER["REQUEST_METHOD"] === 'POST'){


    if (empty($_POST['usuario']) || empty($_POST['senha']) || empty($_POST['email']) ||empty($_POST['empresa'])) {
        header('location: telaCadastrar.php?status=error');
        exit;
    }

    if ($_POST['senha'] != $_POST['senhaConfirmada']) {
        header('location: telaCadastrar.php?status=error');
        exit;
    }

    $email = $_POST['email'];
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header('location: telaCadastrar.php?status=error');
        exit;
    }

    $verificacaoDao = new ClienteDao();
    $row = $verificacaoDao->confirmaUsuario($_POST['usuario']);

    if($row != 0) {
        header('Location: telaCadastrar.php?status=error');
        exit;
    }


    $cliente = new Cliente();
    $cliente->setNome($_POST['usuario']);
    $cliente->setSenha($_POST['senha']);
    $cliente->setEmail($_POST['email']);
    $cliente->setEmpresa($_POST['empresa']);

    $ClienteDao = new ClienteDao();
    $ClienteDao->create($cliente);

    header('location: ./telaLogin.php');
    exit;

}

include __DIR__.'/telaCadastrar.php';