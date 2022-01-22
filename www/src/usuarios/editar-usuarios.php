<?php

session_start();
include('../autenticacao/verifica_login.php');

require_once '../../vendor/autoload.php';

use \App\Domain\Model\Usuario;
use \App\Infrastructure\Repository\UsuarioDao;


define('TITLE','Edição de Usuario');

if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
    header('location: usuarios.php?status=error');
    exit;
}

$UsuarioDao = new UsuarioDao();
$usuarioSelecionado = $UsuarioDao->readUsuario($_GET['id']);

if(empty($usuarioSelecionado)){
    header('location: usuarios.php?status=error');
    exit;
}

if ($_SERVER["REQUEST_METHOD"] === 'POST'){

    if (empty($_POST['usuario']) || empty($_POST['senha']) || empty($_POST['email']) || empty($_POST['empresa'])) {
        header('location: usuarios.php?status=error');
        exit;
    }

    $email = $_POST['email'];
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header('location: usuarios.php?status=error');
        exit;
    }

    $usuario = new Usuario();
    $usuario->setId($_GET['id']);
    $usuario->setUsuario($_POST['usuario']);
    
    if ("********" == $_POST['senha']) {
        $usuario->setSenha($usuarioSelecionado[0]['senha']);
    } else {
        $usuario->setSenha(md5($_POST['senha']));
    }

    $usuario->setEmail($_POST['email']);
    $usuario->setEmpresa($_POST['empresa']);

    if (empty($_POST['permissao'])) {
        $usuario->setPermissao($usuarioSelecionado[0]['usuario']);
    } else {
        $usuario->setPermissao($_POST['permissao']);
    }

    $UsuarioDao = new UsuarioDao();
    $UsuarioDao->update($usuario);

    header('location: usuarios.php?status=success');
    exit;
}


include __DIR__.'/includes/header.php';
include __DIR__.'/includes/formulario.php';
include __DIR__.'/includes/footer.php';