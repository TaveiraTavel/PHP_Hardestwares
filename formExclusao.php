<?php 
    session_start();
    if (empty($_SESSION['privilegio']) || $_SESSION['privilegio'] != true){
        header('location:index.php');
        return;
    }

	include 'conexao.php';

	$codHardware = isset($_GET['id']) ? (int) preg_replace("/[^0-9]/", "", $_GET['id']) : null;

    if (isset($codHardware)){
        try{
            $consultaImagem = $cn -> query("SELECT Imagem FROM tbHardware WHERE CodHardware = $codHardware;");
            $imagemHardware = $consultaImagem -> fetch(PDO::FETCH_ASSOC);
            $destinoFoto = 'img/hardwares/';
        
            $exclusaoHardware = $cn -> query("DELETE FROM tbHardware WHERE CodHardware = $codHardware;");
        
            unlink($imagemHardware['Imagem'].$destinoFoto);
        } catch(PDOException $e) {
            echo $e -> getMessage();
        } finally {
            header('Location:index.php');
        }
        
    }
    return;

?>