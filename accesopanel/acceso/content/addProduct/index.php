<?php
session_start();
if($_SESSION["userAlmacen"]){
	if(isset($_POST['btnAgregar'])){
		include_once('../../php/funcionesAcceso.php');
		$tipo = isset($_POST['tipoAdd']) ? $_POST['tipoAdd']:"";
		$nombre = isset($_POST['nameAdd']) ? $_POST['nameAdd']:"";
		$nombre = htmlentities((utf8_decode($nombre)));
		$descripcion = isset($_POST['descripAdd']) ? $_POST['descripAdd']:"";
		$descripcion = htmlentities((utf8_decode($descripcion)));
		$precio = isset($_POST['precioAdd']) ? $_POST['precioAdd']:"";
		$precioAnterior = isset($_POST['preAntAdd']) ? $_POST['preAntAdd']:0;
		$tipoTalla = isset($_POST['tipoTallaAdd']) ? $_POST['tipoTallaAdd']:"";
		$id_color = isset($_POST['colorAdd']) ? $_POST['colorAdd']:"";
		$id_marca = isset($_POST['marcaAdd']) ? $_POST['marcaAdd']:"";
		$id_categoria = isset($_POST['catAdd']) ? $_POST['catAdd']:"";
		$id_material = isset($_POST['materialAdd']) ? $_POST['materialAdd']:"";
		$id_rango = isset($_POST['rangoAdd']) ? $_POST['rangoAdd']:"";
		$id_talla = isset($_POST['tallaAdd']) ? $_POST['tallaAdd']:"";
		$promocion = isset($_POST['promAdd']) ? $_POST['promAdd']:"";
		$img1 = isset($_FILES['fileImg1']['tmp_name']) ? $_FILES['fileImg1']['tmp_name']:"";
		$img2 = isset($_FILES['fileImg2']['tmp_name']) ? $_FILES['fileImg2']['tmp_name']:"";		
		$img3 = isset($_FILES['fileImg3']['tmp_name']) ? $_FILES['fileImg3']['tmp_name']:"";
		$id_almacen = $_SESSION['idAlmacen'];
		$id_centroComercial = $_SESSION['idCC'];
		/*Tipos de archivo recibidos
			if( $archivo_type == "image/pjpeg") $extension='.jpg'; 
			if( $archivo_type == "image/gif") $extension='.gif'; 
			if( $archivo_type == "image/png") $extension='.png'; */
		$carp = $_SESSION["userAlmacen"];
		$dirImages = "contentImages/$carp/";
		$destinacionImg1 = "";
		$destinacionImg2 = "";
		$destinacionImg3 = "";
		$rutaImg1 = "";		
		$rutaImg2 = "";
		$rutaImg3 = "";
		
		if ($img1 != ""){
			
	   		$img1_name= $_FILES['fileImg1']['name']; 
			$img1_size= $_FILES['fileImg1']['size'];
			$img1_type= $_FILES['fileImg1']['type']; 
			$destinacionImg1 = $dirImages.$carp.rand().$img1_name;
			
			if ($img1 != "none" AND $img1_size != 0){	
				if (file_exists($dirImages)) {
					
				} else {
					mkdir($dirImages, 0777);
					chmod($dirImages, 0777);
				}
						
				
				if (move_uploaded_file($img1 , $destinacionImg1)) { 
					if( $img1_type == "image/jpg"|| $img1_type =="image/jpeg")	{				 
						createCutImgJPG($destinacionImg1,$_POST['x1'],$_POST['y1'],$_POST['w1'],$_POST['h1']);
					}else if( $img1_type == "image/png"){
						createCutImgPNG($destinacionImg1,$_POST['x1'],$_POST['y1'],$_POST['w1'],$_POST['h1']);
					}
					$rutaImg1 = "http://localhost/buscame/accesopanel/acceso/content/addProduct/$destinacionImg1";
				} 
			}
			
		}
		if ($img2 != ""){
			
	   		$img2_name= $_FILES['fileImg2']['name']; 
			$img2_size= $_FILES['fileImg2']['size'];
			$img2_type= $_FILES['fileImg2']['type']; 
			$destinacionImg2 = $dirImages.$carp.rand().$img2_name;
			
			if ($img2 != "none" AND $img2_size != 0){	
				if (file_exists($dirImages)) {
					
				} else {
					mkdir($dirImages, 0777);
					chmod($dirImages, 0777);
				}
						
				
				if (move_uploaded_file($img2 , $destinacionImg2)) { 
					if( $img2_type == "image/jpg"|| $img2_type =="image/jpeg")	{				 
						createCutImgJPG($destinacionImg2,$_POST['x2'],$_POST['y2'],$_POST['w2'],$_POST['h2']);
					}else if( $img2_type == "image/png"){
						createCutImgPNG($destinacionImg2,$_POST['x2'],$_POST['y2'],$_POST['w2'],$_POST['h2']);
					}
					$rutaImg2 = "http://localhost/buscame/accesopanel/acceso/content/addProduct/$destinacionImg2";
				} 
			}
			
		}
		if ($img3 != ""){
			
	   		$img3_name= $_FILES['fileImg3']['name']; 
			$img3_size= $_FILES['fileImg3']['size'];
			$img3_type= $_FILES['fileImg3']['type']; 
			$destinacionImg3 = $dirImages.$carp.rand().$img3_name;
			
			if ($img3 != "none" AND $img3_size != 0){	
				if (file_exists($dirImages)) {
					
				} else {
					mkdir($dirImages, 0777);
					chmod($dirImages, 0777);
				}
						
				
				if (move_uploaded_file($img3 , $destinacionImg3)) { 
					if( $img3_type == "image/jpg"|| $img3_type =="image/jpeg")	{				 
						createCutImgJPG($destinacionImg3,$_POST['x3'],$_POST['y3'],$_POST['w3'],$_POST['h3']);
					}else if( $img3_type == "image/png"){
						createCutImgPNG($destinacionImg3,$_POST['x3'],$_POST['y3'],$_POST['w3'],$_POST['h3']);
					}
					$rutaImg3 = "http://localhost/buscame/accesopanel/acceso/content/addProduct/$destinacionImg3";
				} 
			}
			
		}
		$agregar=new accesoBuscame;
		$consulta = $agregar->agregarProducto($tipo,$nombre,$descripcion,$precio,$precioAnterior,$id_rango,$id_color,$id_marca,$id_categoria,$id_material,$tipoTalla,$id_talla,0,$promocion,$rutaImg1,$rutaImg2,$rutaImg3,$id_almacen,$id_centroComercial);
		header('Location: http://localhost/buscame/accesopanel/acceso/content/#agregar_tab');
	}
}else{
	header('Location: http://localhost/buscame/accesopanel/acceso');
}

