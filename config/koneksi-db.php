<?php

    $server     = "localhost";
    $user       = "root";
    $password   = "";
    $db_name    = "dbperpus4";

    $db_conn = mysqli_connect($server, $user, $password, $db_name);

    if(!$db_conn){
        die("Gagal terhubung dengan database: " . mysqli_connect_error());
    }

?>
