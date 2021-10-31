<?php 
    session_start();
    if (empty($_SESSION['privilegio']) || $_SESSION['privilegio'] != true){
        header('location:index.php');
        return;
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
    <?php 
        include 'conexao.php';
        include 'navbar.php'
    ?> <!-- conexao e navbar -->   

    <main id="main">
	
    <?php include 'cabecalho.html'; ?>
	
	<div class="container-fluid">
	
		<div class="row">
            <div class="col-sm-4 col-sm-offset-4 text-center">
				<h2>Área administrativa</h2>	
                <a href="./formHardware.php"><button type="submit" class="btn btn-block btn-lg btn-primary">
                    Incluir Produto</button></a>
                <a href=""><button type="submit" class="btn btn-block btn-lg btn-warning">
					Alterar / Excluir Produto</button>
                <a href=""><button type="submit" class="btn btn-block btn-lg btn-success">
					Vendas</button>
                <a href=""><button type="submit" class="btn btn-block btn-lg btn-danger">
					Sair da àrea administrativa</button>
			</div>
		</div>
	</div>
	</main>

    <?php include 'rodape.html' ?> <!-- rodape -->

</body>
</html>