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
            if ($id == 1) {
                $_SESSION['time'] = time();
                $_SESSION['status'] = 'error';
                $_SESSION['typeError'] = 'Não é possível excluir o usuário root';
                header('location: usuarios.php');
                exit; 
            }
            $ids[$i] = $id;
            $i++;
        }

        $UsuarioDao = new UsuarioDao();
        $UsuarioDao->delete($ids);
    
        $_SESSION['time'] = time();
        $_SESSION['status'] = 'success';
        $_SESSION['typeSuccess'] = 'Clientes excluídos';
        header('location: usuarios.php');
        exit;

    } else {
        $_SESSION['time'] = time();
        $_SESSION['status'] = 'error';
        $_SESSION['typeError'] = 'Nenhum usuário selecionado';
        header('location: usuarios.php');
        exit;
    }
}

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/listagem.php';
include __DIR__.'/includes/footer.php';

