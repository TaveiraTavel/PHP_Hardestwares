<?php
    echo '<div class="container-fluid" style="margin: 0 5% 0 5%;">';
    echo    '<div class="row">';
    
    echo '<div class="departamento">';
    echo    '<h1>Carrinho</h1>';
    echo '</div>';

    echo '<ul>';

    $totalCarrinho = null;

    foreach ($_SESSION['carrinho'] as $codItem => $qntd){
        $codItem = (int) $codItem;
        $consulta = $cn -> query("SELECT * FROM vwHardware WHERE CodHardware = $codItem");
        $dadosItem = $consulta -> fetch(PDO::FETCH_ASSOC);

        $nome = $dadosItem['Nome'];
        $preco = number_format($dadosItem['Valor'], 2, ',', '.');
        $totalCarrinho += $dadosItem['Valor'] * $qntd;

        
        echo '<div class="row" style="margin-top: 15px;">';

        echo '<div class="col-sm-3">';
        echo    '<img src="img/hardwares/'.$dadosItem['Imagem'].'" width="150px">';
        echo '</div>';
        echo '<div class="col-sm-4">';
        echo    '<h4 style="padding-top:20px">'.$nome.'</h4>';
        echo '</div>';
        echo '<div class="col-sm-2">';
        echo    '<h4 style="padding-top:20px">R$ '.$preco.'</h4>';
        echo '</div>';
        echo '<div class="col-sm-1" style="padding-top:20px">';
        echo    '<h4>'.$qntd.'</h4>';
        echo '</div>';
        echo '<div minwidth="12px" class="col-sm-2 col-sm-offset-right-1" style="padding-top:20px">';
        echo    '<a href="removerItem.php?prod='.$codItem.'">';
        echo        '<button class="btn btn-lg btn-block btn-danger">';
        echo            '<span class="glyphicon glyphicon-remove"></span>';
        echo        '</button>';
        echo    '</a>';
        echo '</div>';

        echo '</div>';

    }

    echo '</ul>'

    

?>