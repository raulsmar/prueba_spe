<?php
$host = "127.0.0.1";
$port = "5432";
$dbname = "spe_db";
$user = "postgres";
$password = "r00t"; 
$connection_string = "host={$host} port={$port} dbname={$dbname} user={$user} password={$password} ";
$dbconn = pg_connect($connection_string);
?>