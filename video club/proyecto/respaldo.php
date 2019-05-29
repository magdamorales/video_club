<!DOCTYPE html>
<meta charset="UTF-8">
<?php
$con = mysqli_connect("localhost","root","","base_datos") or die ("ERROR");
?>
<html>
<head>
	<title>videoclub</title>
	<meta charset="UTF-8">
</head>
<body  background="img/mag.png">
	
	<font size="40"  color="black"> VIDEO CLUB </font>
	<form  method="POST"  action="formulario.php">
		<label>  <font color="#F96E02" size="5" >DNI:<font></label>
		<input color="black"type="text" name="dni"placeholder="dni"><br/>
		<label>NOMBRES:</label>
		<input type="text" name="nombres"placeholder="nombres"><br/>
		<label>APELLIDOS:</label>
		<input type="text" name="apellidos"placeholder="apellidos"><br/>
		<label>TELEFONO:</label>
		<input type="text" name="telefono"placeholder="telefono"><br/>
		<label>DIRECCION:</label>
		<input type="text" name="direccion"placeholder="direccion"><br/>
		<label>DIRECTORES:</label>
		<input type="text" name="directores_favoritos"placeholder="directores_favoritos"><br/>
		<label>GENEROS:</label>
		<input type="text" name="generos_favoritos"placeholder="generos_favoritos"><br/>
		<input type="submit" name="insert" value="insertar">
	</form>
	<?php
	if(isset($_POST['insert'])){
	    $dni= $_POST['dni'];
		$nombres = $_POST['nombres'];
		$apellidos =  $_POST['apellidos'];
		$telefono = $_POST['telefono'];
		$direccion = $_POST['direccion'];
		$directores_favoritos = $_POST['directores_favoritos'];
		$generos_favoritos = $_POST['generos_favoritos'];


		$insertar = "INSERT INTO socios (dni,nombres,apellidos,telefono,direccion,director,genero) VALUES ('$dni','$nombres','$apellidos','$telefono','$direccion','$directores_favoritos','$generos_favoritos',)";
		$ejecutar = mysqli_query($con,$insertar);
		if($ejecutar){
			echo"<h3> Insertado correctamente </h3>";
		}

	}

?>

<br/>
<table width="500" border="2" style="background-color:#0E0E0E;">
<tr>
<th>dni</th>
<th>nombres </th>
<th>apellidos</th>
<th>telefono</th>
<th>direccion</th>
<th>directores_favoritos</th>
<th>generos_favoritos</th>
</tr>

<?php
$consulta="SELECT * FROM socios";
$ejecutar=mysqli_query($con,$consulta);
$i=0;
while ($fila = mysqli_fetch_array($ejecutar)){
	$dni = $fila['dni'];
	$nombres = $fila['nombres'];
	$apellidos = $fila['apellidos'];
	$telefono = $fila['telefono'];
	$direccion = $fila['direccion'];
	$directores_favoritos = $fila['directores_favoritos'];
	$generos_favoritos = $fila['generos_favoritos'];

	$i++;
	?>
    <tr align="center">

	<td><?php echo $dni; ?></td>
	<td><?php echo $nombres; ?></td>
	<td><?php echo $apellidos; ?></td>
	<td><?php echo $telefono; ?></td>
	<td><?php echo $direccion; ?></td>
	<td><?php echo $directores_favoritos; ?></td>
	<td><?php echo $generos_favoritos; ?></td>
	<td><a href="formulario.php?editar=<?php echo $dni; ?>">Editar </a></td>
	<td><a href="formulario.php?borrar=<?php echo $dni; ?>">Borrar </a></td>
	</tr>

<?php } ?>
</table>
<?php
if(isset($_GET['editar'])){

	include("editar.php");

}
?>
<?php

if(isset($_GET['borrar'])){
$borrar_dni = $_GET['borrar'];
$borrar = "DELETE FROM socios WHERE dni= $borrar_dni";
$ejecutar = mysqli_query($con,$borrar);
if($ejecutar){
echo"<script>alert('Usuario eliminado')</script>";
	echo "<script>window.open('formulario.php')</script>";
}

}

?>

</body>
</html>




<?php

if(isset($_GET['editar'])){
	$editar_dni = $_GET['editar'];
    $consulta = "SELECT * FROM  socios WHERE socios_dni=$editar_dni";
	$ejecutar = mysqli_query($con,$consulta);
    $fila = mysqli_fetch_array($ejecutar);
    $dni = $fila['dni'];
	$nombres = $fila['nombres'];
	$apellidos = $fila['apellidos'];
	$telefono = $fila['telefono'];
	$direccion = $fila['direccion'];
	$directores_favoritos = $fila['directores_favoritos'];
    $generos_favoritos = $fila['generos_favoritos'];
    

}
?>
<br/>
<form method="POST" action="">
	<input type="text" name="dni" value="<?php echo $dni;?>"><br/>
	<input type="text" name="nombres" value="<?php echo $nombres;?>"><br/>
	<input type="text" name="apellidos" value="<?php echo $apellidos;?>"><br/>
	<input type="text" name="telefono" value="<?php echo $telefono;?>"><br/>
	<input type="text" name="direccion" value="<?php echo $direccion;?>"><br/>
	<input type="text" name="directores_favoritos" value="<?php echo $directores_favoritos;?>"><br/>
	<input type="text" name="generos_favoritos" value="<?php echo $generos_favoritos;?>"><br/>
	<input type="submit" name="actualizar" value="actualizar datos">
</form>

<?php
if(isset($_POST['actualizar'])){

$actualizar_nombres = $_POST['nombres'];
$actualizar_apellidos = $_POST['apellidos'];
$actualizar_telefono = $_POST['telefono'];
$actualizar_direccion = $_POST['direccion'];
$actualizar_directores_favoritos = $_POST['directores_favoritos'];
$actualizar_generos_favoritos = $_POST['generos_favoritos'];
 

 $actualizar = "UPDATE socios SET  nombres='$actualizar_nombres',apellidos='$actualizar_apellidos',telefono='$actualizar_telefono',dierccion='$actualizar_direccion',directores_favoritos='$actualizar_directores_favoritos',generos_favoritos='$actualizar_generos_favoritos'";
$ejecutar = mysqli_query($con,$actualizar);



if($ejecutar){
	echo"<script>alert('Datos actualizados')</script>";
	echo "<script>window.open('formulario.php')</script>";
}

}

?>











<?php
if(isset($_POST['actualizar'])){
$actualizar_dni = $_POST['dn'];
$actualizar_nombres = $_POST['nombre'];
$actualizar_apellidos = $_POST['apellido'];
$actualizar_telefono = $_POST['telefon'];
$actualizar_direccion = $_POST['direccio'];
$actualizar_directores_favoritos = $_POST['directores_favorito'];
$actualizar_generos_favoritos = $_POST['generos_favorito'];
 

 $update = "call modificar ('$editar_dni','$actualizar_nombres','$actualizar_apellidos','$actualizar_telefono','$actualizar_direccion','$actualizar_directores_favoritos','$actualizar_generos_favoritos')";
$ejecutar = mysqli_query($con,$update);



if($ejecutar){
	echo "<h3> modificado </h3>";
}
else echo "<h3> no hay conexion </h3>";
}

?>