<?php
/*
 * Site : http:www.smarttutorials.net
 * Author :muni
 * 
 */
    define("DB_HOST", "localhost");//DB_HOST:  generalmente suele ser "127.0.0.1"
	define("DB_NAME", "presupuestos");//Nombre de la base de datos
	define("DB_USER", "root");//Usuario de tu base de datos
	define("DB_PASS", "");//Contraseña del usuario de la base de datos
	# conectare la base de datos
$con=mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysql_error());
$db=mysql_select_db(DB_NAME,$con) or die("Failed to connect to MySQL: " . mysql_error());

?>