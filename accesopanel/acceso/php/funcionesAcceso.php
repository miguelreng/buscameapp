<?php 
 include_once("conex.php");
 //implementamos la clase acceso
 class accesoBuscame{

  	//constructor 
  	/*function accesoBuscame(){
  	}*/

  	// consulta los usuarios de la BD
  	function consultar($usuario, $contrasena){
   		//creamos el objeto $con a partir de la clase DBManager
   		$con = new DBManager;
   		//usamos el metodo conectar para realizar la conexion
   		if($con->conectar()==true){
    		$sql = "SELECT * FROM almacenes WHERE usuario = '$usuario' and contrasena = '$contrasena' ";
			$datos = mysqli_query( $con->conect	,$sql );
    		if (!$datos)
     			return false;
    		else
     			return $datos;
   		}
  	}
	function selectCat(){
   		$con = new DBManager;
   		if($con->conectar()==true){
    		$sql = "SELECT * FROM categoria order by categoria asc";
			$datos = mysqli_query( $con->conect	,$sql );
    		if (!$datos)
     			return false;
    		else
     			return $datos;
   		}
  	}
	function selectCC(){
   		$con = new DBManager;
   		if($con->conectar()==true){
    		$sql = "SELECT * FROM centrocomercial";
			$datos = mysqli_query( $con->conect	,$sql );
    		if (!$datos)
     			return false;
    		else
     			return $datos;
   		}
  	}
	function changeCat($categoria){
   		$con = new DBManager;
   		if($con->conectar()==true){
    		$sql = "SELECT * FROM tipo where id_categoria='$categoria' order by tipo asc";
			$datos = mysqli_query( $con->conect	,$sql );
    		if (!$datos)
     			return false;
    		else
     			return $datos;
   		}
  	}
	function selectRan(){
   		$con = new DBManager;
   		if($con->conectar()==true){
    		$sql = "SELECT * FROM rango";
			$datos = mysqli_query( $con->conect	,$sql );
    		if (!$datos)
     			return false;
    		else
     			return $datos;
   		}
  	}
	function selectColor(){
   		$con = new DBManager;
   		if($con->conectar()==true){
    		$sql = "SELECT * FROM color order by color asc";
			$datos = mysqli_query( $con->conect	,$sql );
    		if (!$datos)
     			return false;
    		else
     			return $datos;
   		}
  	}
	function selectMarca(){
   		$con = new DBManager;
   		if($con->conectar()==true){
    		$sql = "SELECT * FROM marca order by marca asc";
			$datos = mysqli_query( $con->conect	,$sql );
    		if (!$datos)
     			return false;
    		else
     			return $datos;
   		}
  	}
	function selectMaterial(){
   		$con = new DBManager;
   		if($con->conectar()==true){
    		$sql = "SELECT * FROM material order by material asc";
			$datos = mysqli_query( $con->conect	,$sql );
    		if (!$datos)
     			return false;
    		else
     			return $datos;
   		}
  	}
	function selectTipoTalla(){
   		$con = new DBManager;
   		if($con->conectar()==true){
    		$sql = "SELECT DISTINCT tipoTalla FROM talla";
			$datos = mysqli_query( $con->conect	,$sql );
    		if (!$datos)
     			return false;
    		else
     			return $datos;
   		}
  	}
	function changeTipoTalla($tipoTalla){
   		$con = new DBManager;
   		if($con->conectar()==true){
    		$sql = "SELECT * FROM talla where tipoTalla='$tipoTalla'";
			$datos = mysqli_query( $con->conect	,$sql );
    		if (!$datos)
     			return false;
    		else
     			return $datos;
   		}
  	}
	function agregarProducto($tipo,$nombre,$descipcion,$precio,$precioAnterior,$id_rango,$id_color,$id_marca,$id_categoria,$id_material,$tipoTalla,$id_talla,$cantidad,$promocion,$img1,$img2,$img3,$id_almacen,$id_centroComercial){
		$cantidad =30;
   		$con = new DBManager;
   		if($con->conectar()==true){
    		$sql = "INSERT INTO  buscame.producto (id_producto ,
					id_tipo ,
					nombre ,
					descripcion ,
					precio ,
					precioAnterior ,
					id_rango ,
					id_color ,
					id_marca ,
					id_categoria ,
					id_material ,
					tipoTalla ,
					id_talla ,
					cantidad ,
					promocion ,
					img1 ,
					img2 ,
					img3 ,
					likes ,
					id_almacen ,
					id_centrocomercial
					)
					VALUES (NULL ,  '$tipo',  '$nombre',  '$descipcion',  '$precio',  '$precioAnterior',  '$id_rango',  '$id_color',  '$id_marca',  '$id_categoria',  '$id_material',  '$tipoTalla',  '$id_talla',  '$cantidad',  '$promocion',  '$img1',  '$img2',  '$img3',  '0',  '$id_almacen',  '$id_centroComercial')";
			$datos = mysqli_query( $con->conect	,$sql );
    		if (!$datos)
     			return false;
    		else
     			return $datos;
   		}
  	}
	function editarProducto($id_producto,$tipo,$nombre,$descipcion,$precio,$precioAnterior,$id_rango,$id_color,$id_marca,$id_categoria,$id_material,$tipoTalla,$id_talla,$promocion){
   		$con = new DBManager;
   		if($con->conectar()==true){
    		$sql = "UPDATE  buscame.producto SET id_tipo='$tipo', nombre='$nombre', descripcion='$descipcion', precio='$precio', precioAnterior='$precioAnterior', id_rango='$id_rango', id_color='$id_color', id_marca='$id_marca', id_categoria='$id_categoria', id_material='$id_material', tipoTalla='$tipoTalla', id_talla='$id_talla', promocion='$promocion' WHERE  producto.id_producto ='$id_producto' ";
			$datos = mysqli_query( $con->conect	,$sql );
    		if (!$datos)
     			return false;
    		else
     			return $datos;
   		}
  	}
	function getAllProducts($id_almacen){
   		$con = new DBManager;
   		if($con->conectar()==true){
    		$sql = "SELECT * FROM producto WHERE id_almacen='$id_almacen'";
			$datos = mysqli_query( $con->conect	,$sql );
    		if (!$datos)
     			return false;
    		else
     			return $datos;
   		}
  	}
	function getSolaTalla($id_talla){
   		$con = new DBManager;
   		if($con->conectar()==true){
    		$sql = "SELECT * FROM talla WHERE id_talla='$id_talla'";
			$datos = mysqli_query( $con->conect	,$sql );
			$row = mysqli_fetch_array($datos);
    		if (!$row)
     			return false;
    		else
     			return $row['talla'];
   		}
  	}
	function getSoloColor($id_color){
   		$con = new DBManager;
   		if($con->conectar()==true){
    		$sql = "SELECT * FROM color WHERE id_color='$id_color'";
			$datos = mysqli_query( $con->conect	,$sql );
			$row = mysqli_fetch_array($datos);
    		if (!$row)
     			return false;
    		else
     			return $row['color'];
   		}
  	}
	
	function getProducto($id_producto){
   		$con = new DBManager;
   		if($con->conectar()==true){
    		$sql = "SELECT * FROM producto WHERE id_producto='$id_producto'";
			$datos = mysqli_query( $con->conect	,$sql );
    		if (!$datos)
     			return false;
    		else
     			return $datos;
   		}
  	}
	function removeProducto($id_producto){
   		$con = new DBManager;
   		if($con->conectar()==true){
    		$sql = "DELETE FROM producto WHERE producto.id_producto='$id_producto'";
			$datos = mysqli_query( $con->conect	,$sql );
    		if (!$datos)
     			return false;
    		else
     			return $datos;
   		}
  	}
	function getPass($id_almacen){
   		$con = new DBManager;
   		if($con->conectar()==true){
    		$sql = "select contrasena from almacenes where id_almacen='$id_almacen'";
			$datos = mysqli_query( $con->conect	,$sql );
			$row = mysqli_fetch_array($datos);
    		if (!$row)
     			return false;
    		else
     			return $row['contrasena'];
   		}
  	}
	function changePass($id_almacen,$pass){
   		$con = new DBManager;
   		if($con->conectar()==true){
    		$sql = "UPDATE almacenes SET contrasena='$pass' WHERE id_almacen =$id_almacen";
			$datos = mysqli_query($con->conect,$sql);
			if (!$datos)
     			return false;
    		else
     			return $datos;
   		}
  	}
	function changeImgAl($id_almacen,$img){
   		$con = new DBManager;
   		if($con->conectar()==true){
    		$sql = "UPDATE almacenes SET img='$img' WHERE id_almacen =$id_almacen";
			$datos = mysqli_query($con->conect,$sql);
			if (!$datos)
     			return false;
    		else
     			return $datos;
   		}
  	}
	function configAl($id_almacen,$nombre,$descr,$local,$tel,$cc){
   		$con = new DBManager;
   		if($con->conectar()==true){
    		$sql = "UPDATE buscame.almacenes SET  almacen='$nombre', descripcion='$descr', local='$local', telefono='$tel', id_centroComercial='$cc' WHERE  almacenes.id_almacen='$id_almacen'";
			$datos = mysqli_query($con->conect,$sql);
			if (!$datos)
     			return false;
    		else
     			return $datos;
   		}
  	}
	
 }
?>