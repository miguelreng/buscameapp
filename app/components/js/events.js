//Funciones de Lungo
$(document).ready(function(){	
	
	//Validación si ha inicado sesión
	setTimeout(function(){
		if(localStorage.usuario){
			$('#welcome_message').html('<p>¡Bienvenido '+localStorage.nombre+'!</p>');
			$('#div_img_profile').html('<img id="img_profile" src="imagenes/noImg.png">');
			$('#name_user').html(localStorage.nombre);
			$('#div_user').html('<p>'+localStorage.usuario+'</p>');
			$('#usuarioChange').val(localStorage.usuario);
			$('#correoChange').val(localStorage.correo);
			Lungo.Router.section('section_inicio');
		}					
	},3000);
	
	
	//Función del formulario de registro
	Lungo.dom('#form_regis').tap(function() { 
		var nombre = $('#nombreRegistro').val();
		var usuario = $('#usuarioRegistro').val();
		var correo = $('#correoRegistro').val();
		var contrasena = $('#contrasenaRegistro').val();
		var sexo = $('#sexoRegistro').val();
		var img = $('#imagen_registro').val();
		var existe = true;
		
		if(nombre==""){
			Lungo.Notification.hide();
			setTimeout(function(){
				Lungo.Notification.show(
						"Completa el campo de tu nombre.",
						"remove",  
						2
				);						
			},150);
		}else if(usuario==""){
			Lungo.Notification.hide();
			setTimeout(function(){
				Lungo.Notification.show(
						"Completa el campo de usuario.",
						"remove",  
						2
				);						
			},150);
		}else if(validarEmail(correo)){
			Lungo.Notification.hide();
			setTimeout(function(){
				Lungo.Notification.show(
						"Digita bien tu correo",
						"remove",  
						2
				);						
			},150);
		}else if(contrasena.length<6){
			Lungo.Notification.hide();
			setTimeout(function(){
				Lungo.Notification.show(
						"Digita una contraseña mayor a 6 carácteres.",
						"remove",  
						2
				);						
			},150);
		}else{	
			Lungo.Notification.show();
			$$.ajax({
				crossDomain: true,
				type:'POST',
				url: 'http://localhost/buscame/app/components/php/buscameData.php?data=existeUsuario&usuario='+usuario,
				dataType: 'html',
				async: true,
				success: function(data) {
					if(data){
						data = $.trim(data);
						if(data=="No existe"){
							existe = false;
						}else{
							existe = true;
						}
						if(existe){
							Lungo.Notification.hide();
							setTimeout(function(){
								Lungo.Notification.show(
										"Lo sentimos, el usuario ya existe.",
										"remove",  
										2
								);						
							},150);
						}else{
							Lungo.Notification.show();
							$$.ajax({
								crossDomain: true,
								type:'POST',
								url: 'http://localhost/buscame/app/components/php/buscameData.php?data=registro&nombre='+nombre+'&usuario='+usuario+'&correo='+correo+'&contrasena='+contrasena+'&sexo='+sexo+'&img='+img,
								dataType: 'html',
								async: true,
								success: function(data) {
									if(data){
										Lungo.Notification.hide();
										setTimeout(function(){
											Lungo.Notification.show(
													"Muy bien, ahora empecemos con tus gustos.",
													"check",  
													3
											);						
										},150);
										setTimeout(function(){
											Lungo.Notification.show(
													"Selecciona la categoría que más te gusta.",
													"star",  
													3
											);						
										},4150);
										Lungo.Router.section('carousel');
										setTimeout(function(){
											Lungo.Notification.show();
											$$.ajax({
												crossDomain: true,
												type:'POST',
												url: 'http://localhost/buscame/app/components/php/buscameData.php?data=checkCat',
												dataType: 'html',
												async: true,
												success: function(data) {
													if(data){
														if(typeof(Storage)!=="undefined"){
															if (localStorage.usuario){
																localStorage.usuario=usuario;
															}else{
																localStorage.usuario=usuario;
															}
														}
														$('#catRegistro').html(data);
														Lungo.Notification.hide();
													}else{
														Lungo.Notification.hide();
														setTimeout(function(){
															Lungo.Notification.show(
																	"Por favor, compruebe su conexión a internet e intente de nuevo.",
																	"signal",  
																	4
															);						
														},150);
														$('#catRegistro').html('<div><a onclick="reintentar(\'buscameData\',\'checkCat\',\'catRegistro\');" class="button" style="background-color: rgb(61, 191, 247);">Reintentar</a></div>');
													}				
												},
											});					
										},7300);
									}else{
										Lungo.Notification.hide();
										setTimeout(function(){
											Lungo.Notification.show(
													"Por favor, compruebe su conexión a internet e intente de nuevo.",
													"signal",  
													4
											);						
										},150);
									}				
								},
							});
						}
					}else{
						Lungo.Notification.hide();
						setTimeout(function(){
							Lungo.Notification.show(
									"Por favor, compruebe su conexión a internet e intente de nuevo.",
									"signal",  
									4
							);						
						},150);
					}				
				},
			});
		
		}
	});

	//Funcion para mostrar los Me gustan
	Lungo.dom('#likeArt').tap(function() { 
		Lungo.Notification.show();			
		var limite = 5;	
		if(typeof(Storage)!=="undefined"){
			if (sessionStorage.limiteMe){
				sessionStorage.limiteMe=limite;
			}else{
				sessionStorage.limiteMe=limite;
			}
		}				
		var usuario = localStorage.usuario;
		$$.ajax({
				crossDomain: true,
				type:'POST',
				url: "http://localhost/buscame/app/components/php/getData.php?data=meGustan&usuario="+usuario+"&limite="+limite,
				dataType: 'html',
				async: true,
				success: function(data) {							
					if(data){
						$('#wrappLike').html(data);
						Lungo.Notification.hide();
					}else{
						Lungo.Notification.hide();
						setTimeout(function(){
							Lungo.Notification.show(
									"Por favor, compruebe su conexión a internet e intente de nuevo.",
									"signal",  
									4
							);						
						},150);
					}				
				}						
		});

	});
	
	//Funcion para mostar el select de la búsqueda normal
	Lungo.dom('#content_buscarNormal').tap(function() {
		vaciarSelects();
		Lungo.Notification.show();
		$$.ajax({
				crossDomain: true,
				type:'POST',
				url: "http://localhost/buscame/app/components/php/getData.php?data=categoria",
				dataType: 'html',
				async: true,
				success: function(data) {							
					
						$('#contentCategoria').html(data);
						Lungo.Router.section('form');
						Lungo.Notification.hide();
					
						Lungo.Notification.hide();
						setTimeout(function(){
							Lungo.Notification.show(
									"Por favor, compruebe su conexión a internet e intente de nuevo.",
									"signal",  
									4
							);						
						},150);
									
				}						
		});
	});
	
	//Funcion de "Ingresar"
	Lungo.dom('#btn_buscar_home').tap(function() {
		var usuario = $('#usuarioIngreso').val();
		var contrasena = $('#contrasenaIngreso').val();
		
		if(usuario==""){
				Lungo.Notification.show(
						"Ingresa tu usuario.",
						"remove",  
						5
				);
		}else if(contrasena==""){
				Lungo.Notification.show(
						"Ingresa tu contraseña.",
						"remove",  
						5
				);	
		}else{
			Lungo.Notification.show();
			$$.ajax({
				crossDomain: true,
				type:'POST',
				url: 'http://localhost/buscame/app/components/php/buscameData.php?data=ingreso&usuario='+usuario+'&contrasena='+contrasena,
				dataType: 'html',
				async: true,
				success: function(data) {
					if(data){
						data = $.trim(data);
						if(data){
							$('#scriptsAdicionales').append(data);
							$('#welcome_message').html('<p>¡Bienvenido '+localStorage.nombre+'!</p>');
							$('#div_img_profile').html('<img id="img_profile" src="imagenes/noImg.png">');
							$('#name_user').html(localStorage.nombre);
							$('#div_user').html('<p>'+localStorage.usuario+'</p>');
							$('#usuarioChange').val(localStorage.usuario);
							$('#correoChange').val(localStorage.correo);
							Lungo.Notification.hide();
							Lungo.Router.section('section_inicio');																		
						}else{		
							Lungo.Notification.hide();				
							setTimeout(function(){
								Lungo.Notification.show(
										"El usuario o contraseña no son correctos",
										"remove",  
										3
								);						
							},150);
						}
					}else{
						Lungo.Notification.hide();
						setTimeout(function(){
							Lungo.Notification.show(
									"Por favor, compruebe su conexión a internet e intente de nuevo.",
									"signal",  
									4
							);						
						},150);
					}				
				},
			});
		}
	});
 	
	//Función para buscar gustos
	Lungo.dom('#content_buscarGustos').tap(function() {
		Lungo.Notification.show();
		$$.ajax({
			crossDomain: true,
			type:'POST',
			url: 'http://localhost/buscame/app/components/php/buscameData.php?data=mostrarGustos&idsTipo='+localStorage.idsTipo+'&color='+localStorage.color,
			dataType: 'html',
			async: true,
			success: function(data) {
				if(data){				
					$('#articleGustos').html(data).trigger('refresh');
					Lungo.Router.section('sectionGustos');
					Lungo.Notification.hide();
				}else{
					Lungo.Router.section("section_inicio");
					Lungo.Notification.hide();
					setTimeout(function(){
						Lungo.Notification.show(
								"Por favor, compruebe su conexión a internet e intente de nuevo.",
								"signal",  
								4
						);						
					},150);
				}			
			},
		});
	});
	//Función para reintentar
	Lungo.dom('#btnReintentar2').tap(function() {
		Lungo.Notification.show();
    	var valor = $("#dataCategoria option:selected").val();
		$$.ajax({
 			crossDomain: true,
			type:'POST',
 			url: "http://localhost/buscame/app/components/php/getData.php?data=tipo&id="+valor,
  			data: { data: "tipo", id: valor },
			dataType: 'html',
    		async: true,
			success: function(data) {
				if(data){
					$('#contentTipo').html(data).trigger('refresh');
					Lungo.Notification.hide();
				}else{
					Lungo.Notification.hide();
					setTimeout(function(){
						Lungo.Notification.show(
								"Por favor, compruebe su conexión a internet e intente de nuevo.",
								"signal",  
								4
						);						
					},150);
				}
			},
		});
  	});
	
	/* Función para reintentar*/
	Lungo.dom('#btnReintentar3').tap(function() {
    	var valor =$("#dataTipo option:selected").val();
		Lungo.Notification.show();
		
		$$.ajax({
 			crossDomain: true,
			type:'POST',
 			url: 'http://localhost/buscame/app/components/php/getData.php?data=dataProducto&id='+valor,
			dataType: 'html',
    		async: true,
			success: function(data) {
				if(data){
					$('#contentProducto').html(data).trigger('refresh');
					Lungo.Notification.hide();
				}else{
					Lungo.Notification.hide();
					setTimeout(function(){
						Lungo.Notification.show(
								"Por favor, compruebe su conexión a internet e intente de nuevo.",
								"signal",  
								4
						);						
					},150);
				}				
			},
		});
  	});

	//Modal de cambiar contraseña
	Lungo.dom('#btn_contraConfig').tap(function() {
			Lungo.Notification.html('<p id="title_configContra">Cambiar contraseña</p><form id="form_configContra"><input type="password" placeholder="Antigua contraseña" class="" id="antPass"><input type="password" placeholder="Nueva contraseña" class="" id="nPass"><input type="password" placeholder="Repetir contraseña" class="" id="rPass"><div id="errorChangePass"></div><a onclick="changeContra();" class="button" id="btnSaveContra">Guardar</a></form>', "Cerrar");
	});


	/* Función para reintentar*/
	Lungo.dom('#btnReintentar4').tap(function() {
		var valor = $("#dataCC option:selected").val();
		Lungo.Notification.show();		
		$$.ajax({
 			crossDomain: true,
			type:'POST',
 			url: 'http://localhost/buscame/app/components/php/getData.php?data=dataAlmacen&id='+valor,
			dataType: 'html',
    		async: true,
			success: function(data) {
				if(data){				
					$('#contentAlmacen').html(data).trigger('refresh');
    				Lungo.Notification.hide();
				}else{
					Lungo.Notification.hide();
					setTimeout(function(){
						Lungo.Notification.show(
								"Por favor, compruebe su conexión a internet e intente de nuevo.",
								"signal",  
								4
						);						
					},150);
				}			
			},
		});
		
		
	});
	
	//Función para mostrar el resultado de las promociones
	Lungo.dom('#result_promo').tap(function() {
		
		var cat = $("#dataCategoria option:selected").val();
		var tipo = $("#dataTipo option:selected").val();
		var ran = $("#dataPrecio option:selected").val();
		var col = $("#dataColor option:selected").val();
		var mar = $("#dataMarca option:selected").val();
		var mat = $("#dataMaterial option:selected").val();
		var cc = $("#dataCC option:selected").val();
		var al = $("#dataAlmacen option:selected").val();		
		var talla = $("#dataTalla option:selected").val();
		var list = "promo";
		var limite = 5;
		if(typeof(Storage)!=="undefined"){
			if (sessionStorage.limiteProm){
				sessionStorage.limiteProm=limite;
			}else{
				sessionStorage.limiteProm=limite;
			}
		}
		Lungo.Notification.show();
		$$.ajax({
			crossDomain: true,
			type:'POST',
			url: 'http://localhost/buscame/app/components/php/getData.php?data=dataList&id_categoria='+cat+'&id_tipo='+tipo+'&id_rango='+ran+'&id_color='+col+'&id_marca='+mar+'&id_material='+mat+'&id_centrocomercial='+cc+'&id_almacen='+al+"&list="+list+"&id_talla="+talla+"&limite="+limite,
			dataType: 'html',
			async: true,
			success: function(data) {
				if(data){				
					$('#list_promo').html(data).trigger('refresh');	
					Lungo.Notification.hide();
				}else{
					Lungo.Notification.hide();
					setTimeout(function(){
						Lungo.Notification.show(
								"Por favor, compruebe su conexión a internet e intente de nuevo.",
								"signal",  
								4
						);						
					},150);
					$('#list_promo').html('<div id="reintentar1"><a id="btnReintentar5" class="button" style="background-color: rgb(61, 191, 247);">Reintentar</a></div>');
				}			
			},
		}); 
	});
	/* Función para reintentar*/
	Lungo.dom('#btnReintentar5').tap(function() {
		
		var cat = $("#dataCategoria option:selected").val();
		var tipo = $("#dataTipo option:selected").val();
		var ran = $("#dataPrecio option:selected").val();
		var col = $("#dataColor option:selected").val();
		var mar = $("#dataMarca option:selected").val();
		var mat = $("#dataMaterial option:selected").val();
		var cc = $("#dataCC option:selected").val();
		var al = $("#dataAlmacen option:selected").val();		
		var talla = $("#dataTalla option:selected").val();
		var list = "promo";
		var limite = 5;
		if(typeof(Storage)!=="undefined"){
			if (sessionStorage.limiteProm){
				sessionStorage.limiteProm=limite;
			}else{
				sessionStorage.limiteProm=limite;
			}
		}
		Lungo.Notification.show();
		$$.ajax({
			crossDomain: true,
			type:'POST',
			url: 'http://localhost/buscame/app/components/php/getData.php?data=dataList&id_categoria='+cat+'&id_tipo='+tipo+'&id_rango='+ran+'&id_color='+col+'&id_marca='+mar+'&id_material='+mat+'&id_centrocomercial='+cc+'&id_almacen='+al+"&list="+list+"&id_talla="+talla+"&limite="+limite,
			dataType: 'html',
			async: true,
			success: function(data) {
				if(data){				
					$('#list_promo').html(data).trigger('refresh');	
					Lungo.Notification.hide();
				}else{
					Lungo.Notification.hide();
					setTimeout(function(){
						Lungo.Notification.show(
								"Por favor, compruebe su conexión a internet e intente de nuevo.",
								"signal",  
								4
						);						
					},150);
				}			
				
			},
		}); 
	});
	
	/* Función para mostrar resultados de menor precio*/
	Lungo.dom('#result_menor').tap(function() {
		
		var cat = $("#dataCategoria option:selected").val();
		var tipo = $("#dataTipo option:selected").val();
		var ran = $("#dataPrecio option:selected").val();
		var col = $("#dataColor option:selected").val();
		var mar = $("#dataMarca option:selected").val();
		var mat = $("#dataMaterial option:selected").val();
		var cc = $("#dataCC option:selected").val();
		var al = $("#dataAlmacen option:selected").val();		
		var talla = $("#dataTalla option:selected").val();
		var list = "menor";
		
		Lungo.Notification.show();			
		$$.ajax({
			crossDomain: true,
			type:'POST',
			url: 'http://localhost/buscame/app/components/php/getData.php?data=dataList&id_categoria='+cat+'&id_tipo='+tipo+'&id_rango='+ran+'&id_color='+col+'&id_marca='+mar+'&id_material='+mat+'&id_centrocomercial='+cc+'&id_almacen='+al+"&list="+list+"&id_talla="+talla,
			dataType: 'html',
			async: true,
			success: function(data) {
				if(data){				
					$('#list_products_3').html(data).trigger('refresh');			
					Lungo.Notification.hide();
				}else{
					Lungo.Notification.hide();
					setTimeout(function(){
						Lungo.Notification.show(
								"Por favor, compruebe su conexión a internet e intente de nuevo.",
								"signal",  
								4
						);						
					},150);
					$('#list_products_3').html('<div id="reintentar1"><a id="btnReintentar6" class="button" style="background-color: rgb(61, 191, 247);">Reintentar</a></div>');
				}			
				
			},
		}); 
	});
	
	/* Función para reintentar*/
	Lungo.dom('#btnReintentar6').tap(function() {		
		var cat = $("#dataCategoria option:selected").val();
		var tipo = $("#dataTipo option:selected").val();
		var ran = $("#dataPrecio option:selected").val();
		var col = $("#dataColor option:selected").val();
		var mar = $("#dataMarca option:selected").val();
		var mat = $("#dataMaterial option:selected").val();
		var cc = $("#dataCC option:selected").val();
		var al = $("#dataAlmacen option:selected").val();		
		var talla = $("#dataTalla option:selected").val();
		var list = "menor";
		
		Lungo.Notification.show();			
		$$.ajax({
			crossDomain: true,
			type:'POST',
			url: 'http://localhost/buscame/app/components/php/getData.php?data=dataList&id_categoria='+cat+'&id_tipo='+tipo+'&id_rango='+ran+'&id_color='+col+'&id_marca='+mar+'&id_material='+mat+'&id_centrocomercial='+cc+'&id_almacen='+al+"&list="+list+"&id_talla="+talla,
			dataType: 'html',
			async: true,
			success: function(data) {
				if(data){				
					$('#list_products_3').html(data).trigger('refresh');			
					Lungo.Notification.hide();
				}else{
					Lungo.Notification.hide();
					setTimeout(function(){
						Lungo.Notification.show(
								"Por favor, compruebe su conexión a internet e intente de nuevo.",
								"signal",  
								4
						);						
					},150);
				}			
				
			},
		}); 
	});
	
	//Función para el botón de buscar del formulario
	Lungo.dom('#content_btn_buscar').tap(function() { 
		var cat = $("#dataCategoria option:selected").val();
		var tipo = $("#dataTipo option:selected").val();
		var ran = $("#dataPrecio option:selected").val();
		var col = $("#dataColor option:selected").val();
		var mar = $("#dataMarca option:selected").val();
		var mat = $("#dataMaterial option:selected").val();
		var cc = $("#dataCC option:selected").val();
		var al = $("#dataAlmacen option:selected").val();
		var talla = $("#dataTalla option:selected").val();
		var none = "none";
		var list = "no";
		var limite = 5;
		if(typeof(Storage)!=="undefined"){
			if (sessionStorage.limiteAll){
				sessionStorage.limiteAll=limite;
			}else{
				sessionStorage.limiteAll=limite;
			}
		}
		
		Lungo.Notification.show();		
		if(cat!=none && tipo!=none && ran != none && col != none && mar != none && mat !=none &&cc != none && al != none && talla != none){ 
			Lungo.Notification.show();
			
			$$.ajax({
				crossDomain: true,
				type:'POST',
				url: 'http://localhost/buscame/app/components/php/getData.php?data=dataList&id_categoria='+cat+'&id_tipo='+tipo+'&id_rango='+ran+'&id_color='+col+'&id_marca='+mar+'&id_material='+mat+'&id_centrocomercial='+cc+'&id_almacen='+al+"&list="+list+"&id_talla="+talla+"&limite="+limite,
				dataType: 'html',
				async: true,
				success: function(data) {
					if(data){				
						$('#list_products').html(data).trigger('refresh');						
						Lungo.Router.article("result", "result_list");
						Lungo.Notification.hide();
					}else{
						Lungo.Router.section("form");
						Lungo.Notification.hide();
						setTimeout(function(){
							Lungo.Notification.show(
									"Por favor, compruebe su conexión a internet e intente de nuevo.",
									"signal",  
									4
							);						
						},150);
					}			
				},
			});
			  
		}else{
			Lungo.Notification.html('<h1 style= "padding: 20px; font-size: 15px;">Selecciona todos los campos por favor.</h1> <a href="#form" data-router="section" class="button large anchor" data-action="close">Cerrar</a>');
		}  
	});	
	
	//Función para finalizar el registro
	Lungo.dom('#btnEmpiezaRe').tap(function() {
		var id_color = $('#colorSelectRegistro').val();
		Lungo.Notification.show();
		$$.ajax({
			crossDomain: true,
			type:'POST',
			url: "http://localhost/buscame/app/components/php/buscameData.php?data=changeColor&id_color="+id_color+'&usuario='+localStorage.usuario,
			dataType: 'html',
			async: true,
			success: function(data) {
				if(data){
					Lungo.Notification.hide();
					Lungo.Router.section('section_logeo');
					setTimeout(function(){
						Lungo.Notification.show(
								"Listo, ahora inica sesion y ¡Empieza a buscar!.",
								"check",  
								3
						);						
					},150);
					setTimeout(function(){
						cargarCategoria();						
					},3300);
					
				}else{
					Lungo.Notification.hide();
					setTimeout(function(){
						Lungo.Notification.show(
								"Por favor, compruebe su conexión a internet e intente de nuevo.",
								"signal",  
								4
						);						
					},150);
				}
			},
		});
	});
	
	//Función para cambiar la contraseña
	Lungo.dom('#btnSaveContra').tap(function() { 
		var antPass=$('#antPass').val();
		var nPass = $('#nPass').val();
		var rPass = $('#rPass').val();
		
		if(antPass==""||nPass==""||rPass==""){
			$('#errorChangePass').html('Completa todos los campos por favor.');	
		}else if(nPass!=rPass){
			$('#errorChangePass').html('Las dos contraseñas no coinciden.');	
		}else if(nPass.length <= 5){
			$('#errorChangePass').html('La contraseña debe ser mayor a 6 carácteres.');	
		}else{
			$('#errorChangePass').html('<span class="icon loading"></span>Cargando...');			
			$$.ajax({
				crossDomain: true,
				type:'POST',
				url: 'http://localhost/buscame/app/components/php/buscameData.php?data=verificarPass&contrasena='+antPass+'&usuario='+localStorage.usuario,
				dataType: 'html',
				async: true,
				success: function(data) {
					if(data){
						data = $.trim(data);
						if(data=="correcto"){
							$$.ajax({
								crossDomain: true,
								type:'POST',
								url: 'http://localhost/buscame/app/components/php/buscameData.php?data=changePass&usuario='+localStorage.usuario+'&contrasena='+nPass,
								dataType: 'html',
								async: true,
								success: function(data) {
									if(data){				
										Lungo.Notification.hide();
										setTimeout(function(){
											Lungo.Notification.show(
												"Listo, tu contraseña ha sido cambiada.",
												"ok",  
												4
											);						
										},150);
									}else{
										$('#errorChangePass').html('Revisa tu conexión a internet.');	
									}			
								},
							});
						}else{
							$('#errorChangePass').html('La contraseña ingresada es incorrecta, intenta de nuevo.');
						}
					}else{
						$('#errorChangePass').html('Revisa tu conexión a internet.');
					}				
				},
			});
		}		
	});
	
	//Función para recordar la contraseña
	Lungo.dom('#btn_remember').tap(function() {
		var correo = $('#remember_pass_email').val();
		if(validarEmail(correo)){
			Lungo.Notification.hide();
			setTimeout(function(){
				Lungo.Notification.show(
						"Digita bien tu correo",
						"remove",  
						2
				);						
			},150);
		}else{
			Lungo.Notification.show();
			$$.ajax({
				crossDomain: true,
				type:'POST',
				url: 'http://localhost/buscame/app/components/php/buscameData.php?data=recuerdaContrasena&correo='+correo,
				dataType: 'html',
				async: true,
				success: function(data) {
					if(data){
						Lungo.Notification.hide();
						data = $.trim(data);
						if(data=="correcto"){
							setTimeout(function(){
								Lungo.Notification.show(
										"Tu contraseña ha sido enviada a tu correo electr&oacute;nico.",
										"evelope",  
										4
								);						
							},150);
						}else{
							setTimeout(function(){
								Lungo.Notification.show(
										"No tenemos ninguna cuenta asociada con tu correo.",
										"remove",  
										4
								);						
							},150);
						}
					}else{
						Lungo.Notification.hide();
						setTimeout(function(){
							Lungo.Notification.show(
									"Por favor, compruebe su conexión a internet e intente de nuevo.",
									"signal",  
									4
							);						
						},150);
					}				
				},
			});	
		}
	});
	
	//Función para guardar cambios de configurarión de perfil
	Lungo.dom('#btn_configProfile').tap(function() {
		var usuario = $('#usuarioChange').val();
		var correo = $('#correoChange').val();
		
		if(usuario==""||correo==""){
			Lungo.Notification.hide();
			setTimeout(function(){
				Lungo.Notification.show(
						"¡Ups! Completa todos los campos.",
						"remove",  
						3
				);						
			},150);
		}else if(validarEmail(correo)){
			Lungo.Notification.hide();
			setTimeout(function(){
				Lungo.Notification.show(
						"Digita bien tu correo",
						"remove",  
						2
				);						
			},150);
		}else{
			Lungo.Notification.show();
			$$.ajax({
				crossDomain: true,
				type:'POST',
				url: 'http://localhost/buscame/app/components/php/buscameData.php?data=changeConfig&usuario='+localStorage.usuario+'&correo='+localStorage.correo+"&correoN="+correo+"&usuarioN="+usuario,
				dataType: 'html',
				async: true,
				success: function(data) {
					if(data){				
						data = $.trim(data);
						if(data=="correcto"||data=="correctocorrecto"){
							Lungo.Notification.hide();
							setTimeout(function(){
								Lungo.Notification.show(
										"Listo, tus datos han sido guardados",
										"ok",  
										4
								);						
							},150);
							localStorage.usuario = usuario;
							localStorage.correo = correo;
						}else if(data=="existeCorreocorrecto"){
							Lungo.Notification.hide();
							setTimeout(function(){
								Lungo.Notification.show(
										"Lo sentimos, el correo ingresado ya existe",
										"remove",  
										3
								);						
							},150);
							setTimeout(function(){
								Lungo.Notification.show(
										"Tu usuario ha sido cambiado.",
										"ok",  
										3
								);						
							},3500);
							localStorage.usuario = usuario;						
						}else if(data=="correctoexisteUsuario"){
							Lungo.Notification.hide();
							setTimeout(function(){
								Lungo.Notification.show(
										"Lo sentimos, el usuario ingresado ya existe",
										"remove",  
										3
								);						
							},150);
							setTimeout(function(){
								Lungo.Notification.show(
										"Tu correo ha sido cambiado.",
										"ok",  
										3
								);						
							},3500);
							localStorage.correo = correo;						
						}else if(data=="existeUsuario"||data=="nadaexisteUsuario"){
							Lungo.Notification.hide();
							setTimeout(function(){
								Lungo.Notification.show(
										'Lo sentimos, el usuario "'+usuario+'" ya existe',
										"exclamation-sign",  
										4
								);						
							},150);
						}else if(data=="existeCorreo"||data=="nadaexisteCorreo"){
							Lungo.Notification.hide();
							setTimeout(function(){
								Lungo.Notification.show(
										"Lo sentimos, el correo ingresado ya existe",
										"exclamation-sign",  
										4
								);						
							},150);
						}else if(data=="existeCorreoexisteUsuario"){
							Lungo.Notification.hide();
							setTimeout(function(){
								Lungo.Notification.show(
										"Lo sentimos, el correo y usuario ya existen",
										"exclamation-sign",  
										4
								);						
							},150);
						}else{
							Lungo.Notification.hide();
							setTimeout(function(){
								Lungo.Notification.show(
										"Los datos son iguales",
										"exclamation-sign",  
										4
								);						
							},150);
						}
					}else{
						Lungo.Notification.hide();
						setTimeout(function(){
							Lungo.Notification.show(
									"Por favor, compruebe su conexión a internet e intente de nuevo.",
									"signal",  
									4
							);						
						},150);
					}			
				},
			});
		}
	});
	
	//Funcion para listar suscripciones
	Lungo.dom('#listarSuscripciones').tap(function() {
		vaciarSelects();
		Lungo.Notification.show();
		$$.ajax({
			crossDomain: true,
			type:'POST',
			url: "http://localhost/buscame/app/components/php/buscameData.php?data=listarSus&usuario="+localStorage.usuario,
			dataType: 'html',
			async: true,
			success: function(data) {							
				if(data){
					$('#contentSus').html(data).trigger('refresh');
					Lungo.Notification.hide();
				}else{
					Lungo.Notification.hide();
					setTimeout(function(){
						Lungo.Notification.show(
								"Por favor, compruebe su conexión a internet e intente de nuevo.",              //Title
								"signal",  
								4     //Callback function
							);						
					},150);
				}				
			}						
		});
	});
	//Función para salir
	Lungo.dom('#tapSalir').tap(function() {
		localStorage.clear();
		location.reload();
	});	


});

