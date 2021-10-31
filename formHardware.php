<?php 
    session_start();
    if (empty($_SESSION['privilegio']) || $_SESSION['privilegio'] != true){
        header('location:index.php');
        return;
    }

	include 'conexao.php';

	$consultaFabric = $cn -> query("SELECT * FROM tbFabricante ORDER BY Nome;");
	$consultaDepart = $cn -> query("SELECT * FROM tbDepartamento ORDER BY Nome;");

	if (isset($_POST['enviar'])){
        $mensagens = [];

		if (empty($_POST['depart'])){
            array_push($mensagens, 'Selecione um departamento.');
        } else { $inputDepart = $_POST['depart']; }

		if (empty($_POST['nome']) || strlen(trim($_POST['nome'])) > 130 || ctype_space($_POST['nome'])){
            array_push($mensagens, 'O nome deve ter até 130 caracteres alfanuméricos.');
        } else { $inputNome = htmlentities($_POST['nome']); }
		
		if (empty($_POST['fabric'])){
            array_push($mensagens, 'Selecione uma fabricante.');
        } else { $inputFabric = $_POST['fabric']; }
		
		if (empty($_POST['espec']) || strlen(trim($_POST['espec'])) > 255 || ctype_space($_POST['espec'])){
			array_push($mensagens, 'Insira alguma(s) especificação(ões).');
		} else { 
			$inputEspec = 	str_replace(
							',""', '',
							str_replace(
								';', '","',
								str_replace(
									':', '":"',
									'{"'.htmlspecialchars($_POST['espec']).'"}'
									)
								)
							);
		
		}

		if (empty($_POST['preco'])){
            array_push($mensagens, 'Insira um preço.');
        } else { $inputPreco = str_replace(',', '.',str_replace('.', '',$_POST['preco'])); }
		
		if (empty($_POST['qnt']) || $_POST['qnt'] < 1){
            array_push($mensagens, 'Insira uma quantidade válida.');
        } else { $inputQnt = $_POST['qnt']; }

		if (empty($_FILES['foto'])){
            array_push($mensagens, 'Carregue uma imagem para o produto.');
        } else {
			$inputFoto = $_FILES['foto']; 
			$inputFoto['name'] = 	str_replace(' ', '_', $inputFoto['name']);
			$destinoFoto = 'img/hardwares/';
		}

		if (empty($_POST['lanc']) || ($_POST['lanc'] != 1 && $_POST['lanc'] != 0)){
            array_push($mensagens, 'Informe se o produto é lançamento.');
        } else { $inputLanc = $_POST['lanc']; }

		if (empty($mensagens))
        {
			try{
				preg_match("/\.(jpg|jpeg|png|gif){1}$/i", $inputFoto['name'], $extencao);

				$inserir = $cn -> query("CALL spInsertHardware('$inputNome', $inputDepart, $inputFabric, $inputPreco, 
				'$inputEspec', $inputQnt, $inputLanc, '".$inputFoto['name']."');");

				move_uploaded_file($inputFoto['tmp_name'], $destinoFoto.$inputFoto['name']);             
				$resizeObj = new resize($destinoFoto.$inputFoto['name']);
				$resizeObj -> resizeImage(300, 300, 'crop');
				$resizeObj -> saveImage($destinoFoto.$inputFoto['name'], 100);
			} catch(PDOException $e) {
				echo $e -> getMessage();
			} finally {
				header('Location:index.php');
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
</head>
<body>
    <?php 
        include 'navbar.php'
    ?> <!-- conexao e navbar -->   

    <main id="main">
	
    <?php include 'cabecalho.html'; ?>
	
	<div class="container-fluid">
	
		<div class="row">
			<div class="col-sm-4 col-sm-offset-4">
				<h2>Inclusão de Produtos</h2>
				<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" name="incluiProd" enctype="multipart/form-data">
					<div class="form-group">
						<label for="depart">Departamento</label>
						<select name="depart" class="form-control">
							<option value="">Selecione</option>
							<?php 
								while ($departamento = $consultaDepart -> fetch(PDO::FETCH_ASSOC)){
									echo '<option value="'.$departamento['CodDepartamento'].'">'.$departamento['Nome'].'</option>';
								}
							?>				
						</select>
					</div>
					<div class="form-group">
						<label for="nome">Nome do Hardware</label>
						<input name="nome" type="text" class="form-control" id="txtlivro">
					</div>
					<div class="form-group">
						<label for="fabric">Fabricante</label>
						<select name="fabric" class="form-control">
							<option value="">Selecione</option>
							<?php 
								while ($fabricante = $consultaFabric -> fetch(PDO::FETCH_ASSOC)){
									echo '<option value="'.$fabricante['CodFabricante'].'">'.$fabricante['Nome'].'</option>';
								}
							?>
						</select>
					</div>
					<div class="form-group">
						<label for="espec">Especificações</label>
						<textarea name="espec" rows="5" class="form-control"
						placeholder="especificação:valor;
						especificação:valor; ..."></textarea>
					</div>
					<div class="form-group">
						<label for="preco">Preço</label>
						<input name="preco" type="text" class="form-control" id="txtpreco">
					</div>
					<div class="form-group">
						<label for="qnt">Quantidade em Estoque</label>
						<input name="qnt" type="number" class="form-control" id="txtqtde">
					</div>
					<div class="form-group">
						<label for="foto">Foto Principal</label>
						<input name="foto" type="file" accept="image/*" class="form-control" id="txtfoto1">
					</div>
					<div class="form-group">
						<label for="lanc">Lançamento?</label>
						<select name="lanc" class="form-control">
							<option value="">Selecione</option>
							<option value="1">Sim</option>
							<option value="0">Não</option>					  
						</select>
					</div>
					<button name="enviar" type="submit" class="btn btn-lg btn-default">
						<span class="glyphicon glyphicon-pencil"> Cadastrar </span>
					</button>
				</form>
				<?php if(isset($_POST['nome'])){ foreach($mensagens as $mensagem){ echo $mensagem.'<br />'; } } ?>
			</div>
		</div>

	</div>
	</main>

    <?php include 'rodape.html' ?> <!-- rodape -->

</body>
</html>