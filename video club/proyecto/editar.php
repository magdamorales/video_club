<?php
if(isset($_GET['editar'])){
	$editar_id = $_GET['editar'];
	$consulta = "SELECT*FROM socios WHERE socios_id= $editar_id";
	$ejecutar = mysqli_query($con,$consulta);
	$fila = mysqli_fetch_array($ejecutar);
	
	$dni = $fila['dni'];
	$nombre = $fila['nombres'];
	$apellido = $fila['apellidos'];
	$telefono = $fila['telefono'];
	$direccion = $fila['direccion'];
	$directores_favoritos = $fila['directores_favoritos'];
	$generos_favoritos= $fila['generos_favoritos'];
}
?>
<br><br>
<form  method="POST"  action="">
	<input type="text" name="dn" placeholder="dni" value="<?php echo $dni;?>">
	<input type="text" name="nom" placeholder="nombre" value="<?php echo $nombre;?>">
	<input type="text" name="ape" placeholder="apellido" value="<?php echo $apellido;?>">
	<input type="text" name="tel" placeholder="telefono" value="<?php echo $telefono;?>">
	<input type="text" name="dir" placeholder="direccion" value="<?php echo $direccion;?>">
	<input type="text" name="direc" placeholder="directores_favoritos" value="<?php echo $directores_favoritos;?>">
	<input type="text" name="gen" placeholder="generos_favoritos" value="<?php echo $generos_favoritos;?>">

	<input type="submit" name="actualiza"  value="actualizar datos">
</form>
<?php
if(isset($_POST['actualiza'])){

	$actualiza_dni =$_POST['dn'];
	$actualiza_nombres =$_POST['nom'];
	$actualiza_apellidos =$_POST['ape'];
	$actualiza_telefono =$_POST['tel'];
	$actualiza_direccion =$_POST['dir'];
	$actualiza_directores_favoritos=$_POST['direc'];
	$actualiza_generos_favoritos =$_POST['gen'];


	$actualiza= "UPDATE socios SET nombres='$actualiza_nombres',apellidos='$actualiza_apellidos',telefono='$actualiza_telefono',direccion='$actualiza_direccion',directores_favoritos='$actualiza_directores_favoritos',generos_favoritos='$actualiza_generos_favoritos' WHERE socios_id='$editar_id'";
	$ejecutar = mysqli_query($con,$actualiza);

	if($ejecutar){
		echo "<script>alert('Datos actualizados!')</script>";
		echo "<script>window.open('formulario.php','_self')</script>";
	}
}
?>