//Función  para vaciar los selects
function vaciarSelects(){
	$('#contentCategoria').html(' ');
	$('#contentTipo').html(' ');
	$('#contentProducto').html(' ');
	$('#contentAlmacen').html(' ');
	$('#divsAdicionales').html(' ');
}

/* Función para mostrar el almacén de un producto
	Parámetros:
		valor = id del almacén;
		meGusta = de qué tipo es (Me gusta, gustos o normal;
		div = en qué div se pondrá;
		section = hacia qué sección lo llevará)
	*/
function mostrarAlmacen(valor,meGusta,div,section){	
	Lungo.Notification.show();		
	$$.ajax({
		crossDomain: true,
		type:'POST',
		url: 'http://localhost/buscame/app/components/php/getData.php?data=listarAlmacen&id='+valor+'&meGusta='+meGusta,
		dataType: 'html',
		async: true,
		success: function(data) {
			if(data){
				$('#'+div).html(data);			
				Lungo.Router.section(section);																						
				Lungo.Notification.hide();
			}else{
				Lungo.Notification.hide();
				setTimeout(function(){
					Lungo.Notification.show(
							"Por favor, compruebe su conexión a internet e intente de nuevo.",              //Title
							"signal",  
							4     //Callback function
						);						
				},150);
			}			
		},
	});	
}

