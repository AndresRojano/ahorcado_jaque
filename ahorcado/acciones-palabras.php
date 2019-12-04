<?php

	include ('conf/config.inc.php');
	
	switch ($_POST['resultado']) {
		case "Elegir":
		//
		header ('Location: modificar-palabras.php?msg=prueba_elegir_exito');
		//
		break;
		case "Agregar":
		//
		header ('Location: modificar-palabras.php?msg=prueba_agregar_exito');
		//
        break;
		case "Borrar":
        //
		header ('Location: modificar-palabras.php?msg=prueba_borrar_exito');
		//
        break;
		case "Actualizar":
        //
		header ('Location: modificar-palabras.php?msg=prueba_editar_exito');
		//
		break;
	}

?>