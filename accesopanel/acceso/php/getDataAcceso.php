<?php 
	session_start();
	include_once('funcionesAcceso.php');
 	$usuario = isset($_REQUEST['usuario']) ? $_REQUEST['usuario']:"";
 	$contrasena = isset($_REQUEST['contrasena']) ? $_REQUEST['contrasena']:"";
	$data = isset($_REQUEST['data']) ? $_REQUEST['data']:"";
	$id_categoria = isset($_REQUEST['id_categoria']) ? $_REQUEST['id_categoria']:"";
	$id_producto = isset($_REQUEST['id_producto']) ? $_REQUEST['id_producto']:"";
	$tipoTalla = isset($_REQUEST['tipoTalla']) ? $_REQUEST['tipoTalla']:"";
	$passAnt = isset($_REQUEST['passAnt']) ? $_REQUEST['passAnt']:"";
	$passNew = isset($_REQUEST['passNew']) ? $_REQUEST['passNew']:"";
	$passNewRe = isset($_REQUEST['passNewRe']) ? $_REQUEST['passNewRe']:"";
	$getDataAcceso=new accesoBuscame;
	 	
	if($data=="login"){
		$consulta = $getDataAcceso->consultar($usuario,$contrasena);
		if($consulta){
			$row = mysqli_fetch_array($consulta);			if($row['usuario']){
				echo "existe usuario";
			}else{
				echo "no existe usuario";
			}
		}
	}else if($data=="selectCat"){
		$consulta = $getDataAcceso->selectCat();
		if($consulta){
			?>
			<option value="none">Seleccionar</option>
			<?php
			while($row = mysqli_fetch_array($consulta)){
				?>
				<option value="<?php echo $row['id_categoria'];?>"><?php echo utf8_encode($row['categoria']);?></option>
                <?php
			}			
		}
	}else if($data=="changeCat"){
		$consulta = $getDataAcceso->changeCat($id_categoria);
		if($consulta){
			?>
			<label class="control-label" >Seleccionar un tipo</label>
            <select id="tipoAdd" name="tipoAdd">
			<?php
			while($row = mysqli_fetch_array($consulta)){
				?>
				<option value="<?php echo $row['id_tipo'];?>"><?php echo utf8_encode($row['tipo']);?></option>
                <?php
			}
			?>
            </select>
            <?php			
		}
	}else if($data=="changeCatEdit"){
		$consulta = $getDataAcceso->changeCat($id_categoria);
		if($consulta){
			while($row = mysqli_fetch_array($consulta)){
				?>
				<option value="<?php echo $row['id_tipo'];?>"><?php echo utf8_encode($row['tipo']);?></option>
                <?php
			}			
		}
	}else if($data=="selectRan"){
		$consulta = $getDataAcceso->selectRan();
		if($consulta){
			while($row = mysqli_fetch_array($consulta)){
				?>
				<option value="<?php echo $row['id_rango'];?>"><?php echo utf8_encode($row['rango']);?></option>
                <?php
			}			
		}
	}else if($data=="selectColor"){
		$consulta = $getDataAcceso->selectColor();
		if($consulta){
			while($row = mysqli_fetch_array($consulta)){
				?>
				<option value="<?php echo $row['id_color'];?>"><?php echo utf8_encode($row['color']);?></option>
                <?php
			}			
		}
	}else if($data=="selectMarca"){
		$consulta = $getDataAcceso->selectMarca();
		if($consulta){
			while($row = mysqli_fetch_array($consulta)){
				?>
				<option value="<?php echo $row['id_marca'];?>"><?php echo utf8_encode($row['marca']);?></option>
                <?php
			}			
		}
	}else if($data=="selectMaterial"){
		$consulta = $getDataAcceso->selectMaterial();
		if($consulta){
			while($row = mysqli_fetch_array($consulta)){
				?>
				<option value="<?php echo $row['id_material'];?>"><?php echo utf8_encode($row['material']);?></option>
                <?php
			}			
		}
	}else if($data=="selectTipoTalla"){
		$consulta = $getDataAcceso->selectTipoTalla();
		if($consulta){
			?>
            <option value="none">Seleccionar</option>
            <?
			while($row = mysqli_fetch_array($consulta)){
				?>
				<option value="<?php echo $row['tipoTalla'];?>"><?php echo ucwords(strtolower(utf8_encode($row['tipoTalla'])));?></option>
                <?php
			}			
		}
	}else if($data=="changeTipoTalla"){
		$consulta = $getDataAcceso->changeTipoTalla($tipoTalla);
		if($consulta){
			?>
            <label class="control-label" >Talla</label>
            <select id="tallaAdd" name="tallaAdd">
            <?php
			while($row = mysqli_fetch_array($consulta)){
				?>
				<option value="<?php echo $row['id_talla'];?>"><?php echo utf8_encode($row['talla']);?></option>
                <?php
			}
			?>
            </select>
            <?		
		}
	}else if($data=="editProduct"){
		$consulta = $getDataAcceso->getProducto($id_producto);
		if($consulta){
			$row = mysqli_fetch_array($consulta);
			$_SESSION['id_producto']=$row['id_producto'];
			?>
            <label class="control-label">Nombre del producto</label>
            <input type="text" placeholder="Nombre" value="<? echo utf8_encode($row['nombre']);?>" required="required" name="nameEdit"/>

            <label class="control-label" >Descripcion</label>
            <textarea rows="3" name="descripcionEdit" id="descripcionEdit" required="required"><? echo utf8_encode($row['descripcion']);?></textarea>
			
            <label class="control-label" >Categor&iacute;a</label>
            <select id="categoriaEdit" onchange="changeTipoEdit();" name="categoriaEdit">
				<?
				$cat = $getDataAcceso->selectCat();
				while($categoria = mysqli_fetch_array($cat)){
					?>
                    <option value="<? echo $categoria['id_categoria'];?>" <? if($categoria['id_categoria']==$row['id_categoria']){echo "selected";}?>><? echo utf8_encode($categoria['categoria']);?></option>                    
                    <?
				}
				?>
            </select>
            
            <label class="control-label" >Seleccionar un tipo</label>
            <select id="tipoEdit" name="tipoEdit">
				<?
				$tip = $getDataAcceso->changeCat($row['id_categoria']);
				while($tipo = mysqli_fetch_array($tip)){
					?>
                    <option value="<? echo $tipo['id_tipo'];?>" <? if($tipo['id_tipo']==$row['id_tipo']){echo "selected";}?>><? echo utf8_encode($tipo['tipo']);?></option>                    
                    <?
				}
				?>
            </select>
			
              
            <label class="control-label" >&iquest;Est&aacute; en promoci&oacute;n?</label>
            <label class="radio">
                <input type="radio" name="promEdit" id="promEditSi" value="Si"  <? if($row['promocion']=="Si"){echo "checked";}?> onClick="promEditYes();"/>
                Si
            </label>

            <label class="radio">
              <input type="radio" name="promEdit" id="promEditNo" value="No" <? if($row['promocion']!="Si"){echo "checked";}?> onClick="promEditNo();"/>
                No
            </label>
			
            <label class="control-label">Rango del precio</label>
            <select id="rangoEdit" name="rangoEdit">
            	<?
				$rango = $getDataAcceso->selectRan();
				
				while($ran = mysqli_fetch_array($rango)){
					
					?>
                    <option value="<? echo $ran['id_rango'];?>" <? if($row['id_rango']==$ran['id_rango']){echo "selected";}?>><? echo $ran['rango'];?></option>                    
                    <?
					
				}
				?>            	
            </select>
            <br>
            <div class="input-prepend input-append">
                <label class="control-label">Precio</label>
                <span class="add-on">$</span>   
                <input class="span2" type="number" value="<? echo $row['precio'];?>" required="required" name="precioEdit">                         
            </div>
            <div id="preAntEdit">
            <?
            if($row['promocion']=="Si"){
				?>
                <div class="input-prepend input-append">
                    <label class="control-label">Precio Anterior</label>
                    <span class="add-on">$</span>   
                    <input class="span2" type="number" value="<? echo $row['precioAnterior'];?>" name="precioAntEdit" id="precioAntEdit" required="required">                         
            	</div>
                <?
			}
			?>
            </div>
            
            <label class="control-label" >Color</label>
            <select name="colorEdit" id="colorEdit">                           
                <?
				$col = $getDataAcceso->selectColor();
				while($color = mysqli_fetch_array($col)){
					?>
                    <option value="<? echo $color['id_color'];?>" <? if($color['id_color']==$row['id_color']){echo "selected";}?>><? echo utf8_encode($color['color']);?></option>                    
                    <?
				}
				?>                            
            </select>
           	
            <label class="control-label" >Marca</label>
            <select name="marcaEdit" id="marcaEdit">                           
                <?
				$mar = $getDataAcceso->selectMarca();
				while($marca = mysqli_fetch_array($mar)){
					?>
                    <option value="<? echo $marca['id_marca'];?>" <? if($marca['id_marca']==$row['id_marca']){echo "selected";}?>><? echo utf8_encode($marca['marca']);?></option>                    
                    <?
				}
				?>                             
            </select>
            
            <label class="control-label" >Material</label>
            <select name="materialEdit" id="materialEdit">                           
                <?
				$mat = $getDataAcceso->selectMaterial();
				while($material = mysqli_fetch_array($mat)){
					?>
                    <option value="<? echo $material['id_material'];?>" <? if($material['id_material']==$row['id_material']){echo "selected";}?>><? echo utf8_encode($material['material']);?></option>                    
                    <?
				}
				?>                             
            </select>
           	 
            <label class="control-label" >Tipo talla</label>
            <select name="tipoTallaEdit" id="tipoTallaEdit">                           
                <?
				$tipoT = $getDataAcceso->selectTipoTalla();
				while($tipoTalla = mysqli_fetch_array($tipoT)){
					?>
                    <option value="<? echo $tipoTalla['tipoTalla'];?>" <? if($tipoTalla['tipoTalla']==$row['tipoTalla']){echo "selected";}?>><? echo ucwords(strtolower(utf8_encode($tipoTalla['tipoTalla'])));?></option>                    
                    <?
				}
				?>                           
            </select>
            
            <label class="control-label" >Talla</label>
            <select id="tallaEdit" name="tallaEdit">
            	<?
				$tal = $getDataAcceso->changeTipoTalla($row['tipoTalla']);
				while($talla = mysqli_fetch_array($tal)){
					?>
                    <option value="<? echo $talla['id_talla'];?>" <? if($talla['id_talla']==$row['id_talla']){echo "selected";}?>><? echo utf8_encode($talla['talla']);?></option>                    
                    <?
				}
				?>
            </select>
            <?		
		}
	}else if($data=="removeProduct"){
		$consulta = $getDataAcceso->removeProducto($id_producto);
	}else if($data=="changePass"){
		$contrasena = $getDataAcceso->getPass($_SESSION['idAlmacen']);
		if($contrasena==$passAnt){
			$getDataAcceso->changePass($_SESSION['idAlmacen'],$passNew);
			echo "Correcta";			
		}else{
			echo "Incorrecta";
		}
	}
	
?>