/* Función para cancelar la suscripción
	Parámetros:
		id_almacen = el id del almacén a cancelar la suscripción
		btn = en div donde irá el botón;
		id = el id del botón*/
function cancelarSuscripcion(id_almacen,btn,id){
	var usuario = localStorage.usuario;
	Lungo.Notification.show();
	$$.ajax({
		crossDomain: true,
		type:'POST',
		url: 'http://localhost/buscame/app/components/php/getData.php?data=disLike&id_almacen='+id_almacen+'&usuario='+usuario,
		dataType: 'html',
		async: true,
		success: function(data) {
			$('#likeAl').html(data);
			$('#'+btn).html('<div id="box_suscribirme"><a onclick=\'suscribirse("'+id_almacen+'","'+btn+'","'+id+'");\' id="'+id+'" class="button anchor accept">Suscribirme<span class="icon ok"></span></a></div>');			
			Lungo.Notification.hide();
		},
	});	
}
/* Función para suscribirse
	Parámetros:
		id_almacen = el id del almacén a suscribirse;
		btn = en div donde irá el botón;
		id = el id del botón*/
function suscribirse(id_almacen,btn,id){
	var usuario = localStorage.usuario;
	Lungo.Notification.show();
	$$.ajax({
		crossDomain: true,
		type:'POST',
		url: 'http://localhost/buscame/app/components/php/getData.php?data=like&id_almacen='+id_almacen+'&usuario='+usuario,
		dataType: 'html',
		async: true,
		success: function(data) {
			if(data){ 
				$('#'+btn).html('<div id="box_suscribirme"><a class="button anchor cancel sus" onclick=\'cancelarSuscripcion('+id_almacen+',"'+btn+'","'+id+'");\'>Cancelar suscripción<span class="icon remove"></span></a></div>');                   
				Lungo.Notification.hide();
			}else{
				Lungo.Notification.hide();
				setTimeout(function(){
					Lungo.Notification.show(
							"Por favor, compruebe su conexión a internet e intente de nuevo.",
							"signal",  
							4
					);						
				},150);
			}
		},
	});
}

