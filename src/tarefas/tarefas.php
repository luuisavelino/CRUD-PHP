<?php

require_once './sessao-tarefas.php';
require_once '../../vendor/autoload.php';

use \App\Infrastructure\Repository\TarefaDao;

$TarefaDao = new TarefaDao();
$tarefas = $TarefaDao->read();

$tarefasID = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if (!empty($tarefasID['excluirTarefa'])) {
    if(isset($tarefasID['excluir'])) {
        $i=0;
        foreach($tarefasID['excluir'] as $id => $cliente) {
            $ids[$i] = $id;
            $i++;
        }

        $TarefaDao = new TarefaDao();
        $TarefaDao->delete($ids);
    
        $_SESSION['time'] = time();
        $_SESSION['status'] = 'success';
        $_SESSION['typeSuccess'] = 'Tarefas excluídas';
        header('location: tarefas.php');
        exit;  

    } else {
        $_SESSION['time'] = time();
        $_SESSION['status'] = 'error';
        $_SESSION['typeError'] = 'Nenhuma tarefa selecionada';
        header('location: tarefas.php');
        exit;  
    }
}




include __DIR__.'/includes/header.php';
include __DIR__.'/includes/listagem.php';
include __DIR__.'/includes/footer.php';

