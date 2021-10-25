<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<center>

		<?php 
			include("conexion.php");

			$id_usuario=$_REQUEST['id_usuario'];

			$query= "SELECT * FROM usuario where id_usuario='$id_usuario'";
			$resultado=$conexion->query($query);
			$row =$resultado->fetch_assoc();

				?>	

<form action="proceso_editar.php?id_usuario=<?php echo $row['id_usuario'] ?>" method="POST" enctype="multipart/form-data">
    
    <img src="data:image/jpg;base64, <?php echo base64_encode($row['Imagen']);?>">
       <input type="file" name="Imagen">
          <input type="submit" name="" value="Aceptar">
    
    
    </form>


	</center>
	
</body>
</html>