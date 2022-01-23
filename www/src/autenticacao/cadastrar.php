<?php

session_start();

require_once '../../vendor/autoload.php';

use \App\Domain\Model\Usuario;
use \App\Infrastructure\Repository\UsuarioDao;

if ($_SERVER["REQUEST_METHOD"] === 'POST'){

    //Verifica se todos os campos foram preenchidos
    if (empty($_POST['usuario']) || empty($_POST['senha']) || empty($_POST['email']) ||empty($_POST['empresa'])) {
        header('location: cadastrar.php?status=error');
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
        header('location: cadastrar.php?status=error');
        exit;
    }

    //Confirmação de senha
    if ($_POST['senha'] != $_POST['senhaConfirmada']) {
        header('location: cadastrar.php?status=error');
        exit;
    }

    //Filtro de email
    $email = $_POST['email'];
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header('location: cadastrar.php?status=error');
        exit;
    }

    //Verifica se já existe este usuário no banco
    $verificacaoDao = new UsuarioDao();
    $row = $verificacaoDao->confirmaUsuario($_POST['usuario']);

    if($row != 0) {
        header('Location: cadastrar.php?status=error');
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

    header('location: ./login.php');
    exit;

}

include __DIR__.'/telaCadastrar.php';