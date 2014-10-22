<html>
<body>
<form action="" method="post" enctype="multipart/form-data">
    <label for="file">Sube un archivo:</label>
    <input type="file" name="archivo" id="archivo" />
    <input type="submit" name="boton" value="Subir" />
    <img src="http://buscameapp.com/imgC/prueba/iphone as.png">
</form>
<div class="resultado">
<?php
if(isset($_POST['boton'])){
   $archivo_name= $_FILES['archivo']['name']; 
$archivo_size= $_FILES['archivo']['size']; 
$archivo_type= $_FILES['archivo']['type']; 
$archivo= $_FILES['archivo']['tmp_name']; 
echo $archivo; 
$MAX_FILE_SIZE= 2000000; 

if( $archivo_type == "image/pjpeg") $extension='.jpg'; 
if( $archivo_type == "image/gif") $extension='.gif'; 

if ($archivo != ""){ 
if ($archivo != "none" AND $archivo_size != 0 AND $archivo_size<=$MAX_FILE_SIZE){ 


if (move_uploaded_file($archivo , "prueba/$archivo_name")) { 
echo "<h2>Se ha transferido el archivo $archivo_name</h2>"; 
echo "<br>Su tamaño es: $archivo_size bytes<br>"; 
echo "<br>El fichero es tipo: $archivo_type <br>"; 
} 
}else{ 
echo "<h2>No ha podido transferirse el fichero</h2>"; 
echo "<h3>su tamaño no puede exceder de $lim_tamano bytes</h2>"; 
} }
}
?>
</div>
</body>
</html>