<!DOCTYPE html>
<html lang="en">
    <head>
		<meta charset="UTF-8" />
        <meta name="description" content="Búscame es una aplicación movil para encontrar ropa y accesorios de acuerdo a tus gustos.">
		<meta name="keywords" content="App,Aplicacion,Ropa,Búscame,Accesorios,">
		<meta name="author" content="Script Media">
        <title>Búscame</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<link href='http://fonts.googleapis.com/css?family=Bree+Serif|Open+Sans+Condensed:700,300,300italic' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" type="text/css" href="css/demo.css" />
        <link rel="stylesheet" type="text/css" href="css/style.css" />
		<script src="js/modernizr.custom.72111.js"></script>
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
		<script type="text/javascript" 	src="js/jquery.smint.js"></script>

		<script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		  ga('create', 'UA-42112703-1', 'buscameapp.com');
		  ga('send', 'pageview');

		</script>
		<script type="text/javascript">
			$(document).ready( function() {
			    $('#content_nav').smint({
			    	'scrollSpeed' : 1000
			    });
			});
		</script>
    </head>

    <body>

    	<!-- Contenido global -->

        <div class="container">	
			<!-- Cabecera -->		            
			<header>

				<!-- Logo Búscame -->
				<img id="img_header" src="http://localhost/buscame/img/letrasBuscame.png" alt="Smiley face">
				<!--Social-->
				<a href="http://twitter.com/buscameapp"><img id="img_twitter_social" class="img_header_social" src="http://localhost/buscame/img/twitter.png" alt="Smiley face"></a>
				<a href="http://www.fb.com/buscaloapp"><img id="img_fb_social" class="img_header_social" src="http://localhost/buscame/img/facebook.png" alt="Smiley face"></a>
				<!-- Btn acceso -->
				<a href="http://localhost/buscame/accesopanel/acceso" target="_blank" id="btn_clients">Acceso a clientes</a>

				<!-- Menu navegación -->							
			</header>

			<div id="content_nav" class="wrap">
				<div class="inner">
					<a href="#" id="sTop" class="text_nav">¿Cómo funciona?</a>
					<a href="#" id="s2" class="text_nav">Características</a>
					<a href="#" id="s3" class="text_nav">Descargar</a>
					<a href="#" id="s4" class="text_nav">Marcas Búscame</a>
					<a href="#" id="s5" class="text_nav">Medios</a>
					<a href="#" id="s6" class="text_nav">¿Cómo aparecer en Búscame?</a>					
				</div>
			</div>

			<!-- Contenido -->

			<div id="content_info">

				<!-- Como funciona -->

				<div id="div_funciona" class="section sTop">				
					<div class="inner">
						<div class="content_text">
							<h1 class="titulo_info">¿Como funciona?</h1>

							<p>Búscame te ayuda a encontrar de manera eficiente y sencilla ropa de acuerdo a tus gustos!.</p>
						</div>
						<div class="div_img"><img class="img_phone" src="http://localhost/buscame/img/intro_0.png" alt="Smiley face"></div>
					</div>				
				</div>		

				<!-- Caracteristicas -->
				<div id="div_caracteristicas" class="section s2">			
					<div class="inner">
						<div class="content_text">
							<h1 class="titulo_info">Características</h1>

							<p>- Busca tu ropa de acuerdo a tus gustos</p>

							<p>- Escoge entre los productos que tengan promoción o de menor precio.</p>

							<p>- Mira detalladamente todas las características del articulo (Estilo, precio, Talla, etc..)</p>

							<p>- ¿No sabes como llegar al almacén donde quieres comprar? Búscame te guia desde tu ubicación hasta el centro comercial</p>

							<p>- Crea tu perfil y lleva a todas partes tu lista de deseos</p>
						</div>

						<div class="div_img"><img class="img_phone" id="img_caracteristicas" src="http://localhost/buscame/img/intro_2.png" alt="Smiley face"></div>

					</div>				
				</div>	

				<!-- Descargar app -->	
				<div id="div_descargar" class="section s3">			
					<div class="inner">
						<div class="content_text_2">
							<h1 class="titulo_info">Descargar app :)</h1>
								<p>Proximamente...</p>
							<!--<a href=""><img class="img_descargar" src="http://localhost/buscame/img/play-store.png"></a>				

							<a href=""><img class="img_descargar" src="http://localhost/buscame/img/app-store.png"></a>-->
						</div>

						<div class="div_img"><img class="img_phone" id="img_nosotros" src="http://localhost/buscame/img/intro_4.png" alt="Smiley face"></div>
					</div>				
				</div>

				<div id="div_almacenes" class="section s4">
					<div class="inner">						
						<div id="content_almacenes">
							<h1 class="titulo_info" id="titulo_almacenes">Marcas Búscame</h1>
							<div class="content_text">							
								<p>Estas son marcas de ropa y accesorios que se encuentran en Búscame.</p>
							</div>
							<div id="div_img_clientes">
								<img class="img_clientes" src="http://localhost/buscame/img/motoneta.png" alt="Smiley face">
								<img class="img_clientes" id="img_quest" src="http://localhost/buscame/img/quest_1.png" alt="Smiley face">	
								<img class="img_clientes" src="http://localhost/buscame/img/stage.png" alt="Smiley face">
								<img class="img_clientes" src="http://localhost/buscame/img/pelikano_logo.png" alt="Smiley face">	
								<img class="img_clientes" src="http://localhost/buscame/img/cubica.png" alt="Smiley face">

								<!--<table>
									<tr>
										<td width=100>
											<img src="http://localhost/buscame/img/motoneta.png">
										</td>

										<td width=100>
											<img src="http://localhost/buscame/img/quest_1.png">
										</td>

										<td width=100>
											<img src="http://localhost/buscame/img/stage.png">
										</td>
									</tr>

									<tr>
										<td width=100>
											<img src="http://localhost/buscame/img/pelikano_logo.png">
										</td>

										<td width=100>
											<img src="http://localhost/buscame/img/cubica.png">
										</td>

										<td width=100>
										</td>
									</tr>

								</table>

								<style type="text/css">
									img {
										width: 100%;
									}
								</style>-->
							</div>				
						</div>
					</div>
				</div>

				<div id="div_medios" class="section s5">			
					<div class="inner">
						<div class="content_text">
							<h1 class="titulo_info">Lo que dicen los medios</h1>
						</div>
						<div id="div_img_clientes">
							<a href="http://www.bluradio.com/34776/buscame-la-aplicacion-para-conseguir-prendas-de-vestir"><img class="img_clientes" src="http://localhost/buscame/img/blu.png" alt=""></a>
						</div>	
					</div>			
				</div>

				<div id="div_aparecer" class="section s6">			
					<div class="inner">
						<div class="content_text">
							<h1 class="titulo_info">Aparecer en Búscame</h1>

							<p>¿Interesado en que tu almacen aparezca en Búscame? Llena el siguiente formulario.</p>
						</div>
						
						<div class="div_img"><img class="img_phone" id="img_aparecer" src="http://localhost/buscame/img/intro_7.png" alt="Smiley face"></div>

						<form id="content_form" onSubmit="return emailContacto();">
							<p>Nombre almacen</p>
							<input class="input_form" type="text" name="nombre" placeholder= "Almacen" required id="nameAlmacen" >
							<p>Ciudad</p>
							<input class="input_form" type="text" name="ciudad" placeholder="Ciudad" required id="ciudadAlmacen">
							<p>Correo</p>
							<input class="input_form" type="email" name="correo" placeholder= "Correo" required id="correo"> 
							<p>Tel&eacute;fono</p>
							<input class="input_form" type="text" placeholder="Telefono" required id="telefono">
                            <p>Mensaje</p>
							<textarea required class="input_form" style="margin-top:-10px;" placeholder="Mensaje" id="mensaje"></textarea>
							<br>
							<br>
							<input value="Enviar" id="btn_send" type="submit"/>
						</form>						
					</div>				
				</div>	
			</div>

			<!-- Pie de pagina -->
			<footer>
				<div id="div_footer">
					<p>Copyright © 2014 <a href="http://scriptmedia.co">Script Media SAS</a> - Todos los derechos reservados.</p>
				</div>				
			</footer>
        </div>
        <script>
			function emailContacto(){
				var nombre = document.getElementById('nameAlmacen').value;
				var ciudad = document.getElementById('ciudadAlmacen').value;
				var correo = document.getElementById('correo').value;
				var telefono = document.getElementById('telefono').value;
				var mensaje = document.getElementById('mensaje').value;
				$.ajax({
					crossDomain: true,
					type:'POST',
					url: "http://localhost/buscame/php/index.php?data=correo&nombre="+nombre+"&ciudad="+ciudad+"&correo="+correo+"&telefono="+telefono+"&mensaje="+mensaje,
					dataType: 'html',
					success: function(data) {
							alert('Mensaje enviado correctamente\nResponderemos lo antes posible\nGracias por solicitar nuestro servicio')
					},
				});
				return false;
			}		
		</script>
    </body>
</html>