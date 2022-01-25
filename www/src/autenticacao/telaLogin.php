<?php
session_start();
?>

<!DOCTYPE html>
<html>
    
    <head>
        <meta charset="utf-8">
        <title>Sign In</title>       
        <link rel="stylesheet" href="../css/login.css">
    </head>
    

    <body>
        <div class="wrapper fadeInDown">
            <div id="formContent">
                <?php
                if (time() - $_SESSION['time'] > 10) { // sessão iniciada há mais de 10 segundos
                unset($_SESSION['time']);
                unset($_SESSION['status']);
                unset($_SESSION['typeError']);
                unset($_SESSION['typeSuccess']);
                }


                $mensagem = '';
                if(isset($_SESSION['time'])){
                    switch ($_SESSION['status']) {
                        case 'success':
                        echo '<div class="alert alert-success">Ação executada com sucesso! '.$_SESSION['typeSuccess'].'.</div>';
                        break;

                        case 'error':
                        echo "<pre>"; print_r(('<div class="alert alert-danger">'.$_SESSION['typeError'].'. Ação não executada!</div>')); echo "</pre>"; exit;
                        echo '<div class="alert alert-danger">'.$_SESSION['typeError'].'. Ação não executada!</div>';
                        break;
                    }
                }
                ?>
            </div>


            <div id="formContent">

            <a href="./login.php"><h2 class="active"> Sign In </h2></a>
            <a href="./cadastrar.php"><h2 class="inactive underlineHover">Sign Up </h2></a>
        
        
            <form action="./login.php" method="POST">
                
                <input name="usuario" type="text" class="fadeIn second"  placeholder="usuário">
                <input name="senha" type="password" required="required" class="fadeIn third" placeholder="senha">
                <input type="submit" class="fadeIn fourth" value="Log In">
                
            </form>

            </div>
        </div>
    </body>

</html>