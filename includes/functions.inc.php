<?php
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * 
 * @package: selects_dependientes_ajax/includes/
 * @author: Luis Fernando Cázares <luis.f.cazares@gmail.com>
 * @version Id: functions.inc.php 2013-09-01 23:40 _CazaresLuis_ ;
 * @content: funciones generales
 * 
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */

// Constantes conexión con la base de datos
define("server", 'localhost');
define("user", 'tutosWeb');
define("pass", 'YxAp8DmthQnC5NWp');
define("mainDataBase", 'tutosWeb');

// Variable que indica el status de la conexión a la base de datos
$errorDbConexion = false;


// Verificar constantes para conexión al servidor
if(defined('server') && defined('user') && defined('pass') && defined('mainDataBase'))
{
	// Conexión con la base de datos
	
	$mysqli = new mysqli(server, user, pass, mainDataBase);
	
	// Verificamos si hay error al conectar
	if (mysqli_connect_error()) {
	    $errorDbConexion = true;
	}
	else{
		// Evitando problemas con acentos
		$mysqli -> query('SET NAMES "utf8"');
	}
	
}

function listaEstados($dbLink){

	$listaEstados = array();

	$consulta = "SELECT id_estado,edo_nombre FROM tbl_estados";

	// Ejecutamos la cosnulta
	$respuesta = $dbLink -> query($consulta);

	if($respuesta -> num_rows != 0){
		// convertimos el objeto
		while($listadoOK = $respuesta -> fetch_assoc())
		{
			$listaEstados[] = $listadoOK;
		}	

	}

	return $listaEstados;
}

function filtraMunicipios($dbLink,$id_estado){
	$listaMunicipios = '<option value="">Seleccione un Municipio</option>';

	if(!empty($id_estado)){
		$consulta = sprintf("SELECT id_municipio, mun_nombre FROM tbl_municipios
					WHERE id_estado=%d
					ORDER BY mun_nombre ASC",$id_estado);
	}

	// Ejecutamos la cosnulta
	$respuesta = $dbLink -> query($consulta);

	if($respuesta -> num_rows != 0){
		// convertimos el objeto
		while($listadoOK = $respuesta -> fetch_assoc())
		{
			$listaMunicipios .= '<option value="' . $listadoOK['id_municipio'] . '">' . $listadoOK['mun_nombre'] . '</option>';
		}	

	}

	return $listaMunicipios;
}
?>