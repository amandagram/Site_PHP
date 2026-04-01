<?php
session_start();

$host = "localhost";
$dbname = "produtos";
$user = "postgres";
$password = "123456";

$conn = pg_connect("host=$host dbname=$dbname user=$user password=$password");

if (!$conn) {
    die("Erro na conexão com o banco de dados.");
}
?>