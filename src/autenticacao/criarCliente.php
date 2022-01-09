<?php

require_once '../../vendor/autoload.php';

use \App\Domain\Model\Usuario;
use \App\Infrastructure\Repository\UsuarioDao;

if ($_SERVER["REQUEST_METHOD"] === 'POST'){


    if (empty($_POST['nome']) || empty($_POST['email'])) {
        header('location: telaLogin.php?status=error');
        exit;
    }

    $usuario = new Usuario();
    $usuario->setNome($_POST['nome']);
    $usuario->setSenha($_POST['senha']);


    $UsuarioDao = new UsuarioDao();
    $UsuarioDao->create($usuario);

    header('location: ../../index.php?status=success');
    exit;

}
