<?php

    $db_host = 'localhost';
    $db_name = 'base_de_datos';
    $db_user = 'root';
    $db_pass = '';

    // $db_attrs is optional, this demonstrates using persistent connections,
    // the equivalent of mysql_pconnect
    $db_attrs = array(PDO::ATTR_PERSISTENT => true);
    $dsn = 'mysql:host='.$db_host.';dbname='.$db_name.';charset=utf8';
    $pdo = new PDO($dsn,$db_user,$db_pass,$db_attrs);
    // the following tells PDO we want it to throw Exceptions for every error.
    // this is far more useful than the default mode of throwing php errors
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo_errores = '';
