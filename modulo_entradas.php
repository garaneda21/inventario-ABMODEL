<?php
require_once "includes/config_session.php";
require_once "includes/modulo_entradas/lista_productos.php";
require_once "includes/input_escaner_vista.php";
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Inventario</title>
    <link rel="icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="styles/main.css">
    <link rel="stylesheet" href="styles/layout.css">
    <link rel="stylesheet" href="styles/modulo_ventas/busqueda.css">
    <link rel="stylesheet" href="styles/cuadricula_de_productos.css">
    <link rel="stylesheet" href="styles/barra_lateral_de_productos.css">
    <link rel="stylesheet" href="styles/tablas_ingreso_producto.css">
    <link rel="stylesheet" href="styles/notificacion.css">
</head>

<body>

    <!-- Contenedor principal -->
    <div class="main-container">
        <!-- Panel lateral -->
        <?php require_once "elementos_ui/barra_lateral.php" ?>

        <!-- Área de contenido principal -->
        <main class="content">

            <form method="get" class="search-pagination-form">
                <!-- Barra de búsqueda -->
                <div class="search-container">
                    <input type="text" name="busqueda" placeholder="Buscar producto..." class="search-input" value="<?php echo isset($_GET['busqueda']) ? htmlspecialchars($_GET['busqueda']) : ''; ?>">
                    <button type="submit" class="search-button">Buscar</button>
                </div>


                <!-- <div class="pagination-container">
                    <button type="submit" name="pagina" value="1" class="pagination-button">1</button>
                    <button type="submit" name="pagina" value="2" class="pagination-button">2</button>
                    <button type="submit" name="pagina" value="3" class="pagination-button">3</button>
                    
                </div> -->
            </form>

            <div class="product-grid">

                <?php
                insertar_productos($productos);
                ?>

            </div>

        </main>

        <div class="sidebar-productos">
            <div class="formulario-de-tabla">

                <form action="includes/modulo_entradas/entrada.php" method="post">

                    <div id="mensaje-sin-productos" class="mensaje-sin-productos visible">
                        Seleccione un producto de la lista o escanee un código de barras

                        <svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1" viewBox="0 0 24 24">
                            <path d="m24,0v2h-7V0h7Zm-7,6h7v-2h-7v2Zm0,15h7v-2h-7v2Zm0-8h7v-2h-7v2Zm0-3h7v-3h-7v3Zm0,8h7v-3h-7v3Zm0,6h7v-2h-7v2ZM0,8c0,2.757,2.243,5,5,5h10V3H5C2.243,3,0,5.243,0,8Zm5,7c-.98,0-1.914-.203-2.761-.568L.113,20.757c-.41,1.318.327,2.72,1.645,3.129,1.319.41,2.72-.327,3.129-1.645l1.761-5.241h2.351v-2h-4Z" />
                        </svg>
                    </div>

                    <table class="table-adjusted">
                        <thead>
                            <tr>
                                <th>Producto</th>
                                <th width="80px">Cantidad</th>
                                <th width="70px">Unidad</th>
                                <th width="150px">Fecha de Vencimiento</th>
                                <th width="50px">Quitar</th>
                            </tr>
                        </thead>
                        <tbody id="tabla-productos">

                        </tbody>
                    </table>

                    <div class="form-footer">
                        <button type="submit" class="button-submit" onclick="sessionStorage.removeItem('productos');">
                            <div class="icon icon-big">
                                <img src="img/botones/completed.png" alt="">
                            </div>
                            <p>Ingresar productos al inventario</p>
                        </button>
                    </div>
                </form>
            </div>


        </div>
    </div>

    <form action="includes/input_escaner.php" method="get" id="formulario-escaner" hidden>

        <?php
        datos_producto_obtenido_por_escaner();
        ?>

        <input id="input-escaner" name="input_escaner" type="text">
    </form>

    <div id="notification-container"></div>


    <script src="js/agregar_a_tabla_ingreso.js"></script>
    <script src="js/input_escaner.js"></script>
    <script src="js/notificacion.js"></script>


    <script>
        if (sessionStorage.getItem('productos')) {
            const productos = JSON.parse(sessionStorage.getItem('productos'));

            for (const key in productos) {
                producto = productos[key];
                agregar_a_tabla(producto.id, producto.nombre, producto.unidad, producto.requiere_venc, true);
            }
        }
    </script>
    <script>
        producto_obtenido_por_escaner = document.getElementById("datos-input-escaner");

        if (producto_obtenido_por_escaner) {
            const id_producto = producto_obtenido_por_escaner.dataset.id_producto;
            const nombre = producto_obtenido_por_escaner.dataset.nombre;
            const unidad = producto_obtenido_por_escaner.dataset.unidad;
            const requiere_venc = producto_obtenido_por_escaner.dataset.requiere_fecha_vencimiento;

            agregar_a_tabla(id_producto, nombre, unidad, requiere_venc);
            showNotification("Producto escaneado exitosamente")
        }
    </script>
</body>

</html>
