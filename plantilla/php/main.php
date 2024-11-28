<?php
	
	
	function conexion(){
		$pdo = new PDO('mysql:host=localhost;dbname=inventario', 'root', '');
		return $pdo;
	}



	function verificar_datos($filtro,$cadena){
		if(preg_match("/^".$filtro."$/", $cadena)){
			return false;
        }else{
            return true;
        }
	}


	
	function limpiar_cadena($cadena){
		$cadena=trim($cadena);
		$cadena=stripslashes($cadena);
		$cadena=str_ireplace("<script>", "", $cadena);
		$cadena=str_ireplace("</script>", "", $cadena);
		$cadena=str_ireplace("<script src", "", $cadena);
		$cadena=str_ireplace("<script type=", "", $cadena);
		$cadena=str_ireplace("SELECT * FROM", "", $cadena);
		$cadena=str_ireplace("DELETE FROM", "", $cadena);
		$cadena=str_ireplace("INSERT INTO", "", $cadena);
		$cadena=str_ireplace("DROP TABLE", "", $cadena);
		$cadena=str_ireplace("DROP DATABASE", "", $cadena);
		$cadena=str_ireplace("TRUNCATE TABLE", "", $cadena);
		$cadena=str_ireplace("SHOW TABLES;", "", $cadena);
		$cadena=str_ireplace("SHOW DATABASES;", "", $cadena);
		$cadena=str_ireplace("<?php", "", $cadena);
		$cadena=str_ireplace("?>", "", $cadena);
		$cadena=str_ireplace("--", "", $cadena);
		$cadena=str_ireplace("^", "", $cadena);
		$cadena=str_ireplace("<", "", $cadena);
		$cadena=str_ireplace("[", "", $cadena);
		$cadena=str_ireplace("]", "", $cadena);
		$cadena=str_ireplace("==", "", $cadena);
		$cadena=str_ireplace(";", "", $cadena);
		$cadena=str_ireplace("::", "", $cadena);
		$cadena=trim($cadena);
		$cadena=stripslashes($cadena);
		return $cadena;
	}


	
	function renombrar_fotos($nombre){
		$nombre=str_ireplace(" ", "_", $nombre);
		$nombre=str_ireplace("/", "_", $nombre);
		$nombre=str_ireplace("#", "_", $nombre);
		$nombre=str_ireplace("-", "_", $nombre);
		$nombre=str_ireplace("$", "_", $nombre);
		$nombre=str_ireplace(".", "_", $nombre);
		$nombre=str_ireplace(",", "_", $nombre);
		$nombre=$nombre."_".rand(0,100);
		return $nombre;
	}


	function paginador_tablas($pagina, $Npaginas, $url, $botones) {
		$tabla = '<nav class="d-flex justify-content-center my-4" aria-label="Pagination">';
		$tabla .= '<ul class="pagination pagination-sm">';
	
		// Botón "Anterior"
		if ($pagina <= 1) {
			$tabla .= '
				<li class="page-item disabled">
					<a class="page-link" href="#" tabindex="-1">Anterior</a>
				</li>';
		} else {
			$tabla .= '
				<li class="page-item">
					<a class="page-link" href="' . $url . ($pagina - 1) . '">Anterior</a>
				</li>';
		}
	
		// Páginas iniciales
		if ($pagina > 1) {
			$tabla .= '
				<li class="page-item">
					<a class="page-link" href="' . $url . '1">1</a>
				</li>';
			if ($pagina > 2) {
				$tabla .= '
				<li class="page-item disabled">
					<span class="page-link">...</span>
				</li>';
			}
		}
	
		// Páginas dinámicas
		$ci = 0;
		for ($i = $pagina; $i <= $Npaginas; $i++) {
			if ($ci >= $botones) {
				break;
			}
			if ($pagina == $i) {
				$tabla .= '
				<li class="page-item active">
					<span class="page-link">' . $i . '</span>
				</li>';
			} else {
				$tabla .= '
				<li class="page-item">
					<a class="page-link" href="' . $url . $i . '">' . $i . '</a>
				</li>';
			}
			$ci++;
		}
	
		// Páginas finales
		if ($pagina < $Npaginas - $botones) {
			$tabla .= '
				<li class="page-item disabled">
					<span class="page-link">...</span>
				</li>';
			$tabla .= '
				<li class="page-item">
					<a class="page-link" href="' . $url . $Npaginas . '">' . $Npaginas . '</a>
				</li>';
		}
	
		// Botón "Siguiente"
		if ($pagina >= $Npaginas) {
			$tabla .= '
				<li class="page-item disabled">
					<a class="page-link" href="#" tabindex="-1">Siguiente</a>
				</li>';
		} else {
			$tabla .= '
				<li class="page-item">
					<a class="page-link" href="' . $url . ($pagina + 1) . '">Siguiente</a>
				</li>';
		}
	
		$tabla .= '</ul></nav>';
		return $tabla;
	}
	