<?php
session_name('selects_Dependientes');
session_start();

// Directorio Raíz de la app
// Es utilizado en templateEngine.inc.php
$root = '';

// números de captcha
$_SESSION['inicia_form'] = true;

if(!empty($_SESSION)){
	// Incluimos el template engine
	include('includes/templateEngine.inc.php');

	// Incluimos las funciones
	include('includes/functions.inc.php');

	// Rendereamos la lista de estados
	$estados = listaEstados($mysqli);

	$salidaEstados = $twig->render('listaEstados.html',array('listaEstados' => $estados));

	// Cargamos la plantilla
	$twig->display('index.html',array(
		"titulo"    	=> "Selects dependientes con jQuery AJAX y PHP",
		"piePagina" 	=> "<p>cazaresluis.com | &copy; 2013 </p>",
		"estados"		=> $salidaEstados
	));
}
	

?>