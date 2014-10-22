<?php
session_start();
if(@$_POST['usuario']){
	include_once("php/funcionesAcceso.php");
	$getDataAcceso=new accesoBuscame;
	$consulta = $getDataAcceso->consultar($_POST['usuario'],$_POST['pass']);
	if($consulta){
		$row = mysqli_fetch_array($consulta);
			if($row['usuario']){
				$_SESSION['userAlmacen'] = $row['usuario'];
				$_SESSION['imgAlmacen'] = $row['img'];
				$_SESSION['nameAlmacen'] = utf8_encode($row['almacen']);
				$_SESSION['passAlmacen'] = $row['contrasena'];
				$_SESSION['idAlmacen'] = $row['id_almacen'];
				$_SESSION['idCC'] = $row['id_centroComercial'];
				$_SESSION['localAlmacen'] = $row['local'];
				$_SESSION['descripcionAlmacen'] = utf8_encode($row['descripcion']);
				$_SESSION['telefonoAlmacen'] = $row['telefono'];
				$_SESSION['direccionAlmacen'] = $row['direccion'];
						
			}
	}
}
if(@!$_SESSION["userAlmacen"]){
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <LINK REL="Shortcut Icon" HREF="http://localhost/buscame/favicon.ico"> 
		<title>Acceso a B&uacute;scame</title>
        <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="css/acceso.css">
    	<script src="js/jquery.min.js"></script>
    	<script src="js/bootstrap.min.js"></script>
	</head>

	<body>
    	<div class="row">
           	<div class="span4 well">
              <form id="loginValidate" onSubmit="return acceso();" method="POST" action="">
                <fieldset>
                  <legend>
                    Ingresar al panel de control
                  </legend>
                  <div align="center">
                    <div class="input-prepend">
                      <span class="add-on"><i class="icon-user"></i></span>
                      <input placeholder="Usuario" type="text" id="usuario" required="required" name="usuario" title="Usuario">
                    </div>
                  </div>
                  <div align="center">
                    <div class="input-prepend">
                      <span class="add-on"><i class="icon-lock"></i></span>
                      <input placeholder="Password" type="password" name="pass" required="required" title="Password" id="pass">
                    </div>
                  </div>
                  <button id="btnIngresar" class="btn pull-right" style="margin-top: 15px">Ingresar</button>
                </fieldset>
              </form>
            </div>
		</div>
        <div id="error">
            <div class="alert alert-error">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>&iexcl;Oh!</strong> Revisa tus datos e intenta de nuevo por favor.
            </div>
       	</div>
        <footer>
        	<a href="http://scriptmedia.co"><p id="text_footer">Desarrollado por Script Media</p></a>
        </footer>

        <div>
        	<img id="img_colombia" src="http://localhost/buscame/accesopanel/acceso/img/logo_colombia.png">
        </div>        
	</body>
    <script>
		function acceso(){		
			var usuario = document.getElementById('usuario').value;
			var contrasena = document.getElementById('pass').value;
			var valid = false;
			$('#error').show(500);
			$('#error').html('<div class="progress progress-striped active"><div class="bar" style="width: 100%;"></div></div>');
			
			$.ajax({
				crossDomain: true,
				type:'POST',
				url: "php/getDataAcceso.php?data=login&usuario="+usuario+"&contrasena="+contrasena,
				dataType: 'html',
				async: true,
				success: function(data) {
					var response = $.trim(data);
                    alert(response);
					if(response=="existe usuario"){
                        alert("si hay usuario" + usuario + " " + contrasena);
                        console.log("Existe usuario");                        
                        document.getElementById("loginValidate").submit();
                        //location.href="http://localhost/buscame/accesopanel/acceso/content/index.php";                        
					}else{
						$('#error').html('<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">×</button>              <strong>&iexcl;Oh!</strong> Revisa tus datos e intenta de nuevo por favor.</div>');
					}
					
				},
			});            
			return valid;            
		}
	</script>
</html>
<?php 
}else if($_SESSION["userAlmacen"]&&$_SESSION['imgAlmacen']&&$_SESSION['nameAlmacen']){	
	?> 
    <!DOCTYPE html>
    <html>
        <head>
            <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
            <link rel="stylesheet" type="text/css" href="css/cpanel.css">          
        	<LINK REL="Shortcut Icon" HREF="http://localhost/buscame/favicon.ico"> 
            <title><? echo utf8_encode($_SESSION['nameAlmacen']);?></title>
            <script type="text/javascript" src="js/eventos.js"></script>
            <script src="http:////ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
            <script src="bootstrap/js/bootstrap.min.js"></script>
        </head>
        <body>
            <div id="global_content">
                <header class="header_cpanel">
                    <a href="http://localhost/buscame/"><img class="header_logo" src="img/letrasBuscame.png"></a>
                    <div id="content_profile">
                        <p class="text_mark"><? echo utf8_encode($_SESSION['nameAlmacen']);?></p>					
                        <img id="img_mark_down" src="img/down.png">
    
                        <div id="window_profile">
                            <div id="window_profile_mark">
                                <img src="<? echo $_SESSION['imgAlmacen'];?>" id="imgAlmacen">
                            </div>
                            <div id="list_options_profile">
                                <ul>
                                    <li>
                                        <a ><label>...</label></a>
                                    </li>
                                    <li>
                                        <a><label>Soporte</label></a>
                                    </li>
                                    <li>
                                        <a href="php/logout.php"><label>Salir</label></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </header>
                <div id="content_menu">
                    <div id="bienvenido">
                        <label>&iexcl;Bienvenido a B&uacute;scame!</label>
                    </div>
                    <a href="content/#agregar_tab">
                        <div class="content_main" id="content_add">
                            <a href="content/#agregar_tab" rel="tooltip" title="Agregar producto"><img class="img_main" src="img/add.png"></a>
                        </div>
                    </a>
                    <a href="content/#editar_tab">
                        <div class="content_main" id="content_remove">
                            <a href="content/#editar_tab" rel="tooltip" title="Editar producto"><img class="img_main" src="img/edit.png"></a>
                        </div>
                    </a>
                    <a href="content/#eliminar_tab">
                        <div class="content_main" id="content_add">
                            <a href="content/#eliminar_tab" rel="tooltip" title="Eliminar producto"><img class="img_main" src="img/remove.png"></a>
                        </div>
                    </a>
                    <a href="content/#configuracion_tab">
                        <div class="content_main" id="content_add">
                            <a href="content/#configuracion_tab" rel="tooltip" title="Configuraci&oacute;n"><img class="img_main" src="img/settings.png"></a>
                        </div>
                    </a>
                </div>                
            </div>

            <footer id="text_footer" >Desarrollado por <a href="http://scriptmedia.co">Script Media</a></footer>

            <script type="text/javascript">
                $(document).ready(function () {
                    $("a").tooltip({
                        'selector': '',
                        'placement': 'bottom'
                    });               
                });
            </script>
    
        </body>
    </html>
	<?php
}else{
	header('Location: http://localhost/buscame/');
}