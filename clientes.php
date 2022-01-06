<?php

require __DIR__.'/vendor/autoload.php';

use \App\Model\{Cliente, ClienteDao};

$clientes = ClienteDao::read();
//echo "<pre>"; print_r($clientes); echo "</pre>"; exit;

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/listagem.php';
include __DIR__.'/includes/footer.php';











/*/

$cliente = new \App\Model\Cliente();
$cliente->setNome('Jorge');
$cliente->setEmpresa('petrobras');

$ClienteDao = new \App\Model\ClienteDao();
$ClienteDao->create($cliente);

$ClienteDao->read();

foreach($ClienteDao->read() as $cliente):
    echo $cliente['nome']."<br>".$cliente['empresa']."<hr>";
endforeach;
/*/


/*/
$cliente = new \App\Model\Cliente();
$cliente->setId(3);
$cliente->setNome('Eita');
$cliente->setEmpresa('Laia');

$ClienteDao = new \App\Model\ClienteDao();
$ClienteDao->update($cliente);
$ClienteDao->read();

foreach($ClienteDao->read() as $cliente):
    echo $cliente['nome']."<br>".$cliente['empresa']."<hr>";
endforeach;
/*/


/*/
$ClienteDao = new \App\Model\ClienteDao();
$ClienteDao->delete(4);
$ClienteDao->read();

foreach($ClienteDao->read() as $cliente):
    echo $cliente['nome']."<br>".$cliente['empresa']."<hr>";
endforeach;
/*/