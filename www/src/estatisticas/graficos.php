<?php

session_start();
include('../autenticacao/verifica_login.php');

require_once '../../vendor/autoload.php';

use \App\Infrastructure\Repository\EstatisticasDao;

//$produtosID = filter_input_array(INPUT_POST, FILTER_DEFAULT);

$EstatisticasDao = new EstatisticasDao();
$produtos = $produtoDao->read();




include __DIR__.'/includes/header.php';
include __DIR__.'/includes/listagem.php';
include __DIR__.'/includes/footer.php';

