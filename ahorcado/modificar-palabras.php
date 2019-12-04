<?php

	include ('conf/config.inc.php');
	
	$vars="";
	
	echo $tpl->cargar_parte('plt-modificar-palabras.html', 'encabezado');
	
	$consulta = "SELECT table_name AS 'tabla' FROM information_schema.tables WHERE table_type = 'base table' AND table_schema = 'ahorcado' ORDER BY table_name;";
	$resultado = mysqli_query($conexion, $consulta);
	if (!$resultado)
	{
		echo "Error en la consulta listado nombres de tablas";
	}
	else
	{
		if(mysqli_num_rows($resultado)>0)
		{
			$vars['colecciones'] = "";
			for ($i=0; $i<mysqli_num_rows($resultado);$i++)
			{

				$fila = mysqli_fetch_array($resultado);
				$varstablas['coleccion'] = $fila['tabla'];
				$vars['colecciones'] = $vars['colecciones'] . $tpl->cargar ('colecciones.html', $varstablas);
			}
		}
		echo $tpl->cargar_parte('plt-modificar-palabras.html', 'cuerpo', $vars);
	}
	echo $tpl->cargar_parte('plt-modificar-palabras.html', 'pie');
?>