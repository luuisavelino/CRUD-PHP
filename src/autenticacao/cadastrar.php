<?php
session_start();

require_once '../../vendor/autoload.php';

use \App\Domain\Model\Usuario;
use \App\Infrastructure\Repository\UsuarioDao;

if ($_SERVER["REQUEST_METHOD"] === 'POST'){

    //Verifica se todos os campos foram preenchidos
    if (empty($_POST['usuario']) || empty($_POST['senha']) || empty($_POST['email']) ||empty($_POST['empresa'])) {
        $_SESSION['time'] = time();
        $_SESSION['status'] = 'error';
        $_SESSION['typeError'] = 'Campos não preenchidos';
        header('location: cadastrar.php');
        exit;
    }

    //Pega a entrada e retira todos os caracteres especiais
    function filtroEntrada($entrada)
    {
        $text = preg_replace("/[^a-zA-Z0-9]+/", "", $entrada);
        return $text;
    }

    //Compara se a entrada possui ou não caracteres especiais
    if ($_POST['usuario'] != filtroEntrada($_POST['usuario'])) {
        $_SESSION['time'] = time();
        $_SESSION['status'] = 'error';
        $_SESSION['typeError'] = 'Caracteres inválidos';
        header('location: cadastrar.php');
        exit;
    }

    //Confirmação de senha
    if ($_POST['senha'] != $_POST['senhaConfirmada']) {
        $_SESSION['time'] = time();
        $_SESSION['status'] = 'error';
        $_SESSION['typeError'] = 'Erro na confirmação da senha';
        header('location: cadastrar.php');
        exit;
    }

    //Filtro de email
    $email = $_POST['email'];
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['time'] = time();
        $_SESSION['status'] = 'error';
        $_SESSION['typeError'] = 'Email inválido';
        header('location: cadastrar.php');
        exit;
    }

    //Verifica se já existe este usuário no banco
    $verificacaoDao = new UsuarioDao();
    $row = $verificacaoDao->confirmaUsuario($_POST['usuario']);

    if($row != 0) {
        $_SESSION['time'] = time();
        $_SESSION['status'] = 'error';
        $_SESSION['typeError'] = 'Usuário já cadastrado';
        header('location: cadastrar.php');
        exit;
    }


    //Cria o novo usuário
    $usuario = new Usuario();
    $usuario->setUsuario($_POST['usuario']);
    $usuario->setSenha($_POST['senha']);
    $usuario->setEmail($_POST['email']);
    $usuario->setEmpresa($_POST['empresa']);

    $UsuarioDao = new UsuarioDao();
    $UsuarioDao->create($usuario);

    
    $_SESSION['time'] = time();
    $_SESSION['status'] = 'success';
    $_SESSION['typeSuccess'] = 'Usuário cadastrado';
    header('location: ./login.php');
    exit;


}

include __DIR__.'/telaCadastrar.php';