<?php 
    session_start();
    if (empty($_SESSION['privilegio']) || $_SESSION['privilegio'] != true){
        header('location:index.php');
        return;
    }

	//$consultaFabric -> $cn -> query("SELECT * FROM tbFabricante");
	//$consultaDepart -> $cn -> query("SELECT * FROM tbDepartamento");
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
			<div class="col-sm-4 col-sm-offset-4">
				<h2>Inclusão de Produtos</h2>
				<form method="post" action="insprod.php" name="incluiProd" enctype="multipart/form-data">
					<div class="form-group">
						<label for="sltdepart">Departamento</label>
						<select name="sltdepart" class="form-control">
							<option value="">Selecione</option>
							<option value=""></option>					
						</select>
					</div>
					<div class="form-group">
						<label for="txthardware">Nome do Hardware</label>
						<input name="txthardware" type="text" class="form-control" required id="txtlivro">
					</div>
					<div class="form-group">
						<label for="sltfabric">Fabricante</label>
						<select name="sltfabric" class="form-control">
							<option value="">Selecione</option>
							<option value=""></option>
						</select>
					</div>
					<div class="form-group">
						<label for="txtespec">Especificações</label>
						<textarea name="txtespec" rows="5" class="form-control"
						placeholder="especificação:valor;
						especificação:valor; ..."></textarea>
					</div>
					<div class="form-group">
						<label for="txtpreco">Preço</label>
						<input name="txtpreco" type="text" class="form-control" required id="txtpreco">
					</div>
					<div class="form-group">
						<label for="txtqtde">Quantidade em Estoque</label>
						<input name="txtqtde" type="number" class="form-control" required id="txtqtde">
					</div>
					<div class="form-group">
						<label for="txtfoto1">Foto Principal</label>
						<input name="txtfoto1" type="file" accept="image/*" class="form-control" required id="txtfoto1">
					</div>
					<div class="form-group">
						<label for="sltlanc">Lançamento?</label>
						<select class="form-control" name="sltlanc">
							<option value="">Selecione</option>
							<option value="true">Sim</option>
							<option value="false">Não</option>					  
						</select>
					</div>
					<button type="submit" class="btn btn-lg btn-default">
						<span class="glyphicon glyphicon-pencil"> Cadastrar </span>
					</button>
				</form>
			</div>
		</div>

	</div>
	</main>

    <?php include 'rodape.html' ?> <!-- rodape -->

</body>
</html>