<?php

require_once './sessao-usuarios.php';
require_once '../../vendor/autoload.php';

use \App\Infrastructure\Repository\UsuarioDao;

if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
    header('location: usuarios.php?status=error');
    exit;
}

$UsuarioDao = new UsuarioDao();
$usuarioSelecionado = $UsuarioDao->readUsuario($_GET['id']);

if (isset($_POST['excluir'])){

    $UsuarioDao = new UsuarioDao();
    $UsuarioDao->delete([$_GET['id']]);

    header('location: usuarios.php?status=success');
    exit;

}

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/exclusao.php';
include __DIR__.'/includes/footer.php';