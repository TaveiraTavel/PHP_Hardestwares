<?php 
    session_start();

	$codHardware = isset($_GET['prod']) ? (int) preg_replace("/[^0-9]/", "", $_GET['prod']) : null;

    unset($_SESSION['carrinho'][$codHardware]);

    header('Location:carrinho.php');

?>