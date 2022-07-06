<?php

require_once './sessao-usuarios.php';
require_once '../../vendor/autoload.php';

use \App\Domain\Model\Usuario;
use \App\Infrastructure\Repository\UsuarioDao;

define('TITLE','Cadastro de Usuarios');

if ($_SERVER["REQUEST_METHOD"] === 'POST'){


    if (empty($_POST['usuario']) || empty($_POST['senha']) || empty($_POST['email']) || empty($_POST['empresa']) || empty($_POST['permissao'])) {
        $_SESSION['time'] = time();
        $_SESSION['status'] = 'error';
        $_SESSION['typeError'] = 'Campos não preenchidos';
        header('location: usuarios.php');
        exit;
    }

    //Pega a entrada e retira todos os caracteres especiais
    function filtroEntrada($entrada)
    {
        $text = preg_replace("/[^a-zA-Z0-9]+/", "", $entrada);
        return $text;
    }

    //Compara se a entrada possui ou não caracteres especiais
    if ($_POST['usuario'] != filtroEntrada($_POST['usuario']) || $_POST['empresa'] != filtroEntrada($_POST['empresa'])) {
        $_SESSION['time'] = time();
        $_SESSION['status'] = 'error';
        $_SESSION['typeError'] = 'Caracteres inválidos';
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

    //Verifica se já existe este usuário no banco
    $verificacaoDao = new UsuarioDao();
    $row = $verificacaoDao->confirmaUsuario($_POST['usuario']);

    if($row != 0) {
        $_SESSION['time'] = time();
        $_SESSION['status'] = 'error';
        $_SESSION['typeError'] = 'Usuário ja cadastrado';
        header('location: usuarios.php');
        exit;
    }

    $usuario = new Usuario();
    $usuario->setUsuario($_POST['usuario']);
    $usuario->setSenha($_POST['senha']);
    $usuario->setEmail($_POST['email']);
    $usuario->setEmpresa($_POST['empresa']);
    $usuario->setPermissao($_POST['permissao']);

    $UsuarioDao = new UsuarioDao();
    $UsuarioDao->create($usuario);

    $_SESSION['time'] = time();
    $_SESSION['status'] = 'success';
    $_SESSION['typeSuccess'] = 'Usuário cadastrado';
    header('location: usuarios.php');
    exit;
}


include __DIR__.'/includes/header.php';
include __DIR__.'/includes/formulario.php';
include __DIR__.'/includes/footer.php';