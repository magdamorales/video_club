
<?php
$con = mysqli_connect("localhost","root","","base_datos") or die ("ERROR");
?>
<html>
<head>
	<title>videoclub</title>
	<meta charset="UTF-8">
</head>
<body  background="img/peli.png">
	
	<font size="40"  color="white"> VIDEO CLUB </font><br/>
	<font size="32"  color="white"> Agregar Socio </font>
	<form  method="POST"  action="formulario.php">
		<label> DNI:<font></label>
		<input type="text" name="dn"placeholder="dni"><br/>
		<label>NOMBRES:</label>
		<input type="text" name="nom"placeholder="nombres"><br/>
		<label>APELLIDOS:</label>
		<input type="text" name="ape"placeholder="apellidos"><br/>
		<label>TELEFONO:</label>
		<input type="text" name="tel"placeholder="telefono"><br/>
		<label>DIRECCION:</label>
		<input type="text" name="dir"placeholder="direccion"><br/>
		<label>DIRECTORES:</label>
		<input type="text" name="direc"placeholder="directores_favoritos"><br/>
		<label>GENEROS:</label>
		<input type="text" name="gen"placeholder="generos_favoritos"><br/>
		<input type="submit" name="insert" value="insertar">
	</form>
	<?php
	if(isset($_POST['insert'])){
	    $dni= $_POST['dn'];
		$nombres = $_POST['nom'];
		$apellidos =  $_POST['ape'];
		$telefono = $_POST['tel'];
		$direccion = $_POST['dir'];
		$directores_favoritos = $_POST['direc'];
		$generos_favoritos = $_POST['gen'];


		$insertar = "call insertarsocios ('$dni','$nombres','$apellidos','$telefono','$direccion','$directores_favoritos','$generos_favoritos')";
		$ejecutar = mysqli_query($con,$insertar);
		if($ejecutar){
			echo"<h3> Insertado correctamente </h3>";
		}

	}

?>

<br/>
<table width="500" border="2" bgcolor="062A5C">
<tr>
<th>id</th>
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
	$id = $fila ['socios_id'];
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
    <td><?php echo $id; ?></td>	
	<td><?php echo $dni; ?></td>
	<td><?php echo $nombres; ?></td>
	<td><?php echo $apellidos; ?></td>
	<td><?php echo $telefono; ?></td>
	<td><?php echo $direccion; ?></td>
	<td><?php echo $directores_favoritos; ?></td>
	<td><?php echo $generos_favoritos; ?></td>
	<td><a href="formulario.php?editar=<?php echo $id; ?>">Editar </a></td>
	<td><a href="formulario.php?borrar=<?php echo $id; ?>">Borrar </a></td>
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
$borrar = "call borrar ('$borrar_dni')";
$ejecutar = mysqli_query($con,$borrar);
if($ejecutar){
echo"<script>alert('Usuario eliminado')</script>";
	echo "<script>window.open('formulario.php')</script>";
}

}

?>

</body>
</html>