<?php
    session_start();
    if($_SESSION["userAlmacen"]){	
?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
		<link rel="stylesheet" type="text/css" href="../css/agregar.css">
		<link type="text/javascript" src="css/agregar.css"></link>        
        <link rel="stylesheet" href="../css/jquery.Jcrop.css" type="text/css" /> 
        <LINK REL="Shortcut Icon" HREF="http://buscameapp.com/favicon.ico"> 
		<link rel="stylesheet" type="text/css" href="../css/DT_bootstrap.css">
        <title><? echo utf8_decode($_SESSION['nameAlmacen']);?></title>        
		<script src="../js/jquery.min.js"></script>        
		<script type="text/javascript" charset="utf-8" language="javascript" src="../js/jquery.dataTables.js"></script>   
		<script type="text/javascript" charset="utf-8" language="javascript" src="../js/DT_bootstrap.js"></script>
        <script src="../js/acceso.js"></script>
        <script src="../js/editar.js"></script>
        <script src="../js/eliminar.js"></script>
        <script src="../js/configuracion.js"></script>
		<script src="../bootstrap/js/bootstrap.min.js"></script>
        <script src="../js/jquery.Jcrop.js"></script>
        <script>
			$(function(){
				  var hash = window.location.hash;
				  hash && $('ul.nav a[href="' + hash + '"]').tab('show');
			});
        </script>
		
	</head>
	<body>
		<div id="global_content">
			<!-- header -->

			<header class="header_cpanel">
				<a href="http://buscameapp.com/"><img class="header_logo" src="../img/letrasBuscame.png"></a>
				<div id="content_profile">
					<p class="text_mark"><? echo utf8_encode($_SESSION['nameAlmacen']);?></p>					
					<img id="img_mark_down" src="../img/down.png">

					<!-- Ventana de perfil -->

					<div id="window_profile">
						<div id="window_profile_mark">
							<img src="<? echo htmlentities ($_SESSION['imgAlmacen']);?>" id="imgAlmacen">
						</div>
						<div id="list_options_profile">
							<ul>
								<li>
									<a><label>...</label></a>
								</li>
								<li>
									<a><label>Soporte</label></a>
								</li>
                                <li>
									<a href="../php/logout.php"><label>Salir</label></a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</header>

			<!-- Navegación Tabs -->

			<div id="content_tabs" class="tab-content">
				<ul class="nav nav-tabs" id="list_categories">
					<li><a href="#agregar_tab" class="btn_nav" data-toggle="tab"><i class="icon-plus icon-white"></i>Agregar</a></li>

					<li ><a href="#editar_tab" class="btn_nav" data-toggle="tab"><i class="icon-pencil icon-white "></i>Editar</a></li>

					<li><a href="#eliminar_tab" class="btn_nav" data-toggle="tab"><i class="icon-remove icon-white"></i>Eliminar</a></li>

					<li><a href="#configuracion_tab" class="btn_nav" data-toggle="tab"><i class="icon-wrench icon-white"></i>Configuraci&oacute;n</a></li>
				</ul>

				<!-- Pestaña agregar -->

				<div class="tab-pane fade in" id="agregar_tab">				

					<div id="content_preview">
                		<div id="content_phone">
                        	<div id="content_iframe">
                				<img src="http://localhost/buscame/accesopanel/acceso/images/preview.png">
                           	</div>
                		</div>
                	</div>
					<!-- Formulario de agregar producto -->

                	<form id="form_agregar" method="post" action="addProduct/index.php" onSubmit="return validar();" enctype="multipart/form-data">
                    
                    	<label class="control-label" >Nombre del producto</label>
						<input type="text" placeholder="Nombre" id="nameAdd" name="nameAdd" required>

						<label class="control-label" >Descripci&oacute;n</label>
						<textarea rows="3" id="descripAdd" placeholder="Descripci&oacute;n" name="descripAdd" required></textarea>
                    
                		<label class="control-label" >Seleccionar una categor&iacute;a</label>
                		<select id="categoriaAdd" onChange="catSelect();" name="catAdd">                			
					  		<option>Seleccionar</option>					  		
						</select>
						
                        <div id="contTipo">
                            
						</div>
                        
						<label class="control-label" >&iquest;Est&aacute; en promoci&oacute;n?</label>
						<label class="radio">
							<input type="radio" name="promAdd" id="promSiAdd" value="Si" onClick="promYes();">
						  	Si
						</label>
						<label class="radio">
						  <input type="radio" name="promAdd" id="promNoAdd" value="No" onClick="promNo();" checked>
						 	No
						</label>
						
                        <label class="control-label" >Rango del precio</label>
                		<select id="rangoAdd" name="rangoAdd">                			
					  		<option>Seleccionar</option>					  		
						</select>
						
						<div class="input-prepend input-append" id="div_price">
							<label class="control-label" id="preAct">Precio</label>
							<span class="add-on">$</span>
							<input class="span2" id="precioAdd" type="number" name="precioAdd" required>							
						</div>
                        <div id="preAnt">
														
						</div>
                        
						<label class="control-label" >Color</label>
                		<select id="colorAdd" name="colorAdd">                			
					  		<option>Seleccionar</option>					  		
						</select>

						<label class="control-label" >Marca</label>
                		<select id="marcaAdd" name="marcaAdd">                			
					  		<option>Seleccionar</option>					  		
						</select>

						<label class="control-label" >Material</label>
                		<select id="materialAdd" name="materialAdd">                			
					  		<option>Seleccionar</option>					  		
						</select>

						<label class="control-label" >Tipo de talla</label>
                		<select id="tipoTallaAdd" onChange="changeTipoTalla()" name="tipoTallaAdd">                			
					  		<option>Seleccionar</option>					  		
						</select>
						
                        <div id="contTalla">
                            						
                        </div>
						
                        <div id="contentImg1" class="contentImg">
                            <label class="control-label" >Imagen principal</label>
                            <div class="custom-input-file"><input type="file" class="input-file" id="fileImg1" name="fileImg1" />
                            	Seleccionar imagen 1
                                <div class="archivo">...</div>
                            </div>
                            <div id="contentFileImg1">                   
                            </div>
                      	</div>
                        
                        <div id="contentImg2" class="contentImg">
                            <label class="control-label" >Imagen 2</label>
                        	<input type="checkbox" id="checkImg2" value="imagen2" onChange="checkFile2();"/>
                            <div id="contentInputFileImg2">
                            	
                            </div>
						</div>
                        
                        <div id="contentImg3" class="contentImg">
                            <label class="control-label" >Imagen 3</label>
                            <input type="checkbox" id="checkImg3" value="imagen2" onChange="checkFile3();"/>
                            <div id="contentInputFileImg3">
                            	
                            </div>
                            
                       	</div>

						<button class="btn btn-primary btnBlue" id="btnAgregar" value="Agregar" name="btnAgregar">Agregar</button>
                        <div id="errorAgregar">
                          	
                        </div>

                        <div id="loadModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                       		<div class="modal-header">
                            	<h3 id="myModalLabel">Subiendo im&aacute;genes, por favor espere.</h3>
                          	</div>
                          	<div class="modal-body">
                            	<div class="progress progress-striped active">
                                    <div class="bar" style="width:100%;" id="progress"></div>
                                </div>
                          	</div>
                        </div>
                	</form>
                </div>

                <!-- Pestaña de editar producto -->

              	<div class="tab-pane fade" id="editar_tab">

              		<!-- Tabla de productos -->

              		<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="editar">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Descripci&oacute;n</th>
                                <th>Precio</th>
                                <th>En promoci&oacute;n</th>
                                <th>Talla</th>
                                <th>Color</th>
                                <th>Editar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
							include_once('../php/funcionesAcceso.php');
							$datosProductos=new accesoBuscame;
							$editar = $datosProductos->getAllProducts($_SESSION['idAlmacen']);
							while($row = mysqli_fetch_array($editar)){
								?>
								<tr class="odd gradeX">
                                    <td><? echo utf8_encode($row['nombre']);?></td>
                                    <td><? echo utf8_encode($row['descripcion']);?></td>
                                    <td>$<? echo $row['precio'];?></td>
                                    <td><? echo $row['promocion'];?></td>
                                    <td><? echo utf8_encode($datosProductos->getSolaTalla($row['id_talla']));?></td>
                                    <td><? echo utf8_encode($datosProductos->getSoloColor($row['id_color']));?></td>
                                    <td><button class="btn btn-primary btn_edit btnBlue" data-toggle="modal" onClick="modalEdit(<? echo $row['id_producto'];?>);"><i class=" icon-pencil icon-white"></i></button></td>
		                		</tr>
                                
                                <?php
							}
							?>
                        </tbody>
                    </table>
                            	
		                	<!--<tr>
		                  		<td>Zapatos finos</td>
		                  		<td>Zapatos elegantes para eventos sociales</td>
		                  		<td>$350,000</td>
		                  		<td>Si</td>
		                  		<td>38</td>
		                  		<td>Negro</td>
		                  		<td><button href="#myModal" class="btn btn-primary btn_edit" data-toggle="modal"><i class=" icon-pencil icon-white"></i></button></td>
		                	</tr>
                            
                            		                	
		              	</tbody>
		            </table>    -->

		            <!-- Modal -->

		            <div id="editModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<form id="formEdit" method="post" action="editProduct/index.php">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h3 id="myModalLabel">Editar producto</h3>
                            </div>
                            
                                <div class="modal-body" id="contEditModal">
                                    
                                </div>
    
                            <div class="modal-footer">
                                <button class="btn" data-dismiss="modal" aria-hidden="true">Cerrar</button>
                                <button class="btn btn-primary btnBlue" id="btnEditar" name="btnEditar">Guardar</button>
                            </div>
                     	</form>
					</div>        	
              	</div>

              	<!-- Pestaña de eliminar producto -->

              	<div class="tab-pane fade" id="eliminar_tab">

              		<!-- Tabla de productos -->

                	<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="eliminar">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Descripci&oacute;n</th>
                                <th>Precio</th>
                                <th>En promoci&oacute;n</th>
                                <th>Talla</th>
                                <th>Color</th>
                                <th>Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
							include_once('../php/funcionesAcceso.php');
							$datosProductos=new accesoBuscame;
							$editar = $datosProductos->getAllProducts($_SESSION['idAlmacen']);
							while($row = mysqli_fetch_array($editar)){
								?>
								<tr class="odd gradeX">
                                    <td><? echo utf8_encode($row['nombre']);?></td>
                                    <td><? echo utf8_encode($row['descripcion']);?></td>
                                    <td>$<? echo $row['precio'];?></td>
                                    <td><? echo $row['promocion'];?></td>
                                    <td><? echo utf8_encode($datosProductos->getSolaTalla($row['id_talla']));?></td>
                                    <td><? echo utf8_encode($datosProductos->getSoloColor($row['id_color']));?></td>
                                    <td><button class="btn btn-primary btn_remove" onClick="removeProduct(<? echo $row['id_producto'];?>,'<? echo $row['nombre'];?>');"><i class=" icon-remove icon-white"></i></button></td>
		                		</tr>
                                
                                <?php
							}
							?>
                        </tbody>
                    </table>
                    
                     <!-- Modal -->

		            <div id="removeModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h3 id="mensajeEliminar"></h3>
                            </div>
    
                            <div class="modal-footer">
                                <button class="btn" data-dismiss="modal" aria-hidden="true">Cerrar</button>
                                <button class="btn btn-danger" id="btnEliminar" name="btnEditar">Eliminar</button>
                            </div>
					</div>        
                    
              	</div>

              	<!-- Tabla de configuracion -->

              	<div class="tab-pane fade" id="configuracion_tab">                   	
                    <div class="span4" id="contImg">
                        <div class="thumbnail">
                            <img data-src="holder.js/300x200" alt="300x200" style="width: 300px; height: 200px;" src="<? echo $_SESSION['imgAlmacen'];?>">
                            <form action="config/index.php" method="post" enctype="multipart/form-data">
                                <div class="caption">
                                    <label>Cambiar imagen</label>
                                    <input type="file" name="imgFileAlmacen" style="display:none;" id="imgFileAlmacen"/>
                                    <div class="input-append">
                                        <input type="text" name="subfile" id="subfile">
                                        <a class="btn" onclick="$('#imgFileAlmacen').click();">Seleccionar</a>
                                    </div>
                                    <br/>
                                    <button class="btn btn-primary btnBlue" onClick="return changeImgAl();" name="btnImgAl">Cambiar imagen</button>
                                    <div id="messageImg" style="position: absolute;margin-top: 40px;width: 277px;">
                                    
                                    </div>
                                </div>
                         	</form>
                        </div>
                    </div>
                   	<form id="form_config" method="post" action="config/index.php">  
                        <br>
	              		<label class="control-label" >Nombre del almacen</label>
						<input type="text" placeholder="Nombre" value="<?php echo utf8_encode($_SESSION['nameAlmacen']);?>" required name="nombreAl">        
						
                        <br>
                        <button class="btn btn-primary btnBlue" type="button" id="btnChangePass" onclick="$('#changeContrasena').modal('show');">Cambiar contrase&ntilde;a</button>
                        
                        
						 

						<label class="control-label" >Local</label>
						<input type="text" placeholder="No. Local" value="<? echo $_SESSION['localAlmacen'];?>" required name="localAl">    

						<label class="control-label" >Centro Comercial</label>
	                		<select name="ccAl"> 
                            	<?
								$centroComercial = $datosProductos->selectCC();
								while($cc = mysqli_fetch_array($centroComercial)){
								?>               			
						  			<option value="<? echo $cc['id_centroComercial'];?>" <? if($cc['id_centroComercial']==$_SESSION['idCC']){ echo "selected";}?>><? echo utf8_encode($cc['centrocomercial']);?></option>
                                <?
								}
								?>					  		
							</select>

						<label class="control-label" >Descripcion</label>
						<textarea rows="3" required name="descripAl"><? echo utf8_encode($_SESSION['descripcionAlmacen']);?></textarea>

						<label class="control-label" >Telefono</label>
						<input type="text" placeholder="No. Telefono" value="<? echo $_SESSION['telefonoAlmacen'];?>" required name="telAl">
						<br>
						<input class="btn btn-primary btnBlue" type="submit" value="Guardar cambios" name="btnGuar"/>
					</form>
              	</div>
                <div class="modal hide fade" id="changeContrasena">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h3>Cambiar contrase&ntilde;a</h3>
                    </div>                    
                    <div class="modal-body" style="height:260px;">
                        <label class="control-label" >Contraseña anterior</label>
                        <input type="password" placeholder="Contraseña anterior" id="passAnt" required>

                        <label class="control-label" >Contraseña nueva</label>
                        <input type="password" placeholder="Contraseña nueva" required id="passNew">   
    
                        <label class="control-label" >Repetir contraseña</label>
                        <input type="password" placeholder="Repetir contraseña" required id="passNewRe">
                        <div id="errorPass" style="display:none;">
                            
                        </div>
                    </div>
                    
                    <div class="modal-footer">
                        <button class="btn" data-dismiss="modal">Cerrar</button>
                        <button class="btn btn-primary btnBlue" id="btnSavePass">Cambiar contrase&ntilde;a</button>
                    </div>
                </div>
			</div>
		</div>

		<footer>
			<p id="text_footer">Desarrollado por <a href="http://scriptmedia.co" target="_blank">Script Media</a></p>
		</footer>

		<script type="text/javascript">
			$('#myTab a').click(function (e) {
			  e.preventDefault();
			  $(this).tab('show');
			})
		</script>

	</body>
</html>
<?php
}else{
	header('Location: http://localhost/buscame/');
}