<?php

declare(strict_types=1);

function insertar_productos($productos)
{
    foreach ($productos as $producto) {
        [
            'id_producto'       => $id_producto,
            'nombre_producto'   => $nombre_producto,
            'stock_actual'      => $stock_actual,
            'stock_minimo'      => $stock_minimo,
            'codigo_de_barra'   => $codigo_de_barra,
            'nombre_unidad'     => $nombre_unidad,
            'precio'            => $precio,
            'costo'             => $costo,
            'entradas'          => $entradas
        ] = $producto;

        //onclick=agregar_a_tabla($id_producto, '$nombre_producto', '$nombre_unidad', '$precio');

        $cantidad_entradas = sizeof($entradas);
        $jsonEntradas = htmlspecialchars(json_encode($entradas));
      

        echo "
            <div id='$id_producto' class='product-item' data-id='$id_producto' data-nombre='$nombre_producto' data-unidad='$nombre_unidad' data-precio='$precio' data-entradas='$jsonEntradas' onclick='openModal($id_producto);'>
                <div class='product-name'> $nombre_producto</div>
                <div class='product-price'>$$precio</div>
                <span class='stock'>Stock: $stock_actual $nombre_unidad</span>
                <div class='product-entradas'>Lotes: $cantidad_entradas</div>
            </div>
        ";
    }
}
