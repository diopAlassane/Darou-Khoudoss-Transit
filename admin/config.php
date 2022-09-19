<?php

$host = "localhost";
$username = "root";
$password = "";
$bdname = "darou_khoudoss_transit";
try {
    $pdo = new PDO("mysql:host=$host;dbname=$bdname", "$username", "$password");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Echec de la connexion :" . $e->getMessage());
}
