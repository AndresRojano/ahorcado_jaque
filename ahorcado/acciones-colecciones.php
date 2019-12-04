<?php
include('conf/config.inc.php');
switch ($_GET ['resultado']){
case "Elegir":

//
header('Location: modificar-palabras.php?msg=prueba_elegir_exito?');
//
break;
//
header('Location: modificar-palabras.php?msg=prueba_agregar_exito?');
$cadenainsertar ="CREATE PÁLABRA IF NOT EXISTS ahorcado.{$_POST['colecciones']} (idPalabraIMT (3) NOT MULL AUTO_INCREMENT, palabra VARCHAR (16) CHARACTERSET utf8 COLLATE utf8_spanish_ci NOT NULL , PRIMARY KEY (IdPalabra), UNIQUE (palabra)) ENGINE= MyISAM;";
break;
//
header('Location: modificar-palabras.php?msg=prueba_borrar_exito?');
$cadenainsertar ="DROPE TABLE IF EXIST PÁLABRA IF NOT EXISTS ahorcado.{$_POST['colecciones']} (idPalabraIMT (3) NOT MULL AUTO_INCREMENT, palabra VARCHAR (16) CHARACTERSET utf8 COLLATE utf8_spanish_ci NOT NULL , PRIMARY KEY (IdPalabra), UNIQUE (palabra)) ENGINE= MyISAM;";
break;
//
header('Location: modificar-palabras.php?msg=prueba_editar_exito?');
$cadenamodificar="RENAME_TABLE ahorcado.{$variable} TO ahoracdo.{$otravariable};";
break;

}













?>