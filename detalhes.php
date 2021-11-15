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
            
            if (empty($codprod)){
                include 'erro.html';
            } else {
                $query = "CALL spConsultaProduto($codprod);";
                $consulta = $cn -> query($query);
                $exibe = $consulta -> fetch(PDO::FETCH_ASSOC);

                if (empty($exibe)){
                    include 'erro.html';
                } else {
                    echo '<div class="container-fluid" style="margin: 0 5% 0 5%; padding-bottom: 5%;">';
                    echo    '<div class="row">';
                    echo        '<div class="departamento">';
                    echo            '<h1>Detalhes</h1>';
                    echo        '</div>';
                    echo        '<div class="col-sm-6 col-sm-offset-1" style="margin-left: 0;">';
                    echo            '<img src="img/hardwares/'.$exibe['Imagem'].'" class="img-responsive" style="width:100%; margin: 0 auto;">';
                    echo        '</div>';

                    echo        '<div class="col-sm-6">';
                    echo            '<h4>'.$exibe['Nome'].'</h4>';
                    echo            '<b>Fabricante: </b><p>'.$exibe['Fabricante'].'</p>';
                    echo            '<b>Especificações: </b>';
                    echo            '<ul>';
                    foreach(json_decode($exibe['Especificacoes']) as $item => $espec){
                    echo                '<li style="list-style-type: circle;">'.$item.' : '.$espec.'</li>';
                    }
                    echo            '</ul>';
                    echo            '<h4 style="font-weight: bold; font-size: 24px;">R$ '.number_format($exibe['Valor'], 2, ',', '.').'</h4>';
                    
                    if (!empty($_SESSION['privilegio'])){
                        if ($_SESSION['privilegio'] == true){
                            echo    '<a href="formAlteracao.php?id='.$exibe['CodHardware'].'">';
                            echo        '<button class="btn btn-lg btn-block btn-danger comprar" style="background-color: #e07a10; border-color: #bf7910; margin: 5px 0 15px 0;">';
                            echo            '<span class="glyphicon glyphicon-pencil esgotado"></span> Alterar</button>';
                            echo    '</a>';
                        
                            echo    '<a href="formExclusao.php?id='.$exibe['CodHardware'].'">';
                            echo        '<button class="btn btn-lg btn-block btn-danger esgotado" style="background-color: #fafafa; border-color: #bf7910; color: #e07a10; margin: 5px 0 15px 0;">';
                            echo            '<span class="glyphicon glyphicon-remove esgotado"></span> Excluir</button>';
                            echo    '</a>';
                        }
                    } else {
                        if ($exibe['QntEstoque'] > 0)
                        {
                        echo            '<button class="btn btn-lg btn-block btn-danger comprar" style="background-color: #e07a10; border-color: #bf7910; margin: 5px 0 15px 0;">';
                        echo                '<span class="glyphicon glyphicon-usd comprar"></span> Comprar';
                        }
        
                        else
                        {
                        echo            '<button class="btn btn-lg btn-block btn-danger esgotado" style="background-color: #fafafa; border-color: #bf7910; color: #e07a10; margin: 5px 0 15px 0;">';
                        echo                '<span class="glyphicon glyphicon-remove-circle esgotado"></span> Esgotado';
                        }
    
                        echo            '</button>';
                    }

                    echo        '</div>';
                    echo    '</div>';
                    echo '</div>';
                }
            }

            

        ?> <!-- cabecalho e listar_produtos -->

    </main>

    <?php include 'rodape.html' ?> <!-- rodape -->

</body>
</html>