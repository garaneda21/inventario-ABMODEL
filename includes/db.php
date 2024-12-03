<?php
// Conexión a Base de Datos

$host = '127.0.0.1';
$dbname = 'inventario_carolina';
$dbusername = 'root';
$dbpassword = '1234';

try {
    // crear la conexión a la base de datos usando PDO, pasando los parámetros
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $dbusername, $dbpassword);
    // poner a pdo a modo de error de excepciones para nuestra conveniencia
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // si algo sale mal, interrumpir este script y mostrar error
    die("Conexión con Base de Datos Fallida: " . $e->getMessage());
}
