<?php

	include ('conf/config.inc.php');

	$cadenainsertar = "CREATE TABLE IF NOT EXISTS ahorcado.{$_POST['colecciones']} ( idPalabra INT(3) NOT NULL AUTO_INCREMENT , palabra VARCHAR(16) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL , PRIMARY KEY (idPalabra), UNIQUE (palabra)) ENGINE = MyISAM;";
	$resultado = mysqli_query($conexion, $cadenainsertar);
	if(!$resultado)
    {
		echo ("Error al crear coleccion");
		header ('Location: modificar-colecciones.php?msg=error');
    }
	else
	{
				header ('Location: modificar-colecciones.php?msg=exito');
	}
?>