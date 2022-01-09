<?php

require_once '../../vendor/autoload.php';

use \App\Infrastructure\Repository\ClienteDao;

$ClienteDao = new ClienteDao();

$clientes = $ClienteDao->read();

//echo "<pre>"; print_r($clientes[0]['id']); echo "</pre>"; exit;
//if(empty($clientes)){echo "ta vaziokkkkk";}

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/listagem.php';
include __DIR__.'/includes/footer.php';

