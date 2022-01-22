<?php

require_once './sessao-usuarios.php';
require_once '../../vendor/autoload.php';

use \App\Infrastructure\Repository\UsuarioDao;

$UsuarioDao = new UsuarioDao();
$usuarios = $UsuarioDao->read();

$usuariosID = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if (!empty($usuariosID['excluirUsuario'])) {
    if(isset($usuariosID['excluir'])) {
        $i=0;
        foreach($usuariosID['excluir'] as $id => $usuario) {
            $ids[$i] = $id;
            $i++;
        }

        $UsuarioDao = new UsuarioDao();
        $UsuarioDao->delete($ids);
    
        header('location: usuarios.php?status=success');
        exit;

    } else {
        header('location: usuarios.php?status=error');
    }
}




include __DIR__.'/includes/header.php';
include __DIR__.'/includes/listagem.php';
include __DIR__.'/includes/footer.php';

