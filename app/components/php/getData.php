<?php
	include_once('funcionesBuscame.php');
	$data = isset($_REQUEST['data']) ? $_REQUEST['data']:"";
	$id = isset($_REQUEST['id']) ? $_REQUEST['id']:"";
	$id_categogia = isset($_REQUEST['id_categoria']) ? $_REQUEST['id_categoria']:"";
	$id_tipo = isset($_REQUEST['id_tipo']) ? $_REQUEST['id_tipo']:"";
	$id_rango = isset($_REQUEST['id_rango']) ? $_REQUEST['id_rango']:"";
	$id_color = isset($_REQUEST['id_color']) ? $_REQUEST['id_color']:"";
	$id_marca = isset($_REQUEST['id_marca']) ? $_REQUEST['id_marca']:"";
	$id_material = isset($_REQUEST['id_material']) ? $_REQUEST['id_material']:"";
	$id_centrocomercial = isset($_REQUEST['id_centrocomercial']) ? $_REQUEST['id_centrocomercial']:"";
	$id_almacen = isset($_REQUEST['id_almacen']) ? $_REQUEST['id_almacen']:"";
	$id_talla = isset($_REQUEST['id_talla']) ? $_REQUEST['id_talla']:"";
	$list = isset($_REQUEST['list']) ? $_REQUEST['list']:"";
	$id_producto = isset($_REQUEST['id_producto']) ? $_REQUEST['id_producto']:"";
	$ip = isset($_REQUEST['ip']) ? $_REQUEST['ip']:"";
	$meGusta = isset($_REQUEST['meGusta']) ? $_REQUEST['meGusta']:"";
	$limite = isset($_REQUEST['limite']) ? $_REQUEST['limite']:"";
	$usuario = isset($_REQUEST['usuario']) ? $_REQUEST['usuario']:"";
	
	//Objeto de acceso búscame
	$getDatos = new accesoBuscame; 
	
	//Verificamos que necesita la página para imprimirlo
	
	//Centro comercial
	if($data=="centroComercial"){
		//Llamamos los datos del centro comercial
		$consulta = $getDatos->getCentroComercial();
		if($consulta){
			?>
            	<option value="none">Seleccionar</option>
				<option value="all">Todos</option>
			<?php
			while($row = mysqli_fetch_array($consulta)){
				?>
				<option value="<?php echo $row['id_centroComercial'];?>"><?php echo $row['centrocomercial'];?></option>
				<?php
			}				
		}else{
			echo "<option>Ningún dato encontrado</option>";	
		}
	}else 

	if($data == "categoria"){		
		$categoria = $getDatos->getCategoria();
		if($categoria){
			?>
            <label class="label_intro">Selecciona una categoria</label>
            	<label class="select" >
                	<select class="custom" id="dataCategoria" onchange="clickCat()">
                    	<option value="none">Seleccionar</option>
                    	<option value="all">Todos</option>
			<?php
			while($row = mysqli_fetch_array($categoria)){
				?>
						<option value="<?php echo $row['id_categoria'];?>"><?php echo utf8_encode($row['categoria']);?></option><?php					
			}
			?>
					</select>
                </label>
			<?php
			
		}else{
			echo "<option>Ningún dato encontrado</option>";	
		}
	}
	//Búsqueda para el tipo
	else if($data=="tipo"&&$id!=null){
		$consulta = $getDatos->getTipo($id);
		if($consulta){
			?>
				<label class="label_intro">Seleccione tipo</label>
                   	<label class="select">
                      	<select class="custom" id="dataTipo" onchange="clickTipo()">
                            <option value="none">Seleccionar</option>
							<option value="all">Todos</option>                           
			<?php
			while($row = mysqli_fetch_array($consulta)){
				?>
							<option value="<?php echo $row['id_tipo'];?>"><?php echo utf8_encode($row['tipo']);?></option><?php					
			}			
			?>
						</select>
                	</label>			
			<?php
		}else{
			?><label class="label_intro">No se encontró ningún dato, por favor intenta de nuevo</label>
			<?php 
		}
	}
	//Retorna rangos de los precios, color, marca, material y talla
	
	if($data=="dataProducto"&&$id!=null){
		
		if($id!="all"){
			$talla = $getDatos->getTalla($id);
			if($talla){
				?>
				<label class="label_intro">Seleccione la talla</label>
                   	<label class="select">
                      	<select class="custom" id="dataTalla">   
							<option value="all">Todos</option>                          
				<?php
				while($rowTa = mysqli_fetch_array($talla)){
				?>
							<option value="<?php echo $rowTa['id_talla'];?>"><?php echo utf8_encode($rowTa['talla']);?></option>			
							<?php					
			}
			
			?>
						</select>
          			</label>			
			<?php
			}
		}
		
		$rango = $getDatos->getRango();
		if($rango){
			?>
				<label class="label_intro">Seleccione precio</label>
                   	<label class="select">
                      	<select class="custom" id="dataPrecio">  
							<option value="all">Todos</option>                         
			<?php
			while($rowR = mysqli_fetch_array($rango)){
				?>
							<option value="<?php echo $rowR['id_rango'];?>"><?php echo utf8_encode($rowR['rango']);?></option>			
							<?php					
			}
			
			?>
						</select>
          			</label>
			
			<?php
		}else{
			?><label class="label_intro">No se encontró ningún precio, por favor intenta más tarde.</label>
			<?php 
		}
		
		$color = $getDatos->getColor($id);
		if($color){
			?>
				<label class="label_intro">Seleccione el color</label>
                   	<label class="select">
                      	<select class="custom" id="dataColor">   
							<option value="all">Todos</option>                          
			<?php
			while($rowC = mysqli_fetch_array($color)){
				?>
							<option value="<?php echo $rowC['id_color'];?>"><?php echo utf8_encode($rowC['color']);?></option>			
							<?php					
			}
			
			?>
						</select>
          			</label>
			
			<?php
		}else{
			?><label class="label_intro">No se encontró ningún color, por favor intenta más tarde.</label>
			<?php 
		}
		
		$marca = $getDatos->getMarca($id);
		if($marca){
			?>
				<label class="label_intro">Seleccione la marca</label>
                   	<label class="select">
                      	<select class="custom" id="dataMarca">   
							<option value="all">Todos</option>                          
			<?php
			while($rowMar = mysqli_fetch_array($marca)){
				?>
							<option value="<?php echo $rowMar['id_marca'];?>"><?php echo utf8_encode($rowMar['marca']);?></option>			
							<?php					
			}
			
			?>
						</select>
          			</label>
			
			<?php
		}else{
			?><label class="label_intro">No se encontró ninguna marca, por favor intenta más tarde.</label>
			<?php 
		}
		
		$material = $getDatos->getMaterial($id);
		if($material){
			?>
				<label class="label_intro">Seleccione el material</label>
                   	<label class="select">
                      	<select class="custom" id="dataMaterial">   
							<option value="all">Todos</option>                          
			<?php
			while($rowMat = mysqli_fetch_array($material)){
				?>
							<option value="<?php echo $rowMat['id_material'];?>"><?php echo utf8_encode($rowMat['material']);?></option>			
							<?php					
			}
			
			?>
						</select>
          			</label>
			
			<?php
		}else{
			?><label class="label_intro">No se encontró ningún material, por favor intenta más tarde.</label>
			<?php 
		}
		//Centro comercial
		$centroComercial = $getDatos->getCentroComercial($id);
		if($centroComercial){
			?>
				<label class="label_intro">Seleccione el Centro Comercial</label>
                   	<label class="select">
                      	<select class="custom" id="dataCC" onchange="clickCC();">   
                        	<option value="none">Seleccionar</option>
							<option value="all">Todos</option>                          
			<?php
			while($rowCc = mysqli_fetch_array($centroComercial)){
				?>
							<option value="<?php echo $rowCc['id_centroComercial'];?>"><?php echo utf8_encode($rowCc['centrocomercial']);?></option>			
							<?php					
			}
			
			?>
						</select>
          			</label>			
			<?php
		}else{
			?><label class="label_intro">No se encontró ningún centro comercial, por favor intenta más tarde.</label>
			<?php 
		}		
	}
	if($data=="dataAlmacen"&&$id!=null){
		//Almacén
		$almacen = $getDatos->getAlmacen($id);
		if($almacen){
			?>
				<label class="label_intro">Seleccione el almacén.</label>
                   	<label class="select">
                      	<select class="custom" id="dataAlmacen">   
							<option value="all">Todos</option>                          
			<?php
			while($rowAl = mysqli_fetch_array($almacen)){
				?>
							<option value="<?php echo $rowAl['id_almacen'];?>"><?php echo utf8_encode($rowAl['almacen']);?></option>			
							<?php					
			}
			
			?>
						</select>
          			</label>
               	</label>		
			<?php
		}else{
			?><label class="label_intro">No se encontró ningún centro almacén, por favor intenta más tarde.</label>
			<?php 
		}?>
    		<div id="content_btn_buscar">
            	<a id="btn_buscar" class="button accept">Buscar</a>
            </div>
		<?php
	}
	if($data == "dataList"){
		$productos = $getDatos->getProductos($id_categogia,$id_tipo,$id_rango,$id_color,$id_marca,$id_material,$id_centrocomercial,$id_almacen,$list,$id_talla,$limite);
		if($productos){		
			$impresion = "<script>";
			$cont = 0;
			while($rowPro = mysqli_fetch_array($productos)){
			?>
					<li class="thumb open_list arrow events_touch_list" onclick="mostrarProductoNormal('<?php echo $rowPro['id_producto']?>')">
            			<img src="<?php echo $rowPro['img1'];?>" id="img_list"  />
                        <strong class="open_list" ><?php echo utf8_encode($rowPro['nombre']);?></strong>
                        <?php if($rowPro['promocion']=="Si"){?>
                            <div class="right tag cancel">
                                En promoción
                            </div> 
                        <?php }?>                   
                    </li>
                   <?php 
					$cont = $cont+1;
			}
			$impresion .= "$('#pullUpAll').show();";
			if($cont==0&&$limite==5){
				echo '<img src="imagenes/noResultNormal.png" class="noResult">';
				$impresion .= "$('#pullUpAll').hide();";
			}
			if($cont==0){
				$impresion .="	setTimeout(function(){
									Lungo.Notification.show(
										'No hay más resultados para tu búsqueda.',
										'search',  
										4     
									);	
								},150);";
			}
			$impresion .="</script>";		
			echo $impresion;
			
		}
	}
	if($data=="listarProductos"){
		$productos = $getDatos->getListaProductos($id);
		if($productos){
			$rowPro = mysqli_fetch_array($productos);
				?>
               	<script>
					$(document).ready(function(e) {	
					 	var img1 = "";
						var img2 = "";
						var img3 = "";
						
						<?php 
						if($meGusta=="si"){
							if($rowPro['img1']!=null){
							?>
								img1 = '<div style="overflow: hidden;"><div id="zoomImaM1"><div><img src="<?php echo $rowPro['img1'];?>" class="img_view_product"></div></div></div>';
								Lungo.dom('#zoomImgM1').tap(function() {
									Lungo.Notification.html(img1, "Cerrar");
									myScroll = new IScroll('#zoomImaM1', {
										zoom: true,
										scrollX: true,
										scrollY: true,
										mouseWheel: true,
										wheelAction: 'zoom'
									});
								});
							<?php 
							}
							if($rowPro['img2']!=null){
							?>
								img2 = '<div style="overflow: hidden;"><div id="zoomImaM2"><div><img src="<?php echo $rowPro['img2'];?>" class="img_view_product"></div></div></div>';
								Lungo.dom('#zoomImgM2').tap(function() {
									Lungo.Notification.html(img2, "Cerrar");
										myScroll = new IScroll('#zoomImaM2', {
										zoom: true,
										scrollX: true,
										scrollY: true,
										mouseWheel: true,
										wheelAction: 'zoom'
									});
								});
							<?php
							}
							if($rowPro['img3']!=null){
							?>
								 
								img3 = '<div id="zoomImaM3" style="overflow: hidden;"><div><img src="<?php echo $rowPro['img3'];?>" class="img_view_product"></div></div>';
								Lungo.dom('#zoomImgM3').tap(function() {
									Lungo.Notification.html(img3, "Cerrar");
									myScroll = new IScroll('#zoomImaM3', {
										zoom: true,
										scrollX: true,
										scrollY: true,
										mouseWheel: true,
										wheelAction: 'zoom'
									});
								});
							<?php
							}							
						}
						else if($meGusta=="gustos"){
							if($rowPro['img1']!=null){
							?>
								img1 = '<div style="overflow: hidden;"><div id="zoomImaGus1"><div><img src="<?php echo $rowPro['img1'];?>" class="img_view_product"></div></div></div>';
								Lungo.dom('#zoomImgGus1').tap(function() {
									Lungo.Notification.html(img1, "Cerrar");
									myScroll = new IScroll('#zoomImaGus1', {
										zoom: true,
										scrollX: true,
										scrollY: true,
										mouseWheel: true,
										wheelAction: 'zoom'
									});
								});
							<?php 
							}
							if($rowPro['img2']!=null){
							?>
								 
								img2 = '<div id="zoomImaGus2" style="overflow: hidden;"><div><img src="<?php echo $rowPro['img2'];?>" class="img_view_product"></div></div>';
								Lungo.dom('#zoomImgGus2').tap(function() {
									Lungo.Notification.html(img2, "Cerrar");
										myScroll = new IScroll('#zoomImaGus2', {
										zoom: true,
										scrollX: true,
										scrollY: true,
										mouseWheel: true,
										wheelAction: 'zoom'
									});
								});
							<?php
							}
							if($rowPro['img3']!=null){
							?>
								 
								img3 = '<div id="zoomImaGus3" style="overflow: hidden;"><div><img src="<?php echo $rowPro['img3'];?>" class="img_view_product"></div></div>';
								Lungo.dom('#zoomImgGus3').tap(function() {
									Lungo.Notification.html(img3, "Cerrar");
									myScroll = new IScroll('#zoomImaGus3', {
										zoom: true,
										scrollX: true,
										scrollY: true,
										mouseWheel: true,
										wheelAction: 'zoom'
									});
								})
							<?php
							}
						}
						else{
							if($rowPro['img1']!=null){
							?>
								img1 = '<div style="overflow: hidden;"><div id="zoomIma1"><div><img src="<?php echo $rowPro['img1'];?>" class="img_view_product"></div></div></div>';
								Lungo.dom('#zoomImg1').tap(function() {
									Lungo.Notification.html(img1, "Cerrar");
									myScroll = new IScroll('#zoomIma1', {
										zoom: true,
										scrollX: true,
										scrollY: true,
										mouseWheel: true,
										wheelAction: 'zoom'
									});
								});
							<?php 
							}
							if($rowPro['img2']!=null){
							?>
								 
								img2 = '<div id="zoomIma2" style="overflow: hidden;"><div><img src="<?php echo $rowPro['img2'];?>" class="img_view_product"></div></div>';
								Lungo.dom('#zoomImg2').tap(function() {
									Lungo.Notification.html(img2, "Cerrar");
										myScroll = new IScroll('#zoomIma2', {
										zoom: true,
										scrollX: true,
										scrollY: true,
										mouseWheel: true,
										wheelAction: 'zoom'
									});
								});
							<?php
							}
							if($rowPro['img3']!=null){
							?>
								 
								img3 = '<div id="zoomIma3" style="overflow: hidden;"><div><img src="<?php echo $rowPro['img3'];?>" class="img_view_product"></div></div>';
								Lungo.dom('#zoomImg3').tap(function() {
									Lungo.Notification.html(img3, "Cerrar");
									myScroll = new IScroll('#zoomIma3', {
										zoom: true,
										scrollX: true,
										scrollY: true,
										mouseWheel: true,
										wheelAction: 'zoom'
									});
								})
							<?php
							}
						}
						?>
                    });
					document.addEventListener('touchmove', function (e) { e.preventDefault(); }, false);
				</script>
                <div id="container_global_view_product" class="active block">
                	<?php 
					if($meGusta=="si"){
					?>
						<div data-controlM="carousel">
					<?php
					}else if($meGusta=="gustos"){
					?>
						<div data-control="carousel">
					<?php
					}else{
					?>
						<div data-controlC="carousel">
					<?php
					}
					?>
                   	
                		<div>
                        	<?php 
							if($meGusta=="si"){
								if($rowPro['img1']!=null){
								?>
									<div id="zoomImgM1">
										<div>
											<img src="<?php echo $rowPro['img1'];?>" class="img_view_product">			                       
										</div>
									</div>
								<?php 
								}	
								if($rowPro['img2']!=null){
								?>
									<div id="zoomImgM2">
										<div>
											<img src="<?php echo $rowPro['img2'];?>" class="img_view_product">			                       
										</div>
									</div>
								 <?php 
								}	
								if($rowPro['img3']!=null){
								?>
									<div id="zoomImgM3">
										<div>
											<img src="<?php echo $rowPro['img3'];?>" class="img_view_product">			                       
										</div>
									</div>
								 <?php 
		                	}
							}else if($meGusta=="gustos"){
								if($rowPro['img1']!=null){
								?>
									<div id="zoomImgGus1">
											<img src="<?php echo $rowPro['img1'];?>" class="img_view_product">		
									</div>
								<?php 
								}	
								if($rowPro['img2']!=null){
								?>
									<div id="zoomImgGus2">
											<img src="<?php echo $rowPro['img2'];?>" class="img_view_product">	
									</div>
								 <?php 
								}	
								if($rowPro['img3']!=null){
								?>
									<div id="zoomImgGus3">
											<img src="<?php echo $rowPro['img3'];?>" class="img_view_product">	
									</div>
								 <?php 
								}
							}else{
								if($rowPro['img1']!=null){
								?>
									<div id="zoomImg1">
										<div>
											<img src="<?php echo $rowPro['img1'];?>" class="img_view_product">			                       
										</div>
									</div>
								<?php 
								}	
								if($rowPro['img2']!=null){
								?>
									<div id="zoomImg2">
										<div>
											<img src="<?php echo $rowPro['img2'];?>" class="img_view_product">			                       
										</div>
									</div>
								 <?php 
								}	
								if($rowPro['img3']!=null){
								?>
									<div id="zoomImg3">
										<div>
											<img src="<?php echo $rowPro['img3'];?>" class="img_view_product">			                       
										</div>
									</div>
								 <?php 
								}
							}
							?>
                            </div>
                   	</div>
                    <div id="text_view_product" >   
                    	<div id="content_box" style="margin-left: 3%;margin-top: 5px;">
							<?php 
                            if($meGusta=="si"){
                            ?>	<div id="likeBtnMe">
                                    <a id="btnProMe<?php echo $rowPro['id_producto'];?>" class="button compass btnLike"> 
                                        Me gusta<div><img src="imagenes/meGusta.png"/></div>
                                    </a>
							<?php 
                            }else if($meGusta=="gustos"){
                            ?>
                            	<div id="likeBtnGus">
                                    <a id="btnProGus<?php echo $rowPro['id_producto'];?>" class="button compass btnLike" > 
                                    	Me gusta<div><img src="imagenes/meGusta.png"/></div>
                                    </a>	
                               	<?php
								}else{
                            ?>
                            	<div id="likeBtn">
                                    <a id="btnPro<?php echo $rowPro['id_producto'];?>" class="button compass btnLike"> 
                                        Me gusta<div><img src="imagenes/meGusta.png"/></div>
                                  	</a>	
                               	<?php
								}
								?>
                            </div>
                            
                           	<div id="caja_gusta" style="margin-top: 15px;color:rgb(94, 92, 92); padding-top: 15px;margin-right: 0px;">
                            	<p id="likePro">A <?php echo $rowPro['likes'];?> personas les gusta </p>
                          	</div>
                      	</div>
                        
                    	<p class="text_descript">Nombre</p>
                    	<div id="text_view_product_nombre" class="text_product">
	                    	<p id="text_brand"><?php echo utf8_encode($rowPro['nombre']);?></p>
	                    </div>
                        <p class="text_descript">Talla</p>
	                    <div id="text_view_product_brand" class="text_product">
                        	<p id="text_brand"><?php echo utf8_encode($getDatos->getSolaTalla($rowPro['id_talla']));?></p>
                        </div>
                        <p class="text_descript">Precio</p>
                        <div id="text_view_product_priceprom" class="text_product">
                        	<?php 
							if($rowPro['promocion']=="Si"){
							?>
                                <div id="tag_product" class="right tag cancel">
                                        En promoción
                                </div>
                                <div id="preAnt" style="margin-top:20px;">
                                	<p id="text_price" style="color: rgb(95, 95, 95);">$<?php echo number_format($rowPro['precio'],0, ",", ".");?></p>
                                	<p id="text_price" style="line-height: 17px;font-size: 16px;">Precio anterior<br />$<?php echo number_format($rowPro['precioAnterior'],0, ",", ".");?></p>
                                </div> 
		                    <?php 
							}else{
								?><p id="text_price">$<?php echo number_format($rowPro['precio'],0, ",", ".");?></p><?php
							}
							?>  
                            
                        </div>
	                    <p class="text_descript">Marca</p>
	                    <div id="text_view_product_brand" class="text_product">
                        	<p id="text_brand"><?php echo utf8_encode($getDatos->getSolaMarca($rowPro['id_marca']));?></p>
                        </div>
                        <p class="text_descript">Almacen</p>
                        <?php 
						if($meGusta=="si"){
						?>
							<!--<a href="#section_almacen_me_gustan" data-router="section" id="mostrarAlmacenMe">-->
                            <a onclick="mostrarAlmacen('<?php echo $rowPro['id_almacen'];?>','si','almacen_megustan','section_almacen_me_gustan');" id="mostrarAlmacenMe">
                        <?php
						}else if($meGusta=="gustos"){
						?>
                        	<!--<a href="#section_almacen_gustos" data-router="section" id="mostrarAlmacenGus">-->
                            <a onclick="mostrarAlmacen('<?php echo $rowPro['id_almacen'];?>','gustos','almacen_gustos','section_almacen_gustos');" id="mostrarAlmacenGus">
                        <?php
						}else{
						?>
                        	<!--<a href="#section_almacen" data-router="section" id="mostrarAlmacen">-->
                            <a onclick="mostrarAlmacen('<?php echo $rowPro['id_almacen'];?>','ninguno','article_almacen','section_almacen');" id="mostrarAlmacen">
                        <?php
						}
						?>
                        	<div class="text_product " id="text_view_product_store">
                            	<span class="icon chevron-right" style="padding: 0;margin-left: 3%;color:rgb(133, 128, 128);"></span>
                                <p id="text_store" data-icon="chevron-right" style="display: inline-block;padding: 0;"><?php echo utf8_encode($getDatos->getSoloAlmacen($rowPro['id_almacen']));?></p>
                            </div>
                        </a>
                        <p class="text_descript" style="margin-top:-5%;">Descripción</p>
                        <div >
                        	<div class="text_product">
                            	<p id="text_brand"><?php echo utf8_encode($rowPro['descripcion']);?></p>
                            </div>
                        </div>                      
                    </div>
                    
                </div>
                <script>	
					 $(document).ready(function() {
						var usuario = localStorage.usuario; 
						var id_producto = '<?php echo $rowPro['id_producto'];?>';
						$.ajax({
							crossDomain: true,
							type:'POST',
							url: 'http://localhost/buscame/app/components/php/getData.php?data=getLikeIt&id_producto='+id_producto+"&usuario="+usuario,
							async: true,
							error:function(errorR){alert(errorR);},
							success: function(response) {
								if(response){
									response = $.trim(response);
									if(response == 'yesLike'){
										<?php
										if($meGusta=="si"){
										?>
										$('#likeBtnMe').html('<a class="button compass disLike" id="disLikeMe<?php echo $rowPro['id_producto'];?>">No me gusta</a>');
										<?php
										}else if($meGusta=="gustos"){
										?>
										$('#likeBtnGus').html('<a class="button compass disLike" id="disLikeGus<?php echo $rowPro['id_producto'];?>">No me gusta</a>');
										<?php
										}else{
										?>
										$('#likeBtn').html('<a class="button compass disLike" id="disLike<?php echo $rowPro['id_producto'];?>" >No me gusta</a>');
										<?php
										}
										?>
									}else{
										<?php
										if($meGusta=="si"){
										?>	
											$('#btnProMe<?php echo $rowPro['id_producto'];?>').show();
										<?
										}else if($meGusta=="gustos"){
										?>
											$('#btnProGus<?php echo $rowPro['id_producto'];?>').show();
										<?
										}else{
										?>
											$('#btnPro<?php echo $rowPro['id_producto'];?>').show();
										<?
										}
										?>
									}
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
						<?php						
						if($meGusta=="si"){
						?>						
							Lungo.dom('#btnProMe<?php echo $rowPro['id_producto'];?>').tap(function() {						
								Lungo.Notification.show();
								$$.ajax({
									crossDomain: true,
									type:'POST',
									url: 'http://localhost/buscame/app/components/php/getData.php?data=like&id_producto='+id_producto+'&usuario='+usuario,
									dataType: 'html',
									async: true,
									success: function(data) {
										$('#likePro').html(data);			
										Lungo.Notification.hide();
									},
								});	
								document.getElementById('likeBtnMe').innerHTML='<a class="button compass disLike" id="disLikeMe<?php echo $rowPro['id_producto'];?>" >No me gusta</a>';			
							});
							Lungo.dom('#disLikeMe<?php echo $rowPro['id_producto'];?>').tap(function() {
								Lungo.Notification.show();
								$$.ajax({
									crossDomain: true,
									type:'POST',
									url: 'http://localhost/buscame/app/components/php/getData.php?data=disLike&id_producto='+id_producto+'&usuario='+usuario,
									dataType: 'html',
									async: true,
									success: function(data) {
										$('#likePro').html(data);			
										Lungo.Notification.hide();
									},
								});	
								$('#likeBtnMe').html('<a id="btnProMe<?php echo $rowPro['id_producto'];?>" class="button compass btnLike">Me gusta<div><img src="imagenes/meGusta.png"/></div></a>');
								$('#btnProMe<?php echo $rowPro['id_producto'];?>').show();
							});
						<?php 
						}else if($meGusta=="gustos"){
						?>						
							Lungo.dom('#btnProGus<?php echo $rowPro['id_producto'];?>').tap(function() {						
								Lungo.Notification.show();
								$$.ajax({
									crossDomain: true,
									type:'POST',
									url: 'http://localhost/buscame/app/components/php/getData.php?data=like&id_producto='+id_producto+'&usuario='+usuario,
									dataType: 'html',
									async: true,
									success: function(data) {
										$('#likePro').html(data);			
										Lungo.Notification.hide();
									},
								});	
								document.getElementById('likeBtnGus').innerHTML='<a class="button compass disLike" id="disLikeGus<?php echo $rowPro['id_producto'];?>" >No me gusta</a>';			
							});
							Lungo.dom('#disLikeGus<?php echo $rowPro['id_producto'];?>').tap(function() {
								Lungo.Notification.show();
								$$.ajax({
									crossDomain: true,
									type:'POST',
									url: 'http://localhost/buscame/app/components/php/getData.php?data=disLike&id_producto='+id_producto+'&usuario='+usuario,
									dataType: 'html',
									async: true,
									success: function(data) {
										$('#likePro').html(data);			
										Lungo.Notification.hide();
									},
								});	
								$('#likeBtnGus').html('<a id="btnProGus<?php echo $rowPro['id_producto'];?>" class="button compass btnLike">Me gusta<div><img src="imagenes/meGusta.png"/></div></a>');
								$('#btnProGus<?php echo $rowPro['id_producto'];?>').show();
							});				
						<?php
						}else{
						?>
						Lungo.dom('#btnPro<?php echo $rowPro['id_producto'];?>').tap(function() {					
							Lungo.Notification.show();
							$$.ajax({
								crossDomain: true,
								type:'POST',
								url: 'http://localhost/buscame/app/components/php/getData.php?data=like&id_producto='+id_producto+'&usuario='+usuario,
								dataType: 'html',
								async: true,
								success: function(data) {
									$('#likePro').html(data);			
									Lungo.Notification.hide();
								},
							});	
							document.getElementById('likeBtn').innerHTML='<a class="button compass disLike" id="disLike<?php echo $rowPro['id_producto'];?>" >No me gusta</a>';			
						});
						Lungo.dom('#disLike<?php echo $rowPro['id_producto'];?>').tap(function() {
							Lungo.Notification.show();
							$$.ajax({
								crossDomain: true,
								type:'POST',
								url: 'http://localhost/buscame/app/components/php/getData.php?data=disLike&id_producto='+id_producto+'&usuario='+usuario,
								dataType: 'html',
								async: true,
								success: function(data) {
									$('#likePro').html(data);			
									Lungo.Notification.hide();
								},
							});	
							$('#likeBtn').html('<a id="btnPro<?php echo $rowPro['id_producto'];?>" class="button compass btnLike">Me gusta<div><img src="imagenes/meGusta.png"/></div></a>');
							$('#btnPro<?php echo $rowPro['id_producto'];?>').show();
						});
						<?php
						}
						?>
					 });					
						<?php 
						if($meGusta=="si"){
						?>	
							setTimeout(function(){
								var el2 = $$("[data-controlM=carousel]")[0];						
								var example2 = Lungo.Element.Carousel(el2, function(index, element) {});						
								Lungo.Events.init({
									"tap #view_product_section_megustan > article [data-direction=left]":  example2.prev,
									"tap #view_product_section_megustan > article [data-direction=right]": example2.next,
								});
							},150);	
							
                        <?php
						}else if($meGusta=="gustos"){
						?>	
							setTimeout(function(){
								var ele = $("[data-control=carousel]")[0];						
								var examplee = Lungo.Element.Carousel(ele, function(index, element) {});						
								Lungo.Events.init({
									"tap #container_global_view_product [data-direction=left]":  examplee.prev,
									"tap #container_global_view_product [data-direction=right]": examplee.next,
								});					
							},150);
							
                        	
                        <?php
						}else{
						?>
							setTimeout(function(){
								var el = $$("[data-controlC=carousel]")[0];						
								var example = Lungo.Element.Carousel(el, function(index, element) {});						
								Lungo.Events.init({
									"tap #view_product_section > article [data-direction=left]":  example.prev,
									"tap #view_product_section > article [data-direction=right]": example.next,
								});
							},150);	
                        <?php
						}
						?>
                   					      
                </script>
                <?php
			}
		
	}
	
	if($data =="listarAlmacen"){
		$almacen = $getDatos->getAlmacenSoloId($id);		
		if($almacen){				
			if($rowAl = mysqli_fetch_array($almacen)){
			?>
				<div id="container_article_almacen">
                    <div id="container_image_almacen">
                    	 <img src="<?php echo $rowAl['img'];?>" />
                    </div>
                    <div id="box_article_almacen">
                        <div id="title_almacen">
                        	<p style="line-height: 25px;"><?php echo  utf8_encode($rowAl['almacen']);?></p>
                        </div>
                    	<div id="descript_almacen">
                            <p>Descripción</p>
                            <p><?php echo  utf8_encode($rowAl['descripcion']);?></p>
                        </div>
                        <div id="dir_almacen">
                            <p>Dirección: <?php echo  utf8_encode($rowAl['direccion']);?> - <?php echo utf8_encode($getDatos->getCCName($rowAl['id_centroComercial']));?> </p>
                            <p>Local: <?php echo  utf8_encode($rowAl['local']);?></p>
                        </div>                                                    
                        <div id="box_like">
                        	<?php 
							if($meGusta=="si"){
							?>
								<a href="#section_cc_me_gustan" data-router="section" id="mostrarMapaM" class="button compass colorAzul">Centro comercial</a> 
							<?php
							}else if($meGusta=="gustos"){
							?>
								<a href="#sectionCCGustos" data-router="section" id="mostrarMapaGus" class="button compass colorAzul">Centro comercial</a> 
							<?php
							}else{
							?>
								<a href="#section_cc" data-router="section" id="mostrarMapa" class="button compass colorAzul">Centro comercial</a> 
							<?php
							}
							?>		
                        	                        
                        </div> 
                    </div>
                    <div id="content_box">
                    	<?php 
						if($meGusta=="si"){
						?>
                    		<div id="btnLikeAlMe">
                            	<div id="box_suscribirme">
                         			<a onclick='suscribirse("<?php echo $rowAl['id_almacen'];?>","btnLikeAlMe","btnAl<?php echo $rowAl['id_almacen'];?>");' id="btnAl<?php echo $rowAl['id_almacen'];?>" class="button anchor accept">Suscribirme<span class="icon ok"></span></a>
                         		</div>
                        <?php
						}else if($meGusta=="gustos"){
						?>
                        	<div id="btnLikeAlGus">
                                <div id="box_suscribirme">
                                    <a onclick='suscribirse("<?php echo $rowAl['id_almacen'];?>","btnLikeAlGus","btnAl<?php echo $rowAl['id_almacen'];?>");' id="btnAl<?php echo $rowAl['id_almacen'];?>" class="button anchor accept">Suscribirme<span class="icon ok"></span></a>
                                </div>
                        <?php
						}else{
						?>
                        	<div id="btnLikeAl" >
                            	<div id="box_suscribirme">
                         			<a onclick='suscribirse("<?php echo $rowAl['id_almacen'];?>","btnLikeAl","btnAl<?php echo $rowAl['id_almacen'];?>");' id="btnAl<?php echo $rowAl['id_almacen'];?>" class="button anchor accept">Suscribirme<span class="icon ok"></span></a>
                         		</div>
                        <?php
						}
						?>
                         </div>                    
                    </div>
                </div>               
                <script>
					$(document).ready(function(e) {
						$('#btnAl<?php echo $rowAl['id_almacen'];?>').show();							
						var usuario = localStorage.usuario; 
						var id_almacen = <?php echo $rowAl['id_almacen'];?>;
						$$.ajax({
							crossDomain: true,
							type:'POST',
							url: 'http://localhost/buscame/app/components/php/getData.php?data=getLikeIt&id_almacen='+id_almacen+'&usuario='+usuario,
							dataType: 'html',
							async: true,
							success: function(response) {									
								Lungo.Notification.hide();
								if(response){
									response = $.trim(response);
									if(response == 'yesLike'){
										<?php
										if($meGusta=="si"){
										?>
											$('#btnLikeAlMe').html('<div id="box_suscribirme"><a class="button anchor cancel sus" onclick=\'cancelarSuscripcion("<?php echo $rowAl['id_almacen'];?>","btnLikeAlMe","btnAl<?php echo $rowAl['id_almacen'];?>");\'>Cancelar suscripción<span class="icon remove"></span></a></div>');
										<?php
										}else if($meGusta=="gustos"){
										?>
											$('#btnLikeAlGus').html('<div id="box_suscribirme"><a  onclick=\'cancelarSuscripcion("<?php echo $rowAl['id_almacen'];?>","btnLikeAlGus","btnAl<?php echo $rowAl['id_almacen'];?>");\' class="button anchor cancel sus">Cancelar suscripción<span class="icon remove"></span></a></div>');
										<?php
										}else{
										?>
											$('#btnLikeAl').html('<div id="box_suscribirme"><a  onclick=\'cancelarSuscripcion("<?php echo $rowAl['id_almacen'];?>","btnLikeAl","btnAl<?php echo $rowAl['id_almacen'];?>");\' class="button anchor cancel sus">Cancelar suscripción<span class="icon remove"></span></a></div>');
										<?php
										}
										?>
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
						
                    });
                	
					<?php 
					if($meGusta=="si"){
					?>
						$('#mostrarMapaM').click(function(){ 
					<?php
					}else if($meGusta=="gustos"){
					?>
						$('#mostrarMapaGus').click(function(){
					<?php
					}else{
					?>
						$('#mostrarMapa').click(function(){
					<?php
					}
					?>	
						Lungo.Notification.show();
						var id_cc = <?php echo $getDatos->getCCSolo($rowAl['id_almacen']); ?>;
						$$.ajax({
							crossDomain: true,
							type:'POST',
							<?php 
							if($meGusta=="si"){
							?>
								url: 'http://localhost/buscame/app/components/php/getData.php?data=dataCentroComercial&id_centrocomercial='+id_cc+"&meGusta=si",
							<?php
							}else if($meGusta=="gustos"){
							?>
								url: 'http://localhost/buscame/app/components/php/getData.php?data=dataCentroComercial&id_centrocomercial='+id_cc+"&meGusta=gustos",
							<?php
							}else{
							?>
								url: 'http://localhost/buscame/app/components/php/getData.php?data=dataCentroComercial&id_centrocomercial='+id_cc,
							<?php
							}
							?>	
							dataType: 'html',
							async: true,
							success: function(data) {
								<?php 
								if($meGusta=="si"){
								?>
									$('#container_info_ccM').html(data);
								<?php
								}else if($meGusta=="gustos"){
								?>
									$('#containerCCGustos').html(data);
								<?php
								}else{
								?>
									$('#container_info_cc').html(data);
								<?php
								}
								?>			
								Lungo.Notification.hide();
							},
						});
						
					 });					
                </script>
			<?php
			}
		}		
	}
	if($data=="dataCentroComercial"){
		$cc = $getDatos->getCC($id_centrocomercial);
		
		if($cc){				
			while($rowCC = mysqli_fetch_array($cc)){
			?>
            
            	<div id="content_img_cc">
           			<img src="<?php echo $rowCC['img'];?>" id="imgCC">
             	</div>
                <div  id="content_descript">
                    <div id="content_title_cc">
                        <p><?php echo utf8_encode($rowCC['centrocomercial']);?></p>
                    </div>
                    <div id="info_more_cc">
                        <ul>
                            <li>
                                Teléfono: <?php echo $rowCC['telefono'];?>
                            </li>
                
                            <li>
                                Dirección: <?php echo utf8_encode($rowCC['direccion']);?>
                            </li>
                
                            <li>
                                Horarios de atención: <?php echo utf8_encode($rowCC['horario']);?>
                            </li>
                
                            <li>
                                Pagina web: <a href="<?php echo $rowCC['web'];?>"><?php echo $rowCC['web'];?></a>
                            </li>
                        </ul>
                    </div>
                    <div>
                    	<?php 
						if($meGusta=="si"){
						?>
							<a href="#section_llegar_me_gustan" class="button anchor comoLlegar" data-router="section" onclick="mapLoad()">¿Cómo llegar?</a>
						<?php
						}else if($meGusta=="gustos"){
						?>
							<a href="#sectionLlegarGustos" class="button anchor comoLlegar" data-router="section" onclick="mapLoad()">¿Cómo llegar?</a>
						<?php
						}else{
						?>
							<a href="#section_cc_llegar" class="button anchor comoLlegar" data-router="section" onclick="mapLoad()">¿Cómo llegar?</a>
						<?php
						}
						?>	
                    	
                    </div>
              	</div>
            	<script>
					function mapLoad(){
						var map = null;
						var directionsDisplay = null;
						var directionsService = null;
						function cargarMapa(){
						
							var ubicacion = new google.maps.LatLng(latitud, longitud);
							var ubicacion_cc = new google.maps.LatLng(<?php echo $rowCC['latitud'];?>,<?php echo $rowCC['longitud'];?>);
							var mapOptions = {
								zoom: 33,
								center: ubicacion, //ubicacion del map
								mapTypeControl: false,
								streetViewControl: false,
								zoomControl: true,
							    zoomControlOptions: {
							    	position: google.maps.ControlPosition.RIGHT_TOP
							    },
								mapTypeId: google.maps.MapTypeId.ROADMAP
							};	
								<?php 
								if($meGusta=="si"){
								?>
									map = new google.maps.Map(document.getElementById('map-canvasM'), mapOptions);
								<?php
								}else if($meGusta=="gustos"){
								?>
									map = new google.maps.Map(document.getElementById('map-canvasGus'), mapOptions);
								<?php
								}else{
								?>
									map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
								<?php
								}
								?>		
								
								directionsDisplay = new google.maps.DirectionsRenderer();
								directionsService = new google.maps.DirectionsService();
								directionsDisplay.setMap(map);
								directionsDisplay.setOptions( { suppressMarkers: true } );
								
								var startMarker = new google.maps.Marker({ position: ubicacion, map: map, icon: 'imagenes/me_marker.png' });
								var stopMarker = new google.maps.Marker({ position: ubicacion_cc, map: map, icon: 'imagenes/cc_marker.png' });
	
								var request = {
									origin: ubicacion,
									destination: ubicacion_cc,
									travelMode: google.maps.DirectionsTravelMode.DRIVING};    
						
								directionsService.route(request, function(response, status) {
									if (status == google.maps.DirectionsStatus.OK) {									
										//directionsDisplay.setPanel($("#directions_panel").get(0));
										directionsDisplay.setDirections(response);
									} else {
						
									}
								});
						}
						
						function localizame() {
							if (navigator.geolocation) { 
								  navigator.geolocation.getCurrentPosition(coordenadas);
							}else{
								alert('Oops!');
							}
						}
						
						function coordenadas(position) {
							latitud = position.coords.latitude; 
							longitud = position.coords.longitude; 
							cargarMapa();
						} 	
						$.getScript('http://maps.googleapis.com/maps/api/js?key=AIzaSyATd8pMCZ1jNe9ZLEOvxFGA5R1gx4VR2Sw&sensor=true&language=es&callback=cargarMapa');
						localizame(); 		
					}
				</script>
            <?php
			}
		}
	}
	
	if($data=="like"){
		
		$like = $getDatos->insertLike($usuario,$id_producto,$id_almacen);
		$like = $getDatos->getLikes($id_producto,$id_almacen);
		if($like){
			$rowL = mysqli_fetch_array($like);
			echo "A ".$rowL['likes']." personas les gusta ";
		}
		
	}	
	if($data=="disLike"){
		
		$like = $getDatos->removeLike($usuario,$id_producto,$id_almacen);
		$like = $getDatos->getLikes($id_producto,$id_almacen);
		if($like){
			$rowL = mysqli_fetch_array($like);
			echo "A ".$rowL['likes']." personas les gusta ";
		}
		
	}
	
	if($data =="getLikeIt"){
		$getDatos->getLikeIt($id_producto,$id_almacen,$usuario);
	}
	if($data=="dataShared"){
		$producto = $getDatos->getListaProductos($id_producto);
		$pro = mysqli_fetch_array($producto);
		$nombre = caracteres_html($pro["nombre"]);
		$descrip = caracteres_html($pro["descripcion"]);
		$img = $pro['img1'];
		?>
        
		 <li id="#" style="height:40px;">
           <a href="mailto:?subject=App%20CalendarioF1&body=App%20%3Cb%3ECalendarioF1%3C%2Fb%3E%3Cbr%2F%3E%0A%0A%0A%3Ca%20href%3D%22https%3A%2F%2Fitunes.apple.com%2Fes%2Fapp%2Fcalendario-f1%2Fid616572552%3Fmt%3D8%22%3EApp%20Store%3C%2Fa%3E%3Cbr%2F%3E%0A%3Ca%20href%3D%22https%3A%2F%2Fplay.google.com%2Fstore%2Fapps%2Fdetails%3Fid%3Dcom.koldomac.Calendario_F1%22%3EGoogle%20Play%3C%2Fa%3E%3Cbr%2F%3E" class="size_icon_aside_share" data-icon="envelope"><span class="icon envelope"></span></a>
        </li>

        <li style="height:40px;">
            <a href="http://twitter.com" data-url="http://twitter.com/" data-text="Titulo que quiera" data-count="none" data-lang="es" class="size_icon_aside_share" data-icon="brand twitter" target="_blank"><span class="icon brand twitter"></span></a>
        </li>

        <li style="height:40px;">
            <a target="_blank" href="http://www.facebook.com/sharer.php?s=100&p[url]=http://buscameapp.com/&p[title]=<?php echo $nombre;?>&p[summary]=<?php echo $descrip;?>&p[images][0]=<?php echo $img;?>" class="size_icon_aside_share" data-icon="brand facebook-2" ><span class="icon brand facebook-2"></span></a>
        </li>     
		
		<?php
		
	}
    function caracteres_html($texto){
	   $texto = htmlentities($texto, ENT_NOQUOTES, 'UTF-8'); // Convertir caracteres especiales a entidades
	   $texto = htmlspecialchars_decode($texto, ENT_NOQUOTES); // Dejar <, & y > como estaban
	   return $texto;
	} 
	if($data=="meGustan"){
		$ids = $getDatos->meGustan($usuario,$limite);
		if($ids){
			$impresion ="<script>";
			while($row=mysqli_fetch_array($ids)){
				$rowPro = mysqli_fetch_array($getDatos->getProducto($row['id_producto']));
				if($rowPro){
				?>
					<li class="thumb open_list arrow events_touch_list listaM"  onclick="mostrarProductoMeGustan('<?php echo $rowPro['id_producto']?>')">
            			<img src="<?php echo $rowPro['img1'];?>" id="img_list"  />
                        <strong class="open_list" ><?php echo utf8_encode($rowPro['nombre']);?></strong>                        
						<?php if($rowPro['promocion']=="Si"){?>
                            <div class="right tag cancel">
                                En promoción
                            </div> 
                        <?php }?>                   
                    </li>
                   <?php 
					$cont = $cont+1;
				}
			}
			$impresion .= "$('#pullUpMe').show();";
			if($cont==0&&$limite==5){
				echo '<img src="imagenes/noResultLike.png" class="noResult">';
				$impresion .= "$('#pullUpMe').hide();";
			}
			if($cont==0){
				$impresion .="	setTimeout(function(){
									Lungo.Notification.show(
										'No hay más resultados para tu búsqueda.',
										'search',  
										4     
									);	
								},150);";
			}
			$impresion .="</script>";				
			echo $impresion;
		}
	}
	if($data == "dataListGus"){
		$productos = $getDatos->getProductos($id_categogia,$id_tipo,$id_rango,$id_color,$id_marca,$id_material,$id_centrocomercial,$id_almacen,$list,$id_talla,$limite);
		if($productos){		
			$impresion = "<script>";
			$cont = 0;
			while($rowPro = mysqli_fetch_array($productos)){
			?>
					<li class="thumb open_list arrow events_touch_list lista" onclick="mostrarProductoGustos('<?php echo $rowPro['id_producto']?>')">
            			<img src="<?php echo $rowPro['img1'];?>" id="img_list"  />
                        <strong class="open_list" ><?php echo utf8_encode($rowPro['nombre']);?></strong>
                        <?php if($rowPro['promocion']=="Si"){?>
                            <div class="right tag cancel">
                                En promoción
                            </div> 
                        <?php }?>                   
                    </li>
                   <?php
					$cont = $cont+1;
			}
			$impresion .= "$('#pullUpGus').show();";
			if($cont==0&&$limite==5){
				echo '<img src="imagenes/noResultGus.png" class="noResult">';
				$impresion .= "$('#pullUpGus').hide();";
			}
			if($cont==0){
				$impresion .="	setTimeout(function(){
									Lungo.Notification.show(
										'No hay más resultados para tu búsqueda.',
										'search',  
										4     
									);	
								},150);";
			}
			$impresion .="</script>";		
			echo $impresion;
			
		}
	}
	
?>