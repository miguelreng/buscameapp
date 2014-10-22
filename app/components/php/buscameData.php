<?
	include_once('funcionesBuscame.php');
	$data = isset($_REQUEST['data']) ? $_REQUEST['data']:"";
	$nombre = isset($_REQUEST['nombre']) ? $_REQUEST['nombre']:"";
	$usuario = isset($_REQUEST['usuario']) ? $_REQUEST['usuario']:"";
	$color = isset($_REQUEST['color']) ? $_REQUEST['color']:"";
	$correo = isset($_REQUEST['correo']) ? $_REQUEST['correo']:"";	
	$contrasena = isset($_REQUEST['contrasena']) ? $_REQUEST['contrasena']:"";
	$sexo = isset($_REQUEST['sexo']) ? $_REQUEST['sexo']:"";
	$img = isset($_REQUEST['img']) ? $_REQUEST['img']:"";
	$idsCat = isset($_REQUEST['idsCat']) ? $_REQUEST['idsCat']:"";
	$idsTipo = isset($_REQUEST['idsTipo']) ? $_REQUEST['idsTipo']:"";
	$id_color = isset($_REQUEST['id_color']) ? $_REQUEST['id_color']:"";
	$usuarioN = isset($_REQUEST['usuarioN']) ? $_REQUEST['usuarioN']:"";
	$correoN = isset($_REQUEST['correoN']) ? $_REQUEST['correoN']:"";
	
	//Objeto de acceso búscame
	$getDatos = new accesoBuscame; 
	
	if($data=="registro"){
		$getDatos->registro($nombre,$usuario,$correo,$contrasena,$sexo,$img);
		
		$cabeceras = "From: ".utf8_decode("Búscame")."<info@buscameapp.com>\r\n".'Reply-To: info@buscameapp.com' . "\r\n" .'X-Mailer: PHP/' . phpversion();
		$cabeceras .= "MIME-Version: 1.0\r\n";
		$cabeceras .= "Content-Type: text/html; charset=UTF-8";
	
		$mensajeC = '
				<html>
					<head>
					<link href="http://fonts.googleapis.com/css?family=Droid+Sans" rel="stylesheet" type="text/css">
					<title>Bienvenido a Buscame!</title>
						<style>
							body{
								font-family: "Droid Sans", sans-serif;
							}
							#content{
								margin:auto;
								width:600px;
								margin-top:30px;
								padding: 5px;
								padding-bottom:15px;
								border: 1px solid #29ABE3;
								border-radius: 30px;
							}
							#logo{
								width:90px;
								height:auto;
								margin:auto auto;
							}
							#content p{
								text-align:center;								
								font-size: 25px;
								margin-top: -60px;
							}
							table tr td img{
								width: 590px;
								height: auto;	
							}
							#info{
								margin-top:50px;
							}
							#info p{
								font-size: 18px;
								margin-top: 10px;
								text-align:justify;
							}
						</style>
					</head>	
					<body>
						<div id="content">					
							<p>&iexcl;Bienvenido a B&uacute;scame '.$nombre.'!</p>
							<div id="info">
								<p> Hola! '.$nombre.', Nos complace saber que eres parte de B&uacute;scame</p>
								<p> Proximamente estaremos en el resto del pais.</p>
								<p>Recuerda tus datos de B&uacute;scame:</p>
								<p>Usuario: '.$usuario.'</p>
								<p>Contrase&ntilde;a: '.$contrasena.'</p>
								<p>Conoce m&aacute;s sobre B&uacute;scame en <a href="http://buscameapp.com">buscameapp.com</a></p>
							</div>
						</div>
					</body>
				</html>
				';
		
		//mail('luis_aleo@hotmail.com', 'Correo contacto buscameapp.com - '.$nombre, $mensajeC,$cabeceras);
		mail($correo, 'Bienvenido a Búscame', $mensajeC,$cabeceras);
		
		echo "Registrado";
	}else if($data=="existeUsuario"){
		$existe = $getDatos->existeUsuario($usuario);					
		if($existe){
			$row = mysqli_fetch_array($existe);	
			if($row){
				echo $row['usuario'];
			}else {
				echo "No existe";
			}			
		}else{
			echo "Error";	
		}
		
	}else if($data=="ingreso"){
		$existe = $getDatos->ingreso($usuario,$contrasena);			
		if($existe){
			$row = mysqli_fetch_array($existe);	
			?>
            <script>
				if(typeof(Storage)!=="undefined"){
					localStorage.usuario="<? echo $row['usuario'];?>";
					localStorage.nombre="<? echo utf8_encode($row['nombre']);?>";
					localStorage.correo="<? echo $row['correo'];?>";
					localStorage.sexo="<? echo $row['sexo'];?>";
					localStorage.img="<? echo $row['img'];?>";
					/*localStorage.idsTipo="<? echo $row['ids_tipo'];?>";
					localStorage.id_color="<? echo $row['id_color'];?>";
					localStorage.color="<? echo utf8_encode($getDatos->getSoloColor($row['id_color']));?>";*/
				}
			</script>
            <?
		}
		
	}else if($data=="recuerdaContrasena"){
		$existe = $getDatos->recuperarContrasena($correo);	
		$row = mysqli_fetch_array($existe);	
		
		$cabeceras = "From: ".utf8_decode("Búscame")."<info@buscameapp.com>\r\n".'Reply-To: info@buscameapp.com' . "\r\n" .'X-Mailer: PHP/' . phpversion();
		$cabeceras .= "MIME-Version: 1.0\r\n";
		$cabeceras .= "Content-Type: text/html; charset=UTF-8";
		
		if($row){
			$mensajeC = '
					<html>
						<head>
						<link href="http://fonts.googleapis.com/css?family=Droid+Sans" rel="stylesheet" type="text/css">
						<title>&iexcl;Recupera tu contraseña de Buscame!</title>
							<style>
								body{
									font-family: "Droid Sans", sans-serif;
								}
								#content{
									margin:auto;
									width:600px;
									margin-top:30px;
									padding: 5px;
									padding-bottom:15px;
									border: 1px solid #29ABE3;
									border-radius: 30px;
								}
								#logo{
									width:90px;
									height:auto;
									margin:auto auto;
								}
								#content p{
									text-align:center;								
									font-size: 25px;
									margin-top: -60px;
								}
								table tr td img{
									width: 590px;
									height: auto;	
								}
								#info{
									margin-top:50px;
								}
								#info p{
									font-size: 18px;
									margin-top: 10px;
									text-align:justify;
								}
							</style>
						</head>	
						<body>
							<div id="content">
								<p>&iexcl;Recupera tu contraseña de B&uacute;scame '.$row['nombre'].'!</p>
								<div id="info">
									<p>Has pedido recuperar tu contraseña de B&uacute;scame app, recuerda tus datos de B&uacute;scame:</p>
									<p>Usuario: '.$row['usuario'].'</p>
									<p>Contrase&ntilde;a: '.$row['contrasena'].'</p>
									<p>Conoce m&aacute;s sobre B&uacute;scame en <a href="http://buscameapp.com">buscameapp.com</a></p>
								</div>
							</div>
						</body>
					</html>
					';
			
			//mail('luis_aleo@hotmail.com', 'Correo contacto buscameapp.com - '.$nombre, $mensajeC,$cabeceras);
			mail($correo, utf8_decode('Recuperar contraseña Búscame'), $mensajeC,$cabeceras);
		
			echo "correcto";
		}else{
			echo "Incorrecto";
		}
	}else if($data=="checkCat"){
		$categoria = $getDatos->getCategoria();
		$script = "var ids = '';";
		$ids = "";
		?>
        	<div class="content_gustos_intro">  
        <?
		while($row = mysqli_fetch_array($categoria)){
			$ids .= $row['id_categoria'].",";
			$script .= "if(document.getElementById('catId".$row['id_categoria']."').checked){
							ids+='".$row['id_categoria'].",';
						}";
			?>    
                <p class="p_gustos">
                    <input type="checkbox" id="catId<? echo $row['id_categoria'];?>" name="catId<? echo $row['id_categoria'];?>" value="<? echo $row['id_categoria'];?>">
                    <label class="label_gustos" for="catId<? echo $row['id_categoria'];?>"><span></span><? echo utf8_encode($row['categoria']);?></label>
                </p>
    
            <?					
		}		
		?>		
            </div>
            <a class="button colorAzul" id="btn_next_Regis1">Siguiente</a>
            <script>
				Lungo.dom('#btn_next_Regis1').tap(function() { 
					<?
						echo $script;
					?>
					if(ids==''){
						setTimeout(function(){
							Lungo.Notification.show(
									"Selecciona al menos una categoría.",
									"info",  
									4
							);						
						},150);	
					}else{
						Lungo.Notification.show();		
						$$.ajax({
							crossDomain: true,
							type:'POST',
							url: 'http://localhost/buscame/app/components/php/buscameData.php?data=nextCat&idsCat='+ids,
							dataType: 'html',
							async: true,
							success: function(data) {
								if(data){
									$('#tipoRegistro').html(data).trigger('refresh');									
									Lungo.Router.section('tiposSelect');
									Lungo.Notification.hide();
								}else{
									Lungo.Notification.hide();
									setTimeout(function(){
										Lungo.Notification.show(
												"Por favor, compruebe su conexión a internet e intente de nuevo.",
												"broadcast",  
												4
										);						
									},150);
								}				
							},
						});
					}
				});
			</script>
		<?
	}else if($data=="nextCat"){
		$tip = $getDatos->nextCat($idsCat);	
		$script = "var ids = '';";
		$ids = "";
		?>
	        <div class="content_gustos_intro">
        <?
		while($row = mysqli_fetch_array($tip)){
			$ids .= $row['id_tipo'].",";
			$script .= "if(document.getElementById('tipoId".$row['id_tipo']."').checked){
							ids+='".$row['id_tipo'].",';
						}";
			?>    
                <p class="p_gustos">
                    <input type="checkbox" id="tipoId<? echo $row['id_tipo'];?>" name="tipoId<? echo $row['id_tipo'];?>">
                    <label class="label_gustos" for="tipoId<? echo $row['id_tipo'];?>"><span></span><? echo utf8_encode($row['tipo']);?></label>
                </p>
    
            <?					
		}
		?>		
            </div>
            <a class="button colorAzul" id="btn_next_Regis2">Siguiente</a>
            <script>
				Lungo.dom('#btn_next_Regis2').tap(function() { 
					<?
						echo $script;
					?>
					if(ids==''){
						setTimeout(function(){
							Lungo.Notification.show(
									"Selecciona al menos una categoría.",
									"info",  
									4
							);						
						},150);	
					}else{
						Lungo.Notification.show();		
						$$.ajax({
							crossDomain: true,
							type:'POST',
							url: 'http://localhost/buscame/app/components/php/buscameData.php?data=nextTipo&idsTipo='+ids+'&usuario='+localStorage.usuario,
							dataType: 'html',
							async: true,
							success: function(data) {
								if(data){
									$('#colorRegistro').html(data).trigger('refresh');									
									Lungo.Router.section('sectionColorRe');
									Lungo.Notification.hide();
								}else{
									Lungo.Notification.hide();
									setTimeout(function(){
										Lungo.Notification.show(
												"Por favor, compruebe su conexión a internet e intente de nuevo.",
												"broadcast",  
												4
										);						
									},150);
								}				
							},
						});
					}
				});
			</script>
		<?		
	}else if($data=="nextTipo"){
		$getDatos->nextTipo($idsTipo,$usuario);	
		$datos = $getDatos->getColor('all');
		?>
        <form>
            <label class="select">
                <select id="colorSelectRegistro" class="custom">
        <?
		while($row = mysqli_fetch_array($datos)){
			?>
            		<option value="<? echo $row['id_color'];?>"><? echo utf8_encode($row['color']);?></option>
            <?
		}
		?>
                </select>    
            </label>  
       	</form>                  
        <a id="btnEmpiezaRe" class="button colorAzul">¡Empieza!</a>
        <?
	}else if($data=="changeColor"){
		$getDatos->changeColor($id_color,$usuario);
		
		echo "Correcto, color cambiado";
			
	}else if($data=="mostrarGustos"){
		$datos = $getDatos->mostrarGustos($idsTipo);
		if($datos){
			?>
            	<ul>
            <?			
			while($row = mysqli_fetch_array($datos)){
				?>
                	<li data-icon="arrow-right" onClick="mostrarGustos('<? echo $row['id_tipo'];?>');">
                    	<p><? echo utf8_encode($getDatos->getSolaCategoria($row['id_categoria']));?></p>
                        <p><? echo utf8_encode($row['tipo']);?></p>
                        <p><? echo $color?></p>
                    </li>
                <?
			}			
			?>
            	</ul>
            <?
		}
		
	}else if($data=="verificarPass"){
		$ver = $getDatos->verificarPass($usuario,$contrasena);
		
		if($ver){
			echo "correcto";
		}else{
			echo "incorrecta";
		}
	}else if($data=="changePass"){
		$getDatos->changePass($usuario,$contrasena);
		echo "Listo";
	}else if($data=="changeConfig"){
		$mensaje = "nada";
		if($correo!=$correoN){
			$row = mysqli_fetch_array($getDatos->existeCorreo($correoN));
			if(!$row){
				$getDatos->changeCorreo($correoN,$usuario);
				$mensaje = "correcto";
			}else{
				$mensaje = "existeCorreo";
			}
		}
		if($usuario != $usuarioN){
			$row = mysqli_fetch_array($getDatos->existeUsuario($usuarioN));
			if(!$row){
				$getDatos->changeUsuario($usuario,$usuarioN);
				if($mensaje=="nada"){
					$mensaje = "correcto";
				}else{
					$mensaje.= "correcto";
				}
			}else{
				if($mensaje=="nada"){
					$mensaje = "existeUsuario";
				}else{
					$mensaje.= "existeUsuario";
				}
			}
		}
		echo $mensaje;
	}else if($data=="listarSus"){
		$ids = $getDatos->listarSus($usuario);
		if($ids){
			$cont = 0;
			while($row=mysqli_fetch_array($ids)){
				$rowAl = mysqli_fetch_array($getDatos->getAlmacenSolo($row['id_almacen']));
				if($rowAl){
					?>
                    <li class="thumb open_list arrow events_touch_list" onclick="touchAlmacen(<?php echo $rowAl['id_almacen'];?>);">
            			<img src="<?php echo $rowAl['img'];?>"/>
                        <strong class="open_list" ><?php echo utf8_encode($rowAl['almacen']);?></strong>
                    </li>
                    <?
					$cont+=1;
				}
			}
			if($cont==0){
				echo '<img src="imagenes/noResultSus.png" class="noResult">';
			}
		}
	}
?>