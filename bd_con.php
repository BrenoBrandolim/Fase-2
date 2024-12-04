<?php

$hostname = "localhost";
$bd = "cadastro";
$user = "breno";
$password = "123";

$conn = new mysqli($hostname, $user, $password, $bd);
if ($conn->connect_errno){
    echo "falha ao conectar: (" . $conn->connect_errno . ") " . $conn->connect_error;
}