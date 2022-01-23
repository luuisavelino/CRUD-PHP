<?php

require_once './sessao-tarefas.php';
require_once '../../vendor/autoload.php';


use \App\Infrastructure\Repository\TarefaDao;


if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
    $_SESSION['time'] = time();
    $_SESSION['status'] = 'error';
    $_SESSION['typeError'] = 'ID da tarefa inválido';
    header('location: tarefas.php');
    exit;  
}

$TarefaDao = new TarefaDao();
$tarefaSelecionada = $TarefaDao->readTarefa($_GET['id']);


if (isset($_POST['excluir'])){

    $TarefaDao = new TarefaDao();
    $TarefaDao->delete([$_GET['id']]);

    $_SESSION['time'] = time();
    $_SESSION['status'] = 'success';
    $_SESSION['typeSuccess'] = 'Tarefa excluída';
    header('location: tarefas.php');
    exit;  

}


include __DIR__.'/includes/header.php';
include __DIR__.'/includes/exclusao.php';
include __DIR__.'/includes/footer.php';