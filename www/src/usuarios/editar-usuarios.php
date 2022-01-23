<?php

require_once './sessao-usuarios.php';
require_once '../../vendor/autoload.php';

use \App\Domain\Model\Usuario;
use \App\Infrastructure\Repository\UsuarioDao;

define('TITLE','Edição de Usuario');

if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
    $_SESSION['time'] = time();
    $_SESSION['status'] = 'error';
    $_SESSION['typeError'] = 'ID de usuário inválido';
    header('location: usuarios.php');
    exit;
}

$UsuarioDao = new UsuarioDao();
$usuarioSelecionado = $UsuarioDao->readUsuario($_GET['id']);

if(empty($usuarioSelecionado)){
    $_SESSION['time'] = time();
    $_SESSION['status'] = 'error';
    $_SESSION['typeError'] = 'Nenhum usuário selecionado';
    header('location: usuarios.php');
    exit;
}

if ($_SERVER["REQUEST_METHOD"] === 'POST'){

    if (empty($_POST['usuario']) || empty($_POST['senha']) || empty($_POST['email']) || empty($_POST['empresa'])) {
        $_SESSION['time'] = time();
        $_SESSION['status'] = 'error';
        $_SESSION['typeError'] = 'Campos não preenchidos';
        header('location: usuarios.php');
        exit;
    }

    $email = $_POST['email'];
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['time'] = time();
        $_SESSION['status'] = 'error';
        $_SESSION['typeError'] = 'Email inválido';
        header('location: usuarios.php');
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
        $usuario->setPermissao($usuarioSelecionado[0]['permissao']);
    } else {
        $usuario->setPermissao($_POST['permissao']);
    }

    $UsuarioDao = new UsuarioDao();
    $UsuarioDao->update($usuario);

    $_SESSION['time'] = time();
    $_SESSION['status'] = 'success';
    $_SESSION['typeSuccess'] = 'Usuário editado';
    header('location: usuarios.php');
    exit;
}


include __DIR__.'/includes/header.php';
include __DIR__.'/includes/formulario.php';
include __DIR__.'/includes/footer.php';