<?php
	include ('conf/config.inc.php');
	$cadenamodificar = "RENAME TABLE ahorcado.{$_POST['coleccion_actual']} TO ahorcado.{$_POST['coleccion_nueva']};";
	$resultado = mysqli_query($conexion, $cadenamodificar);
	if(!$resultado)
	{
		echo ("Error al modificar coleccion");
		header ('Location: modificar-colecciones.php?msg=error');
		}
		else
		{
			header ('Location: modificar-colecciones.php?msg=exito');
			}
?>