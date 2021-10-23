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
        session_start();
        include 'conexao.php';
        include 'navbar.php'
    ?> <!-- conexao e navbar -->   

    <main id="main">

        <?php
            include 'cabecalho.html';
            $depart = isset($_GET['depart'])
                       ? str_replace('_', ' ', $_GET['depart'])
                       : (isset($_GET['busca']) 
                       ? $_GET['busca'] : 'home');
            $query = isset($_GET['busca'])
                       ? "CALL spBuscarPor('".addslashes($depart)."');"
                       : "CALL spConsultaProdsDepart('".substr(addslashes($depart), 0, 25)."');";
            include 'listar_produtos.php';
        
        // NAO TA LISTANDO OS PRODUTOS QUANDO TA PESQUISANDO PELA BARRA
        ?> <!-- cabecalho e listar_produtos -->
        
    </main>

    <?php include 'rodape.html' ?> <!-- rodape -->

</body>
</html>