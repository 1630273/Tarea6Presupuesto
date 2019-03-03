<?php
	/*-------------------------
	Autor: Obed Alvarado
	Web: obedalvarado.pw
	Mail: info@obedalvarado.pw
	---------------------------*/
    // DB credentials.
	define("DB_HOST", "localhost");//DB_HOST:  generalmente suele ser "127.0.0.1"
	define("DB_NAME", "presupuestos");//Nombre de la base de datos
	define("DB_USER", "root");//Usuario de tu base de datos
	define("DB_PASS", "");//Contraseña del usuario de la base de datos
	# conectare la base de datos
    $con=@mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if(!$con){
        die("imposible conectarse: ".mysqli_error($con));
    }
    if (@mysqli_connect_errno()) {
        die("Conexión falló: ".mysqli_connect_errno()." : ". mysqli_connect_error());
    }
?>
