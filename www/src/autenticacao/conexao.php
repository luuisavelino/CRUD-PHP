<?php
define('HOST', 'mysql');
define('USUARIO', 'root');
define('SENHA', 'admin');
define('DB', 'challenge');

$conexao = mysqli_connect(HOST, USUARIO, SENHA, DB) or die ('Não foi possível conectar');