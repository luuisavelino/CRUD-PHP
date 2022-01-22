<?php

session_start();
include('../autenticacao/verifica_login.php');

require_once '../../vendor/autoload.php';
use \App\Infrastructure\Repository\UsuarioDao;

$permissaoUsuario = new UsuarioDao();
$permissao = $permissaoUsuario->read($fields = 'permissao', $where = "usuario = '{$_SESSION['usuario']}'");

if($permissao[0]['permissao'] == 'usuario') {
	header('Location: ../autenticacao/login.php');
	exit();
}