<?php
session_start();
?>

<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <title>CHALLENGE</title>
        <link rel="stylesheet" href="./src/css/style-index.css">
    </head>

    <body>
        <ul>
            <li data-text="Login"><a <?php 
                                        if($_SESSION['usuario']){
                                            echo (''); 
                                        } else { echo ('class="red" '); } 
                                        ?>href="./src/autenticacao/login.php"><p>Login</p></a></li>

            <li data-text="Sobre"><a href="#">Sobre</a></li>
            <li data-text="Usuarios"><a href="./src/usuarios/usuarios.php">Usuarios</a></li>
            <li data-text="Produtos"><a href="./src/produtos/produtos.php">Produtos</a></li>
            <li data-text="Tarefas"><a href="./src/tarefas/tarefas.php">Tarefas</a></li>
            <li data-text="Graficos"><a href="./src/estatisticas/graficos.php">Graficos</a></li>
            <li data-text="Contato"><a href="contato.html">Contato</a></li>
            
            <li data-text="Sair"><a <?php 
                                        if($_SESSION['usuario']){
                                            echo ('class="red" '); 
                                        } else { echo (''); } 

                                        ?>href="./src/autenticacao/logout.php"><p>Sair</p></a></li>

        </ul>
    </body>

</html>