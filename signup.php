<?php
    if (isset($_POST['enviar'])){
        $mensagens = [];

        if (empty($_POST['nome']) || strlen(trim($_POST['nome'])) > 130 || ctype_space($_POST['nome']) || !preg_match("/^[a-zA-ZÀ-ú\s]+$/", $_POST['nome'])){
            array_push($mensagens, 'O nome deve ter até 130 caracteres contendo apenas letras.');
        } else { $inputNome = $_POST['nome']; }

        if (empty($_POST['email']) || strlen(trim($_POST['email'])) > 75 || !preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $_POST['email'])){
            array_push($mensagens, 'Email inválido.');
        } else { $inputEmail = $_POST['email']; }

        if (empty($_POST['senha']) || strlen($_POST['senha']) < 8 || strlen($_POST['senha']) > 60){
            array_push($mensagens, 'Sua senha deve ter entre 8 e 60 caracteres.');
        } else { $inputSenha = password_hash($_POST['senha'], PASSWORD_BCRYPT   ); }

        if (empty($_POST['endereco']) || strlen(trim($_POST['endereco'])) > 150 || !preg_match("/^[a-zA-ZÀ-ú\s]+$/", $_POST['endereco'])){
            array_push($mensagens, 'O endereço deve ter até 150 caracteres e conter apenas letras.');
        } else { $inputEndereco = $_POST['endereco']; }

        if (empty($_POST['numero']) || strlen(trim($_POST['numero'])) > 5){
            array_push($mensagens, 'O número do endereço deve ter até 5 casas.');
        } else { $inputNumero = $_POST['numero']; }

        if (empty($_POST['cep']) || strlen(trim($_POST['cep'])) != 9){
            array_push($mensagens, 'O CEP não foi preenchido completamente.');
        } else { $inputCep = $_POST['cep']; }

        if (empty($_POST['cidade']) || strlen(trim($_POST['cidade'])) > 150 || !preg_match("/^[a-zA-ZÀ-ú\s]+$/", $_POST['cidade'])){
            array_push($mensagens, 'A cidade deve ter até 150 caracteres e conter apenas letras.');
        } else { $inputCidade = $_POST['cidade']; }
        
        if (empty($_POST['uf']) || strlen(trim($_POST['uf'])) != 2 || !preg_match("/^[a-zA-ZÀ-ú\s]+$/", $_POST['uf'])){
            array_push($mensagens, 'O UF deve ter 2 caracteres.');
        } else { $inputUf = strtoupper($_POST['uf']); }

        if (empty($mensagens))
        {
            include 'conexao.php';

            $consulta = $cn -> query("SELECT Email FROM tbUsuario WHERE Email = '".addslashes($inputEmail)."';");

            $resultado = $consulta -> fetch();

            if (!empty($resultado)){
                $mensagens = 'Email já cadastrado';
            }
            else{
                $insersao = $cn -> query("CALL spInsertUsuario('".$inputNome."', '".$inputEmail."', '".$inputSenha."', false, ".$inputNumero.", '".$inputEndereco."', '".$inputCep."', '".$inputCidade."', '".$inputUf."');");
                header('location:index.php');
            }
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
    <script src="jquery.mask.js"></script>
    <script>
        $(document).ready(function(){
            $("#cep").mask("00000-000");
        });

        $(document).ready(function(){
            $("#uf").mask("SS");
        });
    </script>
</head>
<body>
    <?php include 'navbar.php';?> <!-- conexao e navbar -->

    <main id="main" style="padding-bottom: 15px;">

        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-4 col-sm-offset-4" style="margin-top: 12px;">
                    <h2>Cadastro de novo Cliente</h2>
                    <form name="signup" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                        <div class="form-group">
                            <label for="nome">Nome</label>
                            <input name="nome" type="text" class="form-control" id="nome" value="<?php if(isset($_POST['nome'])){ echo trim(htmlentities($_POST['nome'])); } ?>">
                        </div>
                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <input name="email" type="text" class="form-control" id="email" value="<?php if(isset($_POST['email'])){ echo trim(htmlentities($_POST['email'])); } ?>">
                        </div>
                        <div class="form-group">
                            <label for="senha">Senha</label>
                            <input name="senha" type="password" class="form-control" id="senha" value="<?php if(isset($_POST['senha'])){ echo trim(htmlentities($_POST['senha'])); } ?>">
                        </div>
                        <div class="form-group">
                            <label for="endereco">Endereço</label>
                            <input name="endereco" type="text" class="form-control" id="endereco" value="<?php if(isset($_POST['endereco'])){ echo trim(htmlentities($_POST['endereco'])); } ?>">
                        </div>
                        <div class="form-group">
                            <label for="numero">Número</label>
                            <input name="numero" type="number" class="form-control" id="numero" value="<?php if(isset($_POST['numero'])){ echo trim(htmlentities($_POST['numero'])); } ?>">
                        </div>
                        <div class="form-group">
                            <label for="cep">CEP</label>
                            <input name="cep" type="text" class="form-control" id="cep" value="<?php if(isset($_POST['cep'])){ echo trim(htmlentities($_POST['cep'])); } ?>">
                        </div>
                        <div class="form-group">
                            <label for="cidade">Cidade</label>
                            <input name="cidade" type="text" class="form-control" id="cidade" value="<?php if(isset($_POST['cidade'])){ echo trim(htmlentities($_POST['cidade'])); } ?>">
                        </div>
                        <div class="form-group">
                            <label for="uf">UF</label>
                            <input name="uf" type="text" class="form-control" id="uf" value="<?php if(isset($_POST['uf'])){ echo trim(htmlentities($_POST['uf'])); } ?>" style="text-transform: uppercase;">
                        </div>
                        <button name="enviar" type="submit" class="btn btn-lg btn-default">
                            Cadastrar
                        </button>
                        <a href="login.php" style="margin-left: 2%">
                            Já tenho cadastro
                        </a>
                    </form>
                    <?php if(isset($_POST['nome'])){ foreach($mensagens as $mensagem){ echo $mensagem.'<br />'; } } ?>
                </div>
            </div>
        </div>

    </main>
	
	<?php include 'rodape.html' ?>

</body>
</html>