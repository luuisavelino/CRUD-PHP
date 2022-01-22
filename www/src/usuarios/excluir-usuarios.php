<?php

require_once './sessao-usuarios.php';
require_once '../../vendor/autoload.php';

use \App\Infrastructure\Repository\UsuarioDao;

if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
    $_SESSION['status'] = 'error';
    $_SESSION['typeError'] = 'Email inválido';
    header('location: usuarios.php');
    exit;
}

$UsuarioDao = new UsuarioDao();
$usuarioSelecionado = $UsuarioDao->readUsuario($_GET['id']);

if (isset($_POST['excluir'])){

    $UsuarioDao = new UsuarioDao();
    $UsuarioDao->delete([$_GET['id']]);

    $_SESSION['status'] = 'success';
    $_SESSION['typeSuccess'] = 'Cliente excluído';
    header('location: usuarios.php');
    exit;

}

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/exclusao.php';
include __DIR__.'/includes/footer.php';