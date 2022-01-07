<?php

require __DIR__.'/vendor/autoload.php';

use \App\Model\{Produto, ProdutoDao};

$produtos = ProdutoDao::read();

//echo "<pre>"; print_r($produtos[0]['id']); echo "</pre>"; exit;
//if(empty($produtos)){echo "sem info;}

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/listagem.php';
include __DIR__.'/includes/footer.php';

