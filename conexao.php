<?php
    $server = 'Localhost';
    $user = 'hardestwares';
    $pass = '123456';
    $db = 'dbHardestwares';

    $cn = new PDO("mysql:host=$server; dbname=$db", $user, $pass);
?>