<?php
	
    include ('conf/config.inc.php');
	$cadena="SELECT table_name AS 'coleccion' FROM information_schema.tables WHERE table_type = 'base table' AND table_schema = 'ahorcado' ORDER BY table_name;";
	$resultado = mysqli_query($conexion, $cadena);
	if(!$resultado)
	{
		echo mysqli_error($conexion);	
	}
	else
	{
		if(mysqli_num_rows($resultado)>0)
		{
		$respuesta = array ();	
		$respuesta = $resultado->fetch_all(MYSQLI_ASSOC);
		
		echo json_encode($respuesta);
		}
		else
		{
			echo ("No hay colecciones que mostrar");
		}
		mysqli_free_result($resultado);
	}//resultado
	mysqli_close($conexion);
?>

habia una vez un perro que queria curzar la calle pero cuando estaba apunto de llegar al otro lado, un auto que iba a una super gran velocidad, lo paso a traer arrastrando y desacionedo todo su cuerpo en mil pedazos y haciendo que todo el suelo se bañara en sangre haha es una historia que me acabo de inventar pero la estoy escrinbiendo en este momento intentando no ver el teclado asi que si no tengo muchos errores es porque estoy borrando pero me tardo demasiado porque me trabo en encontrar el boton de borrar haha xd 
       
                                                                                           -Love, Dylan.