<?php
    // $db_attrs is optional, this demonstrates using persistent connections,
    // the equivalent of mysql_pconnect
    $db_attrs = array(PDO::ATTR_PERSISTENT => true);
    $dsn = 'mysql:host=localhost;dbname=base_de_datos;charset=utf8';
    $pdo = new PDO($dsn,'root','',$db_attrs);
    // the following tells PDO we want it to throw Exceptions for every error.
    // this is far more useful than the default mode of throwing php errors
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo_errores = '';
