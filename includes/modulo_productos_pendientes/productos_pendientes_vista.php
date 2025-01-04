<?php 
declare(strict_types=1);

function lista_productos_pendientes(array $productos) {

    if (!$productos) {
        echo "<div class='empty-message'>
                No hay productos pendientes por actualizar

                <svg class='empty-message-svg' xmlns=\"http://www.w3.org/2000/svg\" id=\"Layer_1\" data-name=\"Layer 1\" viewBox=\"0 0 24 24\" width=\"512\" height=\"512\"><path d=\"M4.5,7A3.477,3.477,0,0,1,2.025,5.975L.5,4.62a1.5,1.5,0,0,1,2-2.24L4.084,3.794A.584.584,0,0,0,4.5,4a.5.5,0,0,0,.353-.146L8.466.414a1.5,1.5,0,0,1,2.068,2.172L6.948,6A3.449,3.449,0,0,1,4.5,7ZM24,3.5A1.5,1.5,0,0,0,22.5,2h-8a1.5,1.5,0,0,0,0,3h8A1.5,1.5,0,0,0,24,3.5ZM6.948,14l3.586-3.414A1.5,1.5,0,0,0,8.466,8.414l-3.613,3.44a.5.5,0,0,1-.707,0L2.561,10.268A1.5,1.5,0,0,0,.439,12.39l1.586,1.585A3.5,3.5,0,0,0,6.948,14ZM24,11.5A1.5,1.5,0,0,0,22.5,10h-8a1.5,1.5,0,0,0,0,3h8A1.5,1.5,0,0,0,24,11.5ZM6.948,22l3.586-3.414a1.5,1.5,0,0,0-2.068-2.172l-3.613,3.44A.5.5,0,0,1,4.5,20a.584.584,0,0,1-.416-.206L2.5,18.38a1.5,1.5,0,0,0-2,2.24l1.523,1.355A3.5,3.5,0,0,0,6.948,22ZM24,19.5A1.5,1.5,0,0,0,22.5,18h-8a1.5,1.5,0,0,0,0,3h8A1.5,1.5,0,0,0,24,19.5Z\"/></svg>
            </div>
        ";
        return;
    }

    foreach ($productos as $producto) {
        [
            'id_producto'     => $id_producto,
            'nombre_producto' => $nombre_producto,
            'codigo_de_barra' => $codigo_de_barra,
            'nombre_unidad'   => $nombre_unidad
        ] = $producto;

        echo "
        <div class='card'>
            <div class='card-content'>
                <h3>$nombre_producto</h3>
                <p>Unidad: $nombre_unidad</p>
                <p>$codigo_de_barra</p>
            </div>
            <button onclick=\"mostrar_modal_actualizar_producto('$id_producto', '$codigo_de_barra', '$nombre_producto');\">Editar producto</button>
        </div>
        ";
    }         
}