/* Función para mostrar los productos
	Parámetros:
		vaiId= id del producto*/
function mostrarProductoNormal(valId){
	Lungo.Notification.show();
	$$.ajax({
		crossDomain: true,
		type:'POST',
		url: 'http://localhost/buscame/app/components/php/getData.php?data=listarProductos&id='+valId,
		dataType: 'html',
		async: true,
		success: function(data) {
			if(data){
				Lungo.Notification.hide();
				$('#view_buscame_product').html(data);
				Lungo.Router.section('view_product_section');
			}else{
				Lungo.Notification.hide();
				setTimeout(function(){
					Lungo.Notification.show(
							'Por favor, compruebe su conexión a internet e intente de nuevo.',
							'signal',  
							4
					);						
				},150);
			}							
		},
	});						
	$$.ajax({
		crossDomain: true,
		type:'POST',
		url: 'http://localhost/buscame/app/components/php/getData.php?data=dataShared&id_producto='+valId,
		dataType: 'html',
		async: true,
		success: function(data) {
			if(data){	
				Lungo.Notification.hide();			
				$('#shared').html(data);
			}else{
				Lungo.Notification.hide();
				setTimeout(function(){
					Lungo.Notification.show(
							'Por favor, compruebe su conexión a internet e intente de nuevo.',
							'signal',  
							4
					);						
				},150);
			}			
		},
	});
}

