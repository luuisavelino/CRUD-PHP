<?php
session_start();

$mensagem = '';
if(isset($_SESSION['status'])){
  switch ($_SESSION['status']) {
    case 'error':
      $mensagem = '<div class="alert alert-danger">'.$_SESSION['typeError'].'. Ação não executada!</div>';
      break;
  }
}

//include('conexao.php');
require_once '../../vendor/autoload.php';
use \App\Infrastructure\Repository\UsuarioDao;


if ($_SERVER["REQUEST_METHOD"] === 'POST'){


    if (empty($_POST['usuario']) || empty($_POST['senha'])) {
        header('location: login.php?status=error');
        exit;
    }

    $loginDao = new UsuarioDao();
    $row = $loginDao->login($_POST['usuario'], md5($_POST['senha']));

	
	if($row == 1) {
		$_SESSION['usuario'] = $_POST['usuario'];
		header('Location: ../../index.php');
		exit();
	} else {
		$_SESSION['nao_autenticado'] = true;
		header('Location: login.php?status=error');
		exit();
	}

}

include __DIR__.'/telaLogin.php';
