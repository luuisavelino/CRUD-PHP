<?php
session_start();

require_once '../../vendor/autoload.php';
use \App\Infrastructure\Repository\UsuarioDao;


if ($_SERVER["REQUEST_METHOD"] === 'POST'){


    if (empty($_POST['usuario']) || empty($_POST['senha'])) {
      $_SESSION['time'] = time();
      $_SESSION['status'] = 'error';
      $_SESSION['typeError'] = 'Campos não preenchidos';
      var_dump($_SESSION['typeError']);
      header('location: login.php');
      exit;
    }

    $loginDao = new UsuarioDao();
    $row = $loginDao->login($_POST['usuario'], md5($_POST['senha']));

	
	if($row == 1) {
		$_SESSION['usuario'] = $_POST['usuario'];
		header('Location: ../../index.php');
		exit;
	} else {
		$_SESSION['nao_autenticado'] = true;
    $_SESSION['time'] = time();
    $_SESSION['status'] = 'error';
    $_SESSION['typeError'] = 'Usuário ou senha incorretos';
    header('location: login.php');
    exit;
	}

}

include __DIR__.'/telaLogin.php';
