<?php
    if (isset($_POST['enviar'])){
    
        $inputEmail = addslashes($_POST['email']);
        $inputSenha = $_POST['senha'];

        include 'conexao.php';

        $consulta = $cn -> query("SELECT CodUsuario, Senha, Privilegio FROM vwUsuario WHERE Email = '$inputEmail' LIMIT 1");
        
        $resultado = $consulta -> fetch();

        if (!empty($resultado)){
            if (password_verify($inputSenha, $resultado['Senha'])){
                session_start();
                ini_set('session.cookie_httponly', 1);
                session_regenerate_id();
                $_SESSION['id'] = $resultado['CodUsuario'];
                header('location:index.php');
                if ($resultado['Privilegio']){
                    $_SESSION['privilegio'] = $resultado['Privilegio'];
                }
            }
            else{
                $mensagem = '<p style="margin-top: 15px;">Senha incorreta</span>';
            }
        }
        else{
            $mensagem = '<p style="margin-top: 15px;">Email não cadastrado</span>';
        }
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <!-- CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- jQuery livraria -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- JavaScript compilado-->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php include 'navbar.php' ?> <!-- navbar -->
    
    <main id="main" style="padding-bottom: 15px;">

        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-4 col-sm-offset-4" style="margin-top: 12px;">
                    <h2>Login de Usuário</h2>
                    <form name="login" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input name="email" type="email" class="form-control" required id="email">
                        </div>
                        <div class="form-group">
                            <label for="senha">Senha</label>
                            <input name="senha" type="password" class="form-control" required id="senha">
                        </div>
                        <button name="enviar" type="submit" class="btn btn-lg btn-default">
                            Entrar
                        </button>
                        <a href="signup.php" style="margin-left: 2%">
                            Ainda não sou cadastrado
                        </a>
                    </form>
                        <?php if (isset($mensagem)){ echo $mensagem; } ?>
                </div>
            </div>
        </div>
        
	</main>

    <?php include 'rodape.html' ?> <!-- include rodape.html -->

</body>
</html>