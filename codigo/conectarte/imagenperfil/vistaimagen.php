<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Perfil usuario</title>
</head>
<body>
	<table >
		<thead>
			<tr>
				<tr>
					<a href="index.php"></a>
				</tr>
				<th>id_usuario</th>
				<th>nombre</th>
				
				<th>Perfil</th><th>
					<th>rol_id</th></th>
			</tr>
		</thead>
		<tbody>
			
	
		<?php 
			include("conexion.php");
			$query= "SELECT * FROM imagen";
			$resultado=$conexion->query($query);
			while($row =$resultado->fetch_assoc()){
				?>
				<tr>
					<td><?php echo $row['id_imagen']; ?>	</td>
					<td> <?php echo $row['nombre'];?></td>
					
				    <td>	<img src="data:image/jpg;base64, <?php echo base64_encode($row['Imagen']);?>"/></td>
				 
					<th> <a href="a" >editar</a></th>
					<th> <a href="a" >eliminar</a></th>
				</tr>
				<?php
				
			}
		?>
			</tbody>
	</table>

</body>
</html>