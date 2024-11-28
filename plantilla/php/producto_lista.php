<?php
$inicio = ($pagina > 0) ? (($pagina * $registros) - $registros) : 0;
$tabla = "";

$campos = "producto.producto_id,producto.producto_codigo,producto.producto_nombre,producto.producto_precio,producto.producto_stock,producto.producto_foto,producto.categoria_id,producto.usuario_id,categoria.categoria_id,categoria.categoria_nombre,usuario.usuario_id,usuario.usuario_nombre,usuario.usuario_apellido";

if (isset($busqueda) && $busqueda != "") {

    $consulta_datos = "SELECT $campos FROM producto INNER JOIN categoria ON producto.categoria_id=categoria.categoria_id INNER JOIN usuario ON producto.usuario_id=usuario.usuario_id WHERE producto.producto_codigo LIKE '%$busqueda%' OR producto.producto_nombre LIKE '%$busqueda%' ORDER BY producto.producto_nombre ASC LIMIT $inicio,$registros";

    $consulta_total = "SELECT COUNT(producto_id) FROM producto WHERE producto_codigo LIKE '%$busqueda%' OR producto_nombre LIKE '%$busqueda%'";

} elseif ($categoria_id > 0) {

    $consulta_datos = "SELECT $campos FROM producto INNER JOIN categoria ON producto.categoria_id=categoria.categoria_id INNER JOIN usuario ON producto.usuario_id=usuario.usuario_id WHERE producto.categoria_id='$categoria_id' ORDER BY producto.producto_nombre ASC LIMIT $inicio,$registros";

    $consulta_total = "SELECT COUNT(producto_id) FROM producto WHERE categoria_id='$categoria_id'";

} else {

    $consulta_datos = "SELECT $campos FROM producto INNER JOIN categoria ON producto.categoria_id=categoria.categoria_id INNER JOIN usuario ON producto.usuario_id=usuario.usuario_id ORDER BY producto.producto_nombre ASC LIMIT $inicio,$registros";

    $consulta_total = "SELECT COUNT(producto_id) FROM producto";
}

$conexion = conexion();

$datos = $conexion->query($consulta_datos);
$datos = $datos->fetchAll();

$total = $conexion->query($consulta_total);
$total = (int) $total->fetchColumn();

$Npaginas = ceil($total / $registros);

if ($total >= 1 && $pagina <= $Npaginas) {
    $contador = $inicio + 1;
    $pag_inicio = $inicio + 1;
    foreach ($datos as $rows) {
        $tabla .= '
            <div class="card mb-4 shadow-sm rounded">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <figure class="image">
                                <img src="' . (is_file("./img/producto/" . $rows['producto_foto']) ? "./img/producto/" . $rows['producto_foto'] : "./img/producto.png") . '" class="img-fluid rounded" alt="' . $rows['producto_nombre'] . '">
                            </figure>
                        </div>
                        <div class="col-md-8">
                            <h5 class="card-title"><strong>' . $contador . ' - ' . $rows['producto_nombre'] . '</strong></h5>
                            <p class="card-text">
                                <strong>CODIGO:</strong> ' . $rows['producto_codigo'] . '<br>
                                <strong>PRECIO:</strong> $' . $rows['producto_precio'] . ', 
                                <strong>STOCK:</strong> ' . $rows['producto_stock'] . ', 
                                <strong>CATEGORIA:</strong> ' . $rows['categoria_nombre'] . '<br>
                                <strong>REGISTRADO POR:</strong> ' . $rows['usuario_nombre'] . ' ' . $rows['usuario_apellido'] . '
                            </p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <a href="index.php?vista=product_img&product_id_up=' . $rows['producto_id'] . '" class="btn btn-link btn-sm text-primary">Imagen</a>
                                    <a href="index.php?vista=product_update&product_id_up=' . $rows['producto_id'] . '" class="btn btn-success btn-sm">Actualizar</a>
                                    <a href="' . $url . $pagina . '&product_id_del=' . $rows['producto_id'] . '" class="btn btn-danger btn-sm">Eliminar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
        ';
        $contador++;
    }
    $pag_final = $contador - 1;
} else {
    if ($total >= 1) {
        $tabla .= '
            <div class="text-center mt-4 mb-4">
                <a href="' . $url . '1" class="btn btn-link btn-lg text-primary">
                    Haga clic acá para recargar el listado
                </a>
            </div>
        ';
    } else {
        $tabla .= '
            <div class="text-center">
                <p>No hay registros en el sistema</p>
            </div>
        ';
    }
}

if ($total > 0 && $pagina <= $Npaginas) {
    $tabla .= '<p class="text-end">Mostrando productos <strong>' . $pag_inicio . '</strong> al <strong>' . $pag_final . '</strong> de un <strong>total de ' . $total . '</strong></p>';
}

$conexion = null;
echo $tabla;

if ($total >= 1 && $pagina <= $Npaginas) {
    echo paginador_tablas($pagina, $Npaginas, $url, 7);
}
?>