/* Función para mostrar los productos que le gustan
	Parámetros:
		vaiId= id del producto*/
function mostrarProductoMeGustan(valId){
	Lungo.Notification.show();
	$$.ajax({
		crossDomain: true,
		type:'POST',
		url: 'http://localhost/buscame/app/components/php/getData.php?data=listarProductos&id='+valId,
		dataType: 'html',
		async: true,
		success: function(data) {
			if(data){
				Lungo.Notification.hide();
				$('#view_buscame_product_megustan').html(data);
				Lungo.Router.section('view_product_section_megustan');
			}else{
				Lungo.Notification.hide();
				setTimeout(function(){
					Lungo.Notification.show(
							'Por favor, compruebe su conexión a internet e intente de nuevo.',
							'signal',  
							4
					);						
				},150);
			}							
		},
	});						
	$$.ajax({
		crossDomain: true,
		type:'POST',
		url: 'http://localhost/buscame/app/components/php/getData.php?data=dataShared&id_producto='+valId,
		dataType: 'html',
		async: true,
		success: function(data) {
			if(data){	
				Lungo.Notification.hide();			
				$('#shared').html(data);
			}else{
				Lungo.Notification.hide();
				setTimeout(function(){
					Lungo.Notification.show(
							'Por favor, compruebe su conexión a internet e intente de nuevo.',
							'signal',  
							4
					);						
				},150);
			}			
		},
	});
}