function createCutImgJPG($destinacionImg,$x,$y,$w,$h){
	$img_origen = imagecreatefromjpeg( $destinacionImg );
	$ancho_origen = imagesx( $img_origen );//se ontiene el ancho de la imagen
	$alto_origen = imagesy( $img_origen );//se obtiene el alto de la imagen
	$ancho_limite=500;
	$jpeg_quality =100;
	
	//if($ancho_origen>$alto_origen){// para foto horizontal
		
		$ancho_origen=$ancho_limite;
		$alto_origen=$ancho_limite*imagesy( $img_origen )/imagesx( $img_origen );
		
	//}else{//para fotos verticales
		//$alto_origen=$ancho_limite;
		//$ancho_origen=$ancho_limite*imagesx( $img_origen )/imagesy( $img_origen );
	//}
	$img_destino = imagecreatetruecolor($ancho_origen ,$alto_origen );// se crea la imagen segun las dimensiones dadas
	// copy/resize as usual
	
	imagecopyresized( $img_destino, $img_origen, 0, 0, 0, 0, $ancho_origen, $alto_origen, imagesx( $img_origen ), imagesy( $img_origen ) );
	imagejpeg( $img_destino, $destinacionImg,$jpeg_quality );//se guarda la nueva foto 
	
	$targ_w = $targ_h = 400;
	$img_r = imagecreatefromjpeg($destinacionImg);
	$dst_r = ImageCreateTrueColor( $targ_w, $targ_h );
	
	$ancho_origen = imagesx( $img_r );
	$alto_origen = imagesy( $img_r );

	imagecopyresampled($dst_r,$img_r,0,0,$x,$y,$targ_w,$targ_h,$w,$h);

		
	imagejpeg($dst_r,$destinacionImg,$jpeg_quality);
}
function createCutImgPNG($destinacionImg,$x,$y,$w,$h){
	$img_origen = imagecreatefrompng( $destinacionImg );
	$ancho_origen = imagesx( $img_origen );//se ontiene el ancho de la imagen
	$alto_origen = imagesy( $img_origen );//se obtiene el alto de la imagen
	$ancho_limite=500;
	$jpeg_quality =9;
	//if($ancho_origen>$alto_origen){// para foto horizontal
		
		$ancho_origen=$ancho_limite;
		$alto_origen=$ancho_limite*imagesy( $img_origen )/imagesx( $img_origen );
		
	//}else{//para fotos verticales
		//$alto_origen=$ancho_limite;
		//$ancho_origen=$ancho_limite*imagesx( $img_origen )/imagesy( $img_origen );
	//}
	$img_destino = imagecreatetruecolor($ancho_origen ,$alto_origen );// se crea la imagen segun las dimensiones dadas
	// copy/resize as usual
	
	imagecopyresized( $img_destino, $img_origen, 0, 0, 0, 0, $ancho_origen, $alto_origen, imagesx( $img_origen ), imagesy( $img_origen ) );
	imagepng( $img_destino, $destinacionImg,$jpeg_quality );//se guarda la nueva foto 
	$targ_w = $targ_h = 400;
	$img_r = imagecreatefrompng($destinacionImg);
	$dst_r = ImageCreateTrueColor( $targ_w, $targ_h );
	
	$ancho_origen = imagesx( $img_r );
	$alto_origen = imagesy( $img_r );

	imagecopyresampled($dst_r,$img_r,0,0,$x,$y,$targ_w,$targ_h,$w,$h);

		
	imagepng($dst_r,$destinacionImg,$jpeg_quality);
}

?>