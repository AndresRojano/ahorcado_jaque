<?php

	include ('conf/config.inc.php');

	$borrar = "DROP TABLE IF EXISTS ahorcado.{$_POST['colecciones']};";
	$resultado = mysqli_query($conexion, $borrar);
	if(!$resultado)
    {
		echo ("Error al eliminar coleccion");
		header ('Location: modificar-colecciones.php?msg=error');
    }
	else
	{
				header ('Location: modificar-colecciones.php?msg=exito');
	}
?>