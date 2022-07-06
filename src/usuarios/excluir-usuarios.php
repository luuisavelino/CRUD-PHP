<?php

require_once './sessao-usuarios.php';
require_once '../../vendor/autoload.php';

use \App\Infrastructure\Repository\UsuarioDao;

if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
    $_SESSION['time'] = time();
    $_SESSION['status'] = 'error';
    $_SESSION['typeError'] = 'Email inválido';
    header('location: usuarios.php');
    exit;
}

$UsuarioDao = new UsuarioDao();
$usuarioSelecionado = $UsuarioDao->readUsuario($_GET['id']);

if (isset($_POST['excluir'])){

    if ([$_GET['id']][0] == 1) {
        $_SESSION['time'] = time();
        $_SESSION['status'] = 'error';
        $_SESSION['typeError'] = 'Não é possível excluir o usuário root';
        header('location: usuarios.php');
        exit; 
    }
    
    $UsuarioDao = new UsuarioDao();
    $UsuarioDao->delete([$_GET['id']]);

    $_SESSION['time'] = time();
    $_SESSION['status'] = 'success';
    $_SESSION['typeSuccess'] = 'Usuário excluído';
    header('location: usuarios.php');
    exit;

}

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/exclusao.php';
include __DIR__.'/includes/footer.php';