<?php
session_start();
if($_SESSION["userAlmacen"]){
	if(isset($_POST['btnEditar'])){
		include_once('../../php/funcionesAcceso.php');
		$id_producto = $_SESSION['id_producto'];
		$tipo = isset($_POST['tipoEdit']) ? $_POST['tipoEdit']:"";
		$nombre = isset($_POST['nameEdit']) ? $_POST['nameEdit']:"";
		$nombre = htmlentities((utf8_decode($nombre)));
		$descripcion = isset($_POST['descripcionEdit']) ? $_POST['descripcionEdit']:"";
		$descripcion = htmlentities((utf8_decode($descripcion)));
		$precio = isset($_POST['precioEdit']) ? $_POST['precioEdit']:"";
		$precioAnterior = isset($_POST['precioAntEdit']) ? $_POST['precioAntEdit']:0;
		$tipoTalla = isset($_POST['tipoTallaEdit']) ? $_POST['tipoTallaEdit']:"";
		$id_rango = isset($_POST['rangoEdit']) ? $_POST['rangoEdit']:"";
		$id_color = isset($_POST['colorEdit']) ? $_POST['colorEdit']:"";
		$id_marca = isset($_POST['marcaEdit']) ? $_POST['marcaEdit']:"";
		$id_categoria = isset($_POST['categoriaEdit']) ? $_POST['categoriaEdit']:"";
		$id_material = isset($_POST['materialEdit']) ? $_POST['materialEdit']:"";
		$id_talla = isset($_POST['tallaEdit']) ? $_POST['tallaEdit']:"";
		$promocion = isset($_POST['promEdit']) ? $_POST['promEdit']:"";
		
		$editar=new accesoBuscame;
		$consulta = $editar->editarProducto($id_producto,$tipo,$nombre,$descripcion,$precio,$precioAnterior,$id_rango,$id_color,$id_marca,$id_categoria,$id_material,$tipoTalla,$id_talla,$promocion);
		header('Location: http://localhost/buscame/accesopanel/acceso/content/#editar_tab');
		
	}
}else{
	header('Location: http://localhost/buscame/accesopanel/acceso');
}