<?php

require_once './sessao-tarefas.php';
require_once '../../vendor/autoload.php';


use \App\Domain\Model\Tarefa;
use \App\Infrastructure\Repository\TarefaDao;


define('TITLE','Edição de Tarefas');

if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
    $_SESSION['time'] = time();
    $_SESSION['status'] = 'error';
    $_SESSION['typeError'] = 'ID da tarefa inválido';
    header('location: tarefas.php');
    exit;  
}

$TarefaDao = new TarefaDao();
$tarefaSelecionada = $TarefaDao->readTarefa($_GET['id']);

if(empty($tarefaSelecionada)){
    $_SESSION['time'] = time();
    $_SESSION['status'] = 'error';
    $_SESSION['typeError'] = 'Nenhuma tarefa selecionada';
    header('location: tarefas.php');
    exit;  
}


if ($_SERVER["REQUEST_METHOD"] === 'POST'){

    if (empty($_POST['tarefa']) || empty($_POST['prazo']) || empty($_POST['status'])) {
        $_SESSION['time'] = time();
        $_SESSION['status'] = 'error';
        $_SESSION['typeError'] = 'Campos não preenchidos';
        header('location: tarefas.php');
        exit;  
    }

    //Pega a entrada e retira todos os caracteres especiais
    function filtroEntrada($entrada)
    {
        $text = preg_replace("/[^a-zA-Z0-9]+/", "", $entrada);
        return $text;
    }

    //Compara se a entrada possui ou não caracteres especiais
    if ($_POST['tarefa'] != filtroEntrada($_POST['tarefa']) || $_POST['prazo'] != filtroEntrada($_POST['prazo'])) {
        $_SESSION['time'] = time();
        $_SESSION['status'] = 'error';
        $_SESSION['typeError'] = 'Caracteres inválidos';
        header('location: tarefas.php');
        exit;
    }


    $tarefa = new Tarefa();
    $tarefa->setId($_GET['id']);
    $tarefa->setTarefa($_POST['tarefa']);
    $tarefa->setPrazo($_POST['prazo']);
    $tarefa->setStatus($_POST['status']);

    $TarefaDao = new TarefaDao();
    $TarefaDao->update($tarefa);

    $_SESSION['time'] = time();
    $_SESSION['status'] = 'success';
    $_SESSION['typeSuccess'] = 'Tarefa editada';
    header('location: tarefas.php');
    exit;  

}


include __DIR__.'/includes/header.php';
include __DIR__.'/includes/formulario.php';
include __DIR__.'/includes/footer.php';