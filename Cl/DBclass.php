<?php
class Cl_DBclass
{
	/**
	 * @var $con llevará a cabo la conexión de base de datos
	 */
	public $con;
	# conectare la base de datos
	
	/**
	 * Esto creará la conexión de base de datos
	 */
	public function __construct()
	{
		$this->con = mysqli_connect("localhost", "root", "", "presupuestos");
		if( mysqli_connect_error()) echo "Falló conexión a MySQL: " . mysqli_connect_error();
	}
}