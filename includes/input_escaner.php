<?php 

declare(strict_types=1);

$codigo_de_barra = $_GET["input_escaner"] ?? null;
$modulo_origen = $_GET["modulo_origen"];

try {
    require_once "db.php";
    require_once "input_escaner_modelo.php";

    /* Comprobar Errores 
    */

    $producto_obtenido_por_escaner = obtener_producto($pdo, $codigo_de_barra);

    require_once 'config_session.php';

    $producto_obtenido_por_escaner["codigo_de_barra"] = $codigo_de_barra;

    $_SESSION["producto_obtenido_por_escaner"] = $producto_obtenido_por_escaner;
    
    header("Location: $modulo_origen");
    die();

} catch (PDOException $e) {
    die("Error al obtener producto por código de barra: " . $e->getMessage());
}
