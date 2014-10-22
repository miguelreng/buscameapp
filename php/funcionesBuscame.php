<?php 
 include_once("conex.php");
 //implementamos la clase acceso
 class accesoBuscame{

  	//constructor 
  	function accesoBuscame(){
  	}

  	// consulta los usuarios de la BD
  	function consultar($usuario, $contrasena){
   		//creamos el objeto $con a partir de la clase DBManager
   		$con = new DBManager;
   		//usamos el metodo conectar para realizar la conexion
   		if($con->conectar()==true){
    		$sql = "SELECT * FROM acceso WHERE usuario = '$usuario' and pass = '$contrasena' ";
			$datos = mysqli_query( $con->conect	,$sql );
    		if (!$datos)
     			return false;
    		else
     			return $datos;
   		}
  	}
	
	function getCentroComercial($id){		
		//creamos el objeto $con a partir de la clase DBManager
   		$con = new DBManager;
   		//usamos el metodo conectar para realizar la conexion
   		if($con->conectar()==true){
    		if($id=="all"){
				$sql = "select * from centrocomercial";
			}else{
				$sqlAl = "select id_centrocomercial from producto where id_tipo = '$id'";
				$datosAl = mysqli_query($con->conect,$sqlAl);	
				$ids = "";		
				while($row = mysqli_fetch_array($datosAl)){
					$ids .=$row['id_centrocomercial'].","; 
				}
				$ids1 = explode(',',$ids);
				$ids2 = array_unique($ids1);
				$sql = "select * from centrocomercial where id_centroComercial in ('".implode("','",$ids2)."')";
			}
			$datos = mysqli_query($con->conect,$sql);
			if(!$datos){
				return false;
			}else{
				return $datos;
			}
   		}
					
	}
	
	//Devuelve los datos de la categoria
	function getCategoria(){
		$con = new DBManager;
		
		if($con->conectar()==true){
			$sql = "select * from categoria order by categoria";
			$datos = mysqli_query($con->conect,$sql);
			if(!$datos){
				return false;
			}else{
				return $datos;
			}
		}
	}
	//Devuelve los datos del rango
	function getRango(){
		$con = new DBManager;
		
		if($con->conectar()==true){
			$sql = "select * from rango";
			$datos = mysqli_query($con->conect,$sql);
			if(!$datos){
				return false;
			}else{
				return $datos;
			}
		}
	}
	//Devuelve los datos del color
	function getColor($id){
		$con = new DBManager;
		
		if($con->conectar()==true){
			if($id=="all"){
				$sql = "select * from color";
			}else{
				$sqlCo = "select id_color from producto where id_tipo = '$id'";
				$datosCo = mysqli_query($con->conect,$sqlCo);	
				$ids = "";		
				while($row = mysqli_fetch_array($datosCo)){
					$ids .=$row['id_color'].","; 
				}
				$ids1 = explode(',',$ids);
				$ids2 = array_unique($ids1);
				$sql = "select * from color where id_color in ('".implode("','",$ids2)."') order by color";
			}
			$datos = mysqli_query($con->conect,$sql);
			if(!$datos){
				return false;
			}else{
				return $datos;
			}
		}
	}
	//Devuelve los datos de la marca
	function getMarca($id){
		$con = new DBManager;
		
		if($con->conectar()==true){
			if($id=="all"){
				$sql = "select * from marca";				
			}else{
				$sqlCo = "select id_marca from producto where id_tipo = '$id'";
				$datosCo = mysqli_query($con->conect,$sqlCo);	
				$ids = "";		
				while($row = mysqli_fetch_array($datosCo)){
					$ids .=$row['id_marca'].","; 
				}
				$ids1 = explode(',',$ids);
				$ids2 = array_unique($ids1);			
				$sql = "select * from marca where id_marca in ('".implode("','",$ids2)."') order by marca";
			}
			$datos = mysqli_query($con->conect,$sql);
			if(!$datos){
				return false;
			}else{
				return $datos;
			}
		}
	}
	
	//Devuelve los datos del material
	function getMaterial($id){
		$con = new DBManager;		
		if($con->conectar()==true && $id != null){			
			if($id=="all"){
				$sql = "select * from material";
			}else{
				$sqlMa = "select id_material from producto where id_tipo = '$id'";
				$datosMa = mysqli_query($con->conect,$sqlMa);	
				$ids = "";		
				while($row = mysqli_fetch_array($datosMa)){
					$ids .=$row['id_material'].","; 
				}
				$ids1 = explode(',',$ids);
				$ids2 = array_unique($ids1);
				implode(',',$ids2);
				$sql = "select * from material where id_material IN ('".implode("','",$ids2)."') order by material";
			}
			$datos = mysqli_query($con->conect,$sql);
			if(!$datos){
				return false;
			}else{
				return $datos;
			}
		}
	}
	
	
	function getTipo($id){
		$con = new DBManager;
		
		if($con->conectar()==true){
			if($id=="all"){
				$sql = "select * from tipo";
			}else{
				$sql = "select * from tipo where id_categoria='$id' order by tipo";
			}
			$datos = mysqli_query($con->conect,$sql);
			if(!$datos){
				return false;
			}else{
				return $datos;
			}
		}
	}
	function getAlmacen($id){
		$con = new DBManager;
		
		if($con->conectar()==true){
			if($id=="all"){
				$sql = "select * from almacenes";
			}else{
				$sql = "select * from almacenes where id_centroComercial='$id'";
			}
			$datos = mysqli_query($con->conect,$sql);
			if(!$datos){
				return false;
			}else{
				return $datos;
			}
		}
	}
	
	
	
	function getProductos($cat,$tipo,$rango,$color,$marca,$material,$cc,$almacen,$list,$talla,$limite){
		$con = new DBManager;
		
		if($con->conectar()==true){
			$sql = "select * from producto";		
			
			//Búsqueda con Categoría
			if($cat!="undefined"&&$cat!="all"&&$sql!="select * from producto"){
				$sql.=" and id_categoria='$cat'";
			}else if($cat!="undefined"&&$cat!="all"&&$sql=="select * from producto"){
				$sql.=" where id_categoria='$cat'";
			}
			
			//Búsqueda con tipo
			if($tipo!="undefined"&&$tipo!="all"&&$sql!="select * from producto"){
				$sql.=" and id_tipo='$tipo'";
			}else if($tipo!="undefined"&&$tipo!="all"&&$sql=="select * from producto"){
				$sql.=" where id_tipo='$tipo'";
			}
			
			//Búsqueda con rango
			if($rango!="undefined"&&$rango!="all"&&$sql!="select * from producto"){
				$sql.=" and id_rango='$rango'";
			}else if($rango!="undefined"&&$rango!="all"&&$sql=="select * from producto"){
				$sql.=" where id_rango='$rango'";
			}
			
			//Búsqueda con color
			if($color!="undefined"&&$color!="all"&&$sql!="select * from producto"){
				$sql.=" and id_color='$color'";
			}else if($color!="undefined"&&$color!="all"&&$sql=="select * from producto"){
				$sql.=" where id_color='$color'";
			}
			
			//Búsqueda con marca
			if($marca!="undefined"&&$marca!="all"&&$sql!="select * from producto"){
				$sql.=" and id_marca='$marca'";
			}else if($marca!="undefined"&&$marca!="all"&&$sql=="select * from producto"){
				$sql.=" where id_marca='$marca'";
			}
			
			//Búsqueda con material
			if($material!="undefined"&&$material!="all"&&$sql!="select * from producto"){
				$sql.=" and id_material='$material'";
			}else if($material!="undefined"&&$material!="all"&&$sql=="select * from producto"){
				$sql.=" where id_material='$material'";
			}
			
			//Búsqueda con almacén
			if($almacen!="undefined"&&$almacen!="all"&&$sql!="select * from producto"){
				$sql.=" and id_almacen='$almacen'";
			}else if($almacen!="undefined"&&$almacen!="all"&&$sql=="select * from producto"){
				$sql.=" where id_almacen='$almacen'";
			}
			
			//Búsqueda con centro comercial
			if($cc!="undefined"&&$cc!="all"&&$sql!="select * from producto"){
				$sql.=" and id_centrocomercial='$cc'";
			}else if($cc!="undefined"&&$cc!="all"&&$sql=="select * from producto"){
				$sql.=" where id_centrocomercial='$cc'";
			}		
			
			//Si está en promoción
			if($list=="promo" && $sql=="select * from producto"){
				$sql.=" where promocion='si'";
			}else if($list=="promo" && $sql!="select * from producto"){
				$sql.=" and promocion='si'";
			}
			
			//Búsqueda con talla
			if($talla!="undefined"&&$talla!="all"&&$sql!="select * from producto"){
				$sql.=" and id_talla='$talla'";
			}else if($talla!="undefined"&&$talla!="all"&&$sql=="select * from producto"){
				$sql.=" where id_talla='$talla'";
			}
			
			//Precio menor
			if($list=="menor" && $rango=="all"){
				$sql.=" order by precio asc limit 20";
			}else if($list=="menor" && $sql!="select * from producto" && $rango!="all"&& $rango!="undefined"){
				$sql.=" and id_rango='$rango' order by precio asc limit 20 ";
			}else if($list=="menor" && $sql=="select * from producto" && $rango=="all"){
				$sql.=" id_rango='$rango' order by precio asc limit 20 ";
			}
			
			//Límite de resultado == 5
			if($limite!=""&&$list!="menor"){
				$limite1 = $limite-5;
				$sql.=" limit $limite1,5";
			}
			
			$datos = mysqli_query($con->conect,$sql);
			if(!$datos){
				return false;
			}else{
				return $datos;
			}
		}
		
	}
	
	function getSolaMarca($id){
		$con = new DBManager;
		
		if($con->conectar()==true){
			$sql = "select marca from marca where id_marca='$id' ";
			$datos = mysqli_query($con->conect,$sql);
			$row = mysqli_fetch_array($datos);
			if(!$row){
				return false;
			}else{
				return $row['marca'];
			}
		}
	}
	
	function getTalla($id){
		$con = new DBManager;
		
		if($con->conectar()==true){
			$sqlTa = "select tipoTalla from producto where id_tipo='$id' ";
			$datosTa = mysqli_query($con->conect,$sqlTa);	
			$ids = "";		
			while($row = mysqli_fetch_array($datosTa)){
				$ids .=$row['tipoTalla'].","; 
			}
			
			$ids1 = explode(',',$ids);
			$ids2 = array_unique($ids1);
			implode(',',$ids2);
			$ids2= str_replace(" ","",$ids2 ); 
			$sql = "select * from talla where tipoTalla IN ('".implode("','",$ids2)."')";
						
			
			$datos = mysqli_query($con->conect,$sql);
			if(!$datos){
				return false;
			}else{
				return $datos;
			}
		}
	}
	function getListaProductos($id){
		$con = new DBManager;
		if($con->conectar()==true){
			
			$sql="select * from producto where id_producto='$id'";
			$datos = mysqli_query($con->conect,$sql);
			if(!$datos){
				return false;
			}else{
				return $datos;
			}	
		}
	}
	function getSoloPrecio($id){
		$con = new DBManager;
		
		if($con->conectar()==true){
			$sql = "select precio from producto where id_producto='$id' ";
			$datos = mysqli_query($con->conect,$sql);
			$row = mysqli_fetch_array($datos);
			if(!$row){
				return false;
			}else{
				return $row['precio'];
			}
		}
	}
	function getSoloColor($id){
		$con = new DBManager;
		
		if($con->conectar()==true){
			$sql = "select color from color where id_color='$id' ";
			$datos = mysqli_query($con->conect,$sql);
			$row = mysqli_fetch_array($datos);
			if(!$row){
				return false;
			}else{
				return $row['color'];
			}
		}
	}
	function getSoloAlmacen($id){
		$con = new DBManager;
		
		if($con->conectar()==true){
			$sql = "select almacen from almacenes where id_almacen='$id' ";
			$datos = mysqli_query($con->conect,$sql);
			$row = mysqli_fetch_array($datos);
			if(!$row){
				return false;
			}else{
				return $row['almacen'];
			}
		}
	}
	function getTipoTallaSegunId($id){
		$con = new DBManager;		
		if($con->conectar()==true && $id != null){			
			$sql = "select tipoTalla from talla where id_talla = '$id'";			
			$datos = mysqli_query($con->conect,$sql);
			$row = mysqli_fetch_array($datos);
			if(!$row){
				return false;
			}else{
				return $row['tipoTalla'];
			}
		}
	}
	
	function getAlmacenSoloId($id){
		$con = new DBManager;
		if($con->conectar()==true){
			
			$sql="select * from almacenes where id_almacen='$id'";
			$datos = mysqli_query($con->conect,$sql);
			if(!$datos){
				return false;
			}else{
				return $datos;
			}	
		}
	}
	
	function getCCName($id){
		$con = new DBManager;
		if($con->conectar()==true){			
			$sql="select * from centrocomercial where id_centroComercial='$id'";
			$datos = mysqli_query($con->conect,$sql);
			$row = mysqli_fetch_array($datos);
			if(!$row){
				return false;
			}else{
				return $row['centrocomercial'];
			}	
		}
		
	}
	function getCCSolo($id_almacen){
		$con = new DBManager;
		if($con->conectar()==true){			
			$sql="select id_centrocomercial from almacenes where id_almacen='$id_almacen'";
			$datos = mysqli_query($con->conect,$sql);
			$row = mysqli_fetch_array($datos);
			if(!$row){
				return false;
			}else{
				return $row['id_centrocomercial'];
			}	
		}
		
	}
	function getMenorPrecio($id){
		$con = new DBManager;
		if($con->conectar()==true){
			if($id=="all"){
				$sql = "select * from producto order by precio asc limit 20 ";
			}else{
				$sql = "select * from producto where id_rango='$id' order by precio asc limit 20 ";
			}
			$datos = mysqli_query($con->conect,$sql);
			if(!$datos){
				return false;
			}else{
				return $datos;
			}	
		}
	}
	
	function insertLike($usuario,$id_producto,$id_almacen){
		$con = new DBManager;
		if($con->conectar()==true){
			
			if($id_producto==""){
				$sqlI = "INSERT INTO  buscame.like (id_like ,usuario , id_producto, id_almacen)VALUES ('null',  '$usuario',  '0',  '$id_almacen')";
				$sql = "update almacenes set likes=likes+1 where id_almacen='$id_almacen'";
				$datos = mysqli_query($con->conect,$sql);
			}
			if($id_almacen==""){
				$sqlI = "INSERT INTO  buscame.like (id_like ,usuario , id_producto, id_almacen)VALUES ('null',  '$usuario',  '$id_producto',  '0')";
				$sql = "update producto set likes=likes+1 where id_producto='$id_producto'";		
				$datos = mysqli_query($con->conect,$sql);
			}
			$datos = mysqli_query($con->conect,$sqlI);
			if(!$datos){
				return false;
			}else{
				return $datos;
			}
		}
	}
	
	
	function getLikes($id_producto,$id_almacen){
		$con = new DBManager;
		if($con->conectar()==true){
			if($id_producto!=""){
				$sql="select likes from producto where id_producto='$id_producto'";
				$datos = mysqli_query($con->conect,$sql);
			}
			if($id_almacen!=""){
				$sql="select likes from almacenes where id_almacen='$id_almacen'";
				$datos = mysqli_query($con->conect,$sql);
			}
			if(!$datos){
				return false;
			}else{
				return $datos;
			}	
		}
	}
	
	function getLikeIt($id_producto,$id_almacen,$usuario){
		$con = new DBManager;
		if($con->conectar()==true){
			if($id_producto!="" &&$id_producto!=null &&$id_producto!="undefined"){
				$sqlusuario="select usuario from buscame.like where id_producto='$id_producto' and usuario='$usuario'";
				$datosusuario = mysqli_query($con->conect,$sqlusuario);
				$row = mysqli_fetch_array($datosusuario);
				if(!$row){
					$resp = "noLike";
				}else{
					$resp = "yesLike";
				}
			}
			if($id_almacen!=""){
				$sqlusuario="select usuario from buscame.like where id_almacen='$id_almacen' and usuario='$usuario'";
				$datosusuario = mysqli_query($con->conect,$sqlusuario);
				$row = mysqli_fetch_array($datosusuario);
				if(!$row){
					$resp = "noLike";
				}else{
					$resp = "yesLike";
				}
			}
			
			echo $resp;	
		}
	}
	function getSolaTalla($id){
		$con = new DBManager;		
		if($con->conectar()==true){
			$sql = "select talla from talla where id_talla='$id' ";
			$datos = mysqli_query($con->conect,$sql);
			$row = mysqli_fetch_array($datos);
			if(!$row){
				return false;
			}else{
				return $row['talla'];
			}
		}
	}
	function getLatitudCC($id){
		$con = new DBManager;		
		if($con->conectar()==true){
			$sqlAl = "select id_centroComercial from almacenes where id_almacen='$id'";
			$datosAl = mysqli_query($con->conect,$sqlAl);
			$rowAl = mysqli_fetch_array($datosAl);
			$sql = "SELECT * FROM centrocomercial WHERE id_centroComercial='".$rowAl['id_centroComercial']."'";
			$datos = mysqli_query($con->conect,$sql);
			$row = mysqli_fetch_array($datos);
			if(!$row){
				return false;
			}else{
				return $row['latitud'];
			}
		}	
	}
	
	function getLongitudCC($id){
		$con = new DBManager;		
		if($con->conectar()==true){
			$sqlAl = "select id_centroComercial from almacenes where id_almacen='$id'";
			$datosAl = mysqli_query($con->conect,$sqlAl);
			$rowAl = mysqli_fetch_array($datosAl);
			$sql = "SELECT * FROM centrocomercial WHERE id_centroComercial='".$rowAl['id_centroComercial']."'";
			$datos = mysqli_query($con->conect,$sql);
			$row = mysqli_fetch_array($datos);
			if(!$row){
				return false;
			}else{
				return $row['longitud'];
			}
		}	
	}
	function getCC($id_centrocomercial){
		$con = new DBManager;		
		if($con->conectar()==true){
			$sql = "select * from centrocomercial where id_centrocomercial='$id_centrocomercial'";
			$datos = mysqli_query($con->conect,$sql);
			if(!$datos){
				return false;
			}else{
				return $datos;
			}
		}
	}
	function meGustan($usuario, $limite){
		$con = new DBManager;		
		if($con->conectar()==true){
			$limite1 = $limite-5;
			$sql = "select id_producto from buscame.like where usuario='$usuario' limit $limite1,5";
			$datos = mysqli_query($con->conect,$sql);
			if(!$datos){
				return false;
			}else{
				return $datos;
			}
		}
	}
	function getProducto($id_producto){
		$con = new DBManager;		
		if($con->conectar()==true){
			$sql = "select * from producto where id_producto='$id_producto'";
			$datos = mysqli_query($con->conect,$sql);
			if(!$datos){
				return false;
			}else{
				return $datos;
			}
		}
	}
	function registro($nombre,$usuario,$correo,$contrasena,$sexo,$img){
		$con = new DBManager;		
		if($con->conectar()==true){
			$sql = "INSERT INTO  buscame_bd.usuarios (
				usuario ,
				nombre ,
				correo ,
				contrasena ,
				sexo ,
				img
				)
				VALUES (
				'$usuario',  '$nombre',  '$correo',  '$contrasena',  '$sexo',  '$img');";				
			$datos = mysqli_query($con->conect,$sql);
		}
	}
	function existeUsuario($usuario){
		$con = new DBManager;		
		if($con->conectar()==true){
			$sql = "select * from buscame_bd.usuarios where usuario='$usuario'";				
			$datos = mysqli_query($con->conect,$sql);
			if(!$datos){
				return false;
			}else{
				return $datos;
			}
		}
	}
	function ingreso($usuario,$contrasena){
		$con = new DBManager;		
		if($con->conectar()==true){
			$sql = "select * from buscame_bd.usuarios where usuario='$usuario' and contrasena='$contrasena'";				
			$datos = mysqli_query($con->conect,$sql);
			if(!$datos){
				return false;
			}else{
				return $datos;
			}
		}
	}
	function recuperarContrasena($correo){
		$con = new DBManager;		
		if($con->conectar()==true){
			$sql = "select * from buscame_bd.usuarios where correo='$correo'";				
			$datos = mysqli_query($con->conect,$sql);
			if(!$datos){
				return false;
			}else{
				return $datos;
			}
		}
	}
	
	//Devuelve los datos de la categoria
	function nextCat($ids_categoria){
		$con = new DBManager;		
		if($con->conectar()==true){
			$ids = explode(',',$ids_categoria);
			$sql = "select * from tipo where id_categoria in ('".implode("','",$ids)."') order by tipo";
			$datos = mysqli_query($con->conect,$sql);
			if(!$datos){
				return false;
			}else{
				return $datos;
			}
		}
	}
	
	function mostrarGustos($idsTipo){
		$con = new DBManager;		
		if($con->conectar()==true){
			$ids = explode(',',$idsTipo);
			$sql = "select * from tipo where id_tipo in ('".implode("','",$ids)."') order by tipo";
			$datos = mysqli_query($con->conect,$sql);
			if(!$datos){
				return false;
			}else{
				return $datos;
			}
		}
	}
	
	
	function nextTipo($ids_tipo,$usuario){
		$con = new DBManager;		
		if($con->conectar()==true){			
			$sql = "UPDATE  buscame_bd.usuarios SET  ids_tipo='$ids_tipo' WHERE CONVERT(usuarios.usuario USING utf8 )='$usuario'";
			$datos = mysqli_query($con->conect,$sql);
		}
	}
	
	function changeColor($id_color,$usuario){
		$con = new DBManager;		
		if($con->conectar()==true){			
			$sql = "UPDATE  buscame_bd.usuarios SET  id_color='$id_color' WHERE CONVERT(usuarios.usuario USING utf8 )='$usuario'";
			$datos = mysqli_query($con->conect,$sql);
		}
	}
	function getSolaCategoria($id_categoria){
		$con = new DBManager;		
		if($con->conectar()==true){
			$sql = "select * from buscame.categoria where id_categoria='$id_categoria'";				
			$datos = mysqli_query($con->conect,$sql);
			$row = mysqli_fetch_array($datos);
			if(!$row){
				return false;
			}else{
				return $row['categoria'];
			}
		}
	}
	function verificarPass($usuario,$contrasena){
		$con = new DBManager;		
		if($con->conectar()==true){
			$sql = "select * from buscame_bd.usuarios where usuario='$usuario' and contrasena='$contrasena'";				
			$datos = mysqli_query($con->conect,$sql);
			$row = mysqli_fetch_array($datos);
			if(!$row){
				return false;
			}else{
				return $row['usuario'];
			}
		}
	}
	function changePass($usuario,$contrasena){
		$con = new DBManager;		
		if($con->conectar()==true){
			$sql = "UPDATE  buscame_bd.usuarios SET  contrasena='$contrasena' WHERE CONVERT(usuarios.usuario USING utf8 )='$usuario' ";				
			$datos = mysqli_query($con->conect,$sql);
		}
	}
	
	function changeUsuario($usuario,$usuarioN){
		$con = new DBManager;		
		if($con->conectar()==true){
			$sql = "UPDATE buscame_bd.usuarios SET  usuario='$usuarioN' WHERE CONVERT(usuarios.usuario USING utf8 )='$usuario' LIMIT 1 ";				
			$datos = mysqli_query($con->conect,$sql);
		}
	}
	function existeCorreo($correo){
		$con = new DBManager;		
		if($con->conectar()==true){
			$sql = "select * from buscame_bd.usuarios where correo='$correo'";				
			$datos = mysqli_query($con->conect,$sql);
			if(!$datos){
				return false;
			}else{
				return $datos;
			}
		}
	}
	function changeCorreo($correo,$usuario){
		$con = new DBManager;		
		if($con->conectar()==true){
			$sql = "UPDATE buscame_bd.usuarios SET correo='$correo' WHERE CONVERT(usuarios.usuario USING utf8 )='$usuario' LIMIT 1 ;";				
			$datos = mysqli_query($con->conect,$sql);
		}
	}
	
	function listarSus($usuario){
		$con = new DBManager;		
		if($con->conectar()==true){
			$sql = "SELECT DISTINCT id_almacen FROM buscame.like WHERE not (id_almacen=0) and usuario='$usuario' ";				
			$datos = mysqli_query($con->conect,$sql);
			if(!$datos){
				return false;
			}else{
				return $datos;
			}
		}
	}
	function getAlmacenSolo($id){
		$con = new DBManager;		
		if($con->conectar()==true){
			$sql = "select * from almacenes where id_almacen='$id' ";
			$datos = mysqli_query($con->conect,$sql);
			if(!$datos){
				return false;
			}else{
				return $datos;
			}
		}
	}
	function removeLike($usuario,$id_producto,$id_almacen){
		$con = new DBManager;
		if($con->conectar()==true){
			
			if($id_producto==""){
				$sqlI = "DELETE FROM buscame.like WHERE CONVERT(like.usuario USING utf8 )='$usuario' and like.id_almacen='$id_almacen'";
				$sql = "update almacenes set likes=likes-1 where id_almacen='$id_almacen'";
				$datos = mysqli_query($con->conect,$sql);
			}
			if($id_almacen==""){
				$sqlI = "DELETE FROM buscame.like WHERE CONVERT(like.usuario USING utf8 )='$usuario' and like.id_producto ='$id_producto'";
				$sql = "update producto set likes=likes-1 where id_producto='$id_producto'";
				$datos = mysqli_query($con->conect,$sql);
			}
			$datos = mysqli_query($con->conect,$sqlI);
			if(!$datos){
				return false;
			}else{
				return $datos;
			}
		}
	}
	
 }
 
 
?>