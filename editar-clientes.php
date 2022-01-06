<?php

require_once 'vendor/autoload.php';

use \App\Model\{Cliente, ClienteDao};


if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
    header('location: clientes.php?status=error');
    exit;
  }






include __DIR__.'/includes/header.php';
include __DIR__.'/includes/formulario.php';
include __DIR__.'/includes/footer.php';