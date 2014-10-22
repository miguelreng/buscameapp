<?php 
 //esta clase nos permitira conectarnos a la base de datos
 class DBManager{
	var $conect;
  	//Método constructor
  	function DBManager(){
  	}
  	//Método que se encargará de la verificar y realizar
  	//la conexión
  	function conectar() {
   		if(!($con=mysqli_connect("localhost","root",""))){
    		echo"Entro"; 
        //console.log(echo "Entro");
    		exit();
   		}
   		if (!mysqli_select_db($con,"buscame_bd")) {
    		echo "Error al seleccionar la base de datos"; 
    		exit();
   		}
   		$this->conect=$con;
   		return true; 
  	}
 }
?>