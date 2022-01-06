<?php

require __DIR__.'/vendor/autoload.php';

use \App\Model\{Cliente, ClienteDao};

$clientes = ClienteDao::read();

//echo "<pre>"; print_r($clientes[0]['id']); echo "</pre>"; exit;

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/listagem.php';
include __DIR__.'/includes/footer.php';





/*/
$ClienteDao = new \App\Model\ClienteDao();
$ClienteDao->delete(4);
$ClienteDao->read();

foreach($ClienteDao->read() as $cliente):
    echo $cliente['nome']."<br>".$cliente['empresa']."<hr>";
endforeach;
/*/