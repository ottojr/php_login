<?php

$usuario = 'root';
$senha = '';
$database = 'login';
$host = 'localhost';

$mysqli = new mysqli($host, $usuario, $senha, $database);

if($mysqli->error){
    die("Não foi possível conectar ao banco de dados. Erro: ". $mysqli->error);
}