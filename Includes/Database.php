<?php

require_once 'initialize.php';
function osotech_connect()
{
    $dsn = __OSO_DB_DRIVER__ . ":host=" . __OSO_HOST__ . ";dbname=" . __OSO_DBNAME__ . ";charset=" . __OSO_CHARSET__;
    $options = array(PDO::ATTR_PERSISTENT => false, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ);
    try {
        $dbh = new PDO($dsn, __OSO_USER__, __OSO_PASS__, $options);
    } catch (PDOException $e) {
        $error = $e->getMessage();
        die($error);
    }
    return $dbh;
}