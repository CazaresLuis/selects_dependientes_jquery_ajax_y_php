<?php

/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * 
 * @package: selects_dependientes_ajax/includes/
 * @author: Luis Fernando Cázares <luis.f.cazares@gmail.com>
 * @version Id: actions.inc.php 2013-09-02 17:57 _CazaresLuis_ ;
 * 
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */

if(isset($_POST) && !empty($_POST['action']) && !empty($_POST['id_estado'])){

	// Incluimos las funciones y la conexión a la base de datos
	include('functions.inc.php');

	// Dar tiempo de espera
	sleep(3);

	if($_POST['action'] == 'filtraMunicipios'){

		$lista_municipios = filtraMunicipios($mysqli,$_POST['id_estado']);

	}

	echo $lista_municipios;

}

?>