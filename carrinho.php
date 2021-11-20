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
            $codprod = isset($_GET['prod']) ? preg_replace("/[^0-9]/", "", $_GET['prod']) : null;
            
            if (!isset($_SESSION['carrinho'])) {
                $_SESSION['carrinho'] = array();
            }

            if (!empty($codprod)){
                

                if (!isset($_SESSION['carrinho'][$codprod])) {
                    $_SESSION['carrinho'][$codprod] = 1;
                } else {
                    $_SESSION['carrinho'][$codprod] += 1;
                }
            }

            include 'listar_carrinho.php';

        ?> <!-- cabecalho e listar_carrinho -->

        <div class="row text-center" style="margin-top: 15px;">
            <h1>Total: R$ <?php echo number_format($totalCarrinho,2,',','.'); ?> </h1>
        </div>
        
        
        <div class="row text-center" style="margin-top: 15px;">
            <a href="index.php"><button class="btn btn-lg btn-primary">Continuar Comprando</button></a>
            <a href="finalizarCompra.php"><button class="btn btn-lg btn-success">Finalizar Compra</button></a>
        </div>

    </main>

    <?php include 'rodape.html' ?> <!-- rodape -->

</body>
</html>