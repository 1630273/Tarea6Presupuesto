<?php
$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
if($action == 'ajax'){
	/* Connect To Database*/
	require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
	require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
	
	if (isset($_REQUEST['id'])){
		$id=intval($_REQUEST['id']);
		$delete=mysqli_query($con,"delete from tmp where id='$id'");
	}
	
	if (isset($_POST['descripcion'])){
		
		$descripcion=mysqli_real_escape_string($con,$_POST['descripcion']);
		$cantidad=intval($_POST['cantidad']);
		$precio=floatval($_POST['precio']);
		$sql="INSERT INTO `tmp` (`id`, `descripcion`, `cantidad`, `precio`) VALUES (NULL, '$descripcion', '$cantidad', '$precio');";
		$insert=mysqli_query($con,$sql);
	}
	
	$query=mysqli_query($con,"select * from tmp order by id");
	$items=1;
	$suma=0;
	$iva=0;
	$TOTALFINAL=0;
	while($row=mysqli_fetch_array($query)){
			//$iva=$row['cantidad']*$row['precio']*0.16;
			$total=$row['cantidad']*$row['precio'];
			$total=number_format($total,2,'.','');
			
		?>
	<tr>
		<td class='text-center'><?php echo $items;?></td>
		<td><?php echo $row['descripcion'];?></td>
		<td class='text-center'><?php echo $row['cantidad'];?></td>
		<td class='text-right'><?php echo $row['precio'];?></td>
		<td class='text-right'><?php echo $total;?></td>
		<td class='text-right'><a href="#" onclick="eliminar_item('<?php echo $row['id']; ?>')" ><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAMAAAAoLQ9TAAAAeFBMVEUAAADnTDznTDznTDznTDznTDznTDznTDznTDznTDznTDznTDznTDznTDznTDznTDznTDznTDznTDznTDznTDznTDznTDznTDznTDznTDznTDznTDznTDznTDznTDznTDznTDznTDznTDznTDznTDznTDznTDznTDx+VWpeAAAAJ3RSTlMAAQIFCAkPERQYGi40TVRVVlhZaHR8g4WPl5qdtb7Hys7R19rr7e97kMnEAAAAaklEQVQYV7XOSQKCMBQE0UpQwfkrSJwCKmDf/4YuVOIF7F29VQOA897xs50k1aknmnmfPRfvWptdBjOz29Vs46B6aFx/cEBIEAEIamhWc3EcIRKXhQj/hX47nGvt7x8o07ETANP2210OvABwcxH233o1TgAAAABJRU5ErkJggg=="></a></td>
	</tr>	
		<?php
		$items++;
		$suma+=$total;
		$iva= $suma*0.16;
		$TOTALFINAL=$suma + $iva;
	}
	?>
	<tr>
		<td colspan='6'>
		
			<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-plus"></span> Agregar Ítem</button>
		</td>
	</tr>
	<tr>
		<td colspan='4' class='text-right'>
			<h5>SUBTOTAL</h5>
		</td>
		<th class='text-right'>
			<h5><?php echo number_format($suma,2);?></h5>
		</th>
	</tr>	
	<tr>	
		<td colspan='4' class='text-right'>
			<h5>IVA 16%</h5>
		</td>
		<th class='text-right'>
			<h5><?php echo number_format($iva,2);?></h5>
		</th>
	</tr>	
	<tr>
		<td colspan='4' class='text-right'>
			<h4>TOTAL</h4>
		</td>
		<th class='text-right'>
			<h4><?php echo number_format($TOTALFINAL,2);?></h4>
		</th>
	</tr>
<?php

}