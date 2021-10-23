<?php
    echo '<div class="container-fluid" style="margin: 0 5% 0 5%;">';
    echo    '<div class="row">';
    
        $consulta = $cn -> query($query);

        if (isset($consulta))
        {
            if (!isset($depart_name)){
                $depart_name =  $depart == 'home' 
                                ? 'Home'
                                : ($depart == 'lancamentos' 
                                ? 'Lançamentos'
                                : $consulta -> fetch(PDO::FETCH_ASSOC)['Departamento'] ?? null);
            }
            
            if (empty($depart_name)){ include 'notfound.html'; return; }

            echo '<div class="departamento">';
            echo    '<h1>'.htmlspecialchars($depart_name).'</h1>';
            echo '</div>';

            $consulta -> closeCursor();
            $consulta -> execute();
            while($exibe = $consulta -> fetch(PDO::FETCH_ASSOC)){

                $exibe['Imagem'] = htmlspecialchars($exibe['Imagem']);
                $exibe['Nome'] = htmlspecialchars($exibe['Nome']);
                $exibe['Valor'] = htmlspecialchars($exibe['Valor']);

                echo '<div class="col-sm-3 produto">';

                echo    '<img src="img/hardwares/'.$exibe['Imagem'].'" class="img-responsive hardware" style="width: 100%">';
                echo    '<div><h5 class="nome hardware">'.$exibe['Nome'].'</h5></div>';
                echo    '<div><h5 class="preco hardware">R$ '.number_format($exibe['Valor'], 2, ',', '.').'</h5></div>';

                
                echo    '<div class="text-center">';
                echo        '<a href="detalhes.php?prod='.$exibe['CodHardware'].'">';
                echo            '<button class="btn btn-lg btn-block btn-info detalhes">';
                echo                '<span class="glyphicon glyphicon-info-sign detalhes"></span>Detalhes';
                echo            '</button>';
                echo        '</a>';
                
                if ($exibe['QntEstoque'] > 0)
                {
                    echo    '<button class="btn btn-lg btn-block btn-danger comprar" style="margin: 5px 0 15px 0;">';
                    echo        '<span class="glyphicon glyphicon-usd comprar"></span>Comprar';
                }

                else
                {
                    echo    '<button class="btn btn-lg btn-block btn-danger esgotado" style="background-color: #fafafa; border-color: #bf7910; color: #e07a10; margin: 5px 0 15px 0;">';
                    echo        '<span class="glyphicon glyphicon-remove-circle esgotado"></span>Esgotado';
                }

                echo        '</button>';
                echo    '</div>';
                echo '</div>';
            }
        }
        
    echo    '</div>';
    echo '</div>';
?>