/* Función para mostrar los productos según gustos
	Parámetros:
		vaiId= id del producto*/
function mostrarProductoGustos(valId){
	Lungo.Notification.show();
	$$.ajax({
		crossDomain: true,
		type:'POST',
		url: 'http://localhost/buscame/app/components/php/getData.php?data=listarProductos&id='+valId,
		dataType: 'html',
		async: true,
		success: function(data) {
			if(data){
				Lungo.Notification.hide();
				$('#view_buscame_gustos').html(data);									
				Lungo.Router.section('sectionProductosGustos');
			}else{
				Lungo.Notification.hide();
				setTimeout(function(){
					Lungo.Notification.show(
							'Por favor, compruebe su conexión a internet e intente de nuevo.',
							'signal',  
							4
					);						
				},150);
			}							
		},
	});						
	$$.ajax({
		crossDomain: true,
		type:'POST',
		url: 'http://localhost/buscame/app/components/php/getData.php?data=dataShared&id_producto='+valId,
		dataType: 'html',
		async: true,
		success: function(data) {
			if(data){	
				Lungo.Notification.hide();			
				$('#shared').html(data);
			}else{
				Lungo.Notification.hide();
				setTimeout(function(){
					Lungo.Notification.show(
							'Por favor, compruebe su conexión a internet e intente de nuevo.',
							'signal',  
							4
					);						
				},150);
			}			
		},
	});
}