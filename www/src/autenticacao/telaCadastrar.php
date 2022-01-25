<!DOCTYPE html>
<html>
    
    <head>
        <meta charset="utf-8">
        <title>Sign Up</title>
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
            <a href="./login.php"><h2 class="inactive underlineHover"> Sign In </h2></a>
            <a href="./cadastrar.php"><h2 class="active">Sign Up </h2></a>
        
            <form action="./cadastrar.php" method="POST">
                
                <input name="usuario" name="text" type="text" class="fadeIn second"  placeholder="Insira um nome de usuário">
                <input name="senha" type="password" class="fadeIn third" placeholder="Digite uma senha">
                <input name="senhaConfirmada" type="password" class="fadeIn third" placeholder="Repita a senha">
                <input name="email" name="text" type="text" class="fadeIn second"  placeholder="Insira seu email">
                <input name="empresa" name="text" type="text" class="fadeIn second"  placeholder="Insira o nome da sua empresa">
                <input type="submit" class="fadeIn fourth" value="Register">
                
            </form>
 
        
            </div>
        </div>
    </body>

</html>