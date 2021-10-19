<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>ZONA DE TESTES</title>
</head>
<body>
    <?php include 'conexao.php';
        $depart = 'placa mae';

        $consulta = $cn -> prepare("CALL spConsultaProdsDepart(:depart, @out_string)"); 
        $consulta -> bindParam(':depart', $depart);

        $consulta -> execute();

        $display_depart = $this -> cn -> query("SELECT @out_string") -> fetch(PDO::FETCH_ASSOC);
        
        print "procedure returned " . $display_depart['@out_string'] . "\n";

        $stmt = $dbh->prepare("CALL sp_takes_string_returns_string(?)");
        $value = 'hello';
        $stmt->bindParam(1, $value, PDO::PARAM_STR|PDO::PARAM_INPUT_OUTPUT, 4000); 

        // call the stored procedure
        $stmt->execute();

        print "procedure returned $value\n";
        
        /*
        while($exibe = $consulta -> fetch(PDO::FETCH_ASSOC)){
            foreach($exibe as $coluna => $registro){
                echo $coluna.' ---> '.$registro.'<br />';
            }
        }
        */

        /*while($exibe = $consulta -> fetch(PDO::FETCH_ASSOC)){
            echo $exibe['Nome'].'<br />';
            echo 'R$ '.$exibe['Valor'].'<br />';
            echo $exibe['Departamento'].'<br />';
            echo '<hr>';
        }

        $consulta -> execute();
        while($exibe = $consulta -> fetch(PDO::FETCH_ASSOC)){
            echo $exibe['Nome'].'<br />';
            echo 'R$ '.$exibe['Valor'].'<br />';
            echo $exibe['Departamento'].'<br />';
            echo '<hr>';
        }*/


    ?>
</body>
</html>