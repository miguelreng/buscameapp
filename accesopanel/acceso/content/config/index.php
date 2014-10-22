<?
session_start();
if($_SESSION["userAlmacen"]){
	if(isset($_POST['btnImgAl'])){
		include_once('../../php/funcionesAcceso.php');
		$img = isset($_FILES['imgFileAlmacen']['tmp_name']) ? $_FILES['imgFileAlmacen']['tmp_name']:"";
		
		if ($img != ""){
			
	   		$img_name= $_FILES['imgFileAlmacen']['name']; 
			$img_size= $_FILES['imgFileAlmacen']['size'];
			$img_type= $_FILES['imgFileAlmacen']['type']; 
			$carp = $_SESSION["userAlmacen"];
			$dirImages = "../addProduct/contentImages/$carp/";	
			$temp = $carp.rand().$img_name;		
			$destinacionImg = $dirImages.$temp;
			$dirImages = "contentImages/$carp/";
			$destinacion = $dirImages.$temp;
			$dirImages = "../addProduct/contentImages/$carp/";
			if ($img!= "none" AND $img_size != 0){	
				if (file_exists($dirImages)) {
					
				} else {
					mkdir($dirImages, 0777);
					chmod($dirImages, 0777);
				}				
				if (move_uploaded_file($img, $destinacionImg)) { 
					if( $img_type == "image/jpg"|| $img_type =="image/jpeg")	{				 
						createImgJPG($destinacionImg);
					}else if( $img1_type == "image/png"){
						createImgPNG($destinacionImg);
					}
					$rutaImg1 = "http://localhost/buscame/accesopanel/acceso/content/addProduct/$destinacion";
					$_SESSION['imgAlmacen'] = $rutaImg1;
					$agregar=new accesoBuscame;
					$subirImg = $agregar->changeImgAl($_SESSION['idAlmacen'],$rutaImg1);
					header('Location: http://localhost/buscame/accesopanel/acceso/content/#configuracion_tab');
				} 
			}
			
		}		
	}else if(isset($_POST['btnGuar'])){
		include_once('../../php/funcionesAcceso.php');
		$nombre = isset($_POST['nombreAl']) ? $_POST['nombreAl']:"";
		$nombre = htmlentities((utf8_decode($nombre)));
		$descripcion = isset($_POST['descripAl']) ? $_POST['descripAl']:"";
		$descripcion = htmlentities((utf8_decode($descripcion)));
		$local = isset($_POST['localAl']) ? $_POST['localAl']:"";
		$telefono = isset($_POST['telAl']) ? $_POST['telAl']:"";
		$centroComercial = isset($_POST['ccAl']) ? $_POST['ccAl']:"";
		
		$config = new accesoBuscame;
		$configu =$config->configAl($_SESSION['idAlmacen'],$nombre,$descripcion,$local,$telefono,$centroComercial);
		
		$_SESSION['nameAlmacen'] = utf8_encode($nombre);
		$_SESSION['idCC'] = $centroComercial;
		$_SESSION['localAlmacen'] = $local;
		$_SESSION['descripcionAlmacen'] = utf8_encode($descripcion);
		$_SESSION['telefonoAlmacen'] = $telefono;
		
		header('Location: http://localhost/buscame/accesopanel/acceso/content/#configuracion_tab');
		
	}
}else{
	header('Location: http://localhost/buscame/accesopanel/acceso');
}
function createImgJPG($destinacionImg){
	$img_origen = imagecreatefromjpeg( $destinacionImg );
	$ancho_origen = imagesx( $img_origen );//se ontiene el ancho de la imagen
	$alto_origen = imagesy( $img_origen );//se obtiene el alto de la imagen
	$ancho_limite=500;
	$jpeg_quality =100;
	
	$ancho_origen=$ancho_limite;
	$alto_origen=$ancho_limite*imagesy( $img_origen )/imagesx( $img_origen );
	$img_destino = imagecreatetruecolor($ancho_origen ,$alto_origen );// se crea la imagen segun las dimensiones dadas
	
	imagecopyresized( $img_destino, $img_origen, 0, 0, 0, 0, $ancho_origen, $alto_origen, imagesx( $img_origen ), imagesy( $img_origen ) );
	imagejpeg( $img_destino, $destinacionImg,$jpeg_quality );//se guarda la nueva foto 
	
}
function createImgPNG($destinacionImg){
	$img_origen = imagecreatefrompng($destinacionImg);
	$ancho_origen = imagesx( $img_origen );//se ontiene el ancho de la imagen
	$alto_origen = imagesy( $img_origen );//se obtiene el alto de la imagen
	$ancho_limite=500;
	$jpeg_quality =9;
	$ancho_origen=$ancho_limite;
	$alto_origen=$ancho_limite*imagesy( $img_origen )/imagesx( $img_origen );
	$img_destino = imagecreatetruecolor($ancho_origen ,$alto_origen );// se crea la imagen segun las dimensiones dadas
	
	imagecopyresized( $img_destino, $img_origen, 0, 0, 0, 0, $ancho_origen, $alto_origen, imagesx( $img_origen ), imagesy( $img_origen ) );
	imagepng( $img_destino, $destinacionImg,$jpeg_quality );//se guarda la nueva foto 
	
}

?>