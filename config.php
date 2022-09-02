<?php
$banco = "estoque";
$usuario = "root";
$senha = "";
$host = "localhost";
$url = "http://localhost/Prof Lucas/estoque/";

global $db;

try {
    $db = new PDO ("mysql:host=" . $host . ";dbname=" . $banco, $usuario, $senha);
}catch(PDOExcepition $e) {
    echo $e -> getMessage(); 
}