$(document).ready(function(e) {		
		
  		$('#fileImg1').change(function(e) {      		      
			value=$('#fileImg1').val();
			
			if( !value.match(/.(jpg)|(png)$/) ){//here your extensions
				alert("Seleccione una imagen de extensión jpg o png.");   //actions like focus, not validate...
			}
			else {//right extension
				addImage1(e); //actions
			}
     	});
		$('#fileImg3').change(function(e) {
      		addImage3(e); 
     	});
     	function addImage1(e){
      		var file = e.target.files[0],
      		imageType = /image.*/;
    
      		if (!file.type.match(imageType))
       			return;
  
      		var reader = new FileReader();
			  reader.onload = fileOnload1;
			  reader.readAsDataURL(file);
     	}
  
 		function addImage3(e){
      		var file = e.target.files[0],
      		imageType = /image.*/;
    
      		if (!file.type.match(imageType))
       			return;
  
      		var reader = new FileReader();
			  reader.onload = fileOnload3;
			  reader.readAsDataURL(file);
     	}
  
     	function fileOnload1(e) {
      		var result=e.target.result;
			$('#contentFileImg1').html('<div class="alert alert-info" style="margin-top:15px;"><button type="button" class="close" data-dismiss="alert">×</button>Selecciona el &aacute;rea de la imagen a mostrar en la aplicaci&oacute;n.</div><img id="imgSalida1" width="500" src="" /><div id="imgCont"><input type="hidden" id="x1" name="x1" />  <input type="hidden" id="y1" name="y1" /><input type="hidden" id="w1" name="w1" /><input type="hidden" id="h1" name="h1" /></div>');
      		$('#imgSalida1').attr("src",result);			
			$(function(){			
				$('#imgSalida1').Jcrop({
				  aspectRatio: 1,
				  onSelect: updateCoordsImg1,
				  setSelect:   [ 200, 200, 50, 50 ],
				});
			
			  });
			
			  function updateCoordsImg1(c)
			  {
				$('#x1').val(c.x);
				$('#y1').val(c.y);
				$('#w1').val(c.w);
				$('#h1').val(c.h);
			  };
     	}
		function fileOnload3(e) {
      		var result=e.target.result;
      		$('#imgSalida3').attr("src",result);$(function(){			
			$('#imgSalida3').Jcrop({
				  aspectRatio: 1,
				  onSelect: updateCoords,
				  setSelect:   [ 200, 200, 50, 50 ],
				});
			
			  });
			
			  function updateCoords(c)
			  {
				$('#x3').val(c.x);
				$('#y3').val(c.y);
				$('#w3').val(c.w);
				$('#h3').val(c.h);
			  };
			
			  function checkCoords()
			  {
				if (parseInt($('#w').val())) return true;
				alert('Please select a crop region then press submit.');
				return false;
			  };
     	}
    
});


function validar(form){		
			
	var categoria = document.getElementById('categoriaAdd').value;			
	var siProm = document.getElementById('promSiAdd').value;			
	var noProm = document.getElementById('promNoAdd').value;						
	var tipoTalla = document.getElementById('tipoTallaAdd').value;			
	var checkImg2 = document.getElementById('checkImg2');							
	var checkImg3 = document.getElementById('checkImg3');							
	var fileImg1 = document.getElementById('fileImg1').value;		
	var valid = false;
	
	
	
	if(categoria=="none"){
		$('#errorAgregar').html('<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">×</button><strong>Oh!</strong> Parece que te falta seleccionar una categor&iacute;a.</div>');
		return false;
	}
	if(tipoTalla =="none"){
		$('#errorAgregar').html('<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">×</button><strong>Oh!</strong> Parece que te falta seleccionar un tipo de talla.</div>');
		return false;
	}
	if(fileImg1==""||fileImg1==null){
		$('#errorAgregar').html('<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">×</button><strong>Oh!</strong> Parece que te falta seleccionar un la imagen principal.</div>');
		return false;
	}
	
	if(checkImg2.checked){
		var fileImg2 = document.getElementById('fileImg2').value;	
		if(fileImg2==""||fileImg2==null){
			$('#errorAgregar').html('<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">×</button><strong>Oh!</strong> Parece que te falta seleccionar la imagen 2.</div>');
			return false;
		}
		fileImg2=$('#fileImg2').val();
			
		if( !fileImg2.match(/.(jpg)|(png)$/) ){//here your extensions
			alert("Seleccione una imagen de extensión jpg o png.");   //actions like focus, not validate...
			return false;
		}
	}
	if(checkImg3.checked){
		var fileImg3 = document.getElementById('fileImg3').value;	
		if(fileImg3==""||fileImg3==null){
			$('#errorAgregar').html('<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">×</button><strong>Oh!</strong> Parece que te falta seleccionar la imagen 3.</div>');
			return false;
		}
		fileImg3=$('#fileImg3').val();
			
		if( !fileImg3.match(/.(jpg)|(png)$/) ){//here your extensions
			alert("Seleccione una imagen de extensión jpg o png.");   //actions like focus, not validate...
			return false;
		}
		
	}
	fileImg1=$('#fileImg1').val();
			
	if( !fileImg1.match(/.(jpg)|(png)$/) ){//here your extensions
		alert("Seleccione una imagen de extensión jpg o png.");   //actions like focus, not validate...
		return false;
	}
	
	$('#loadModal').modal({
	  backdrop: 'static',
	  keyboard: false
	});
	$('#loadModal').modal('show');
									
}
    



$(document).ready(function(e) {
	$.ajax({
		crossDomain: true,
		type:'POST',
		url: "http://localhost/buscame/accesopanel/acceso/php/getDataAcceso.php?data=selectCat",
		dataType: 'html',
		success: function(data) {
			if(data){
				$('#categoriaAdd').html(data);
			}
		},
	});
	
	$.ajax({
		crossDomain: true,
		type:'POST',
		url: "http://localhost/buscame/accesopanel/acceso/php/getDataAcceso.php?data=selectRan",
		dataType: 'html',
		success: function(data) {
			if(data){
				$('#rangoAdd').html(data);
			}
		},
	});
	
	$.ajax({
		crossDomain: true,
		type:'POST',
		url: "http://localhost/buscame/accesopanel/acceso/php/getDataAcceso.php?data=selectColor",
		dataType: 'html',
		success: function(data) {
			if(data){
				$('#colorAdd').html(data);
			}
		},
	});
	
	$.ajax({
		crossDomain: true,
		type:'POST',
		url: "http://localhost/buscame/accesopanel/acceso/php/getDataAcceso.php?data=selectMarca",
		dataType: 'html',
		success: function(data) {
			if(data){
				$('#marcaAdd').html(data);
			}
		},
	});
	
	$.ajax({
		crossDomain: true,
		type:'POST',
		url: "http://localhost/buscame/accesopanel/acceso/php/getDataAcceso.php?data=selectMaterial",
		dataType: 'html',
		success: function(data) {
			if(data){
				$('#materialAdd').html(data);
			}
		},
	});
	$.ajax({
		crossDomain: true,
		type:'POST',
		url: "http://localhost/buscame/accesopanel/acceso/php/getDataAcceso.php?data=selectTipoTalla",
		dataType: 'html',
		success: function(data) {
			if(data){
				$('#tipoTallaAdd').html(data);
			}
		},
	});
	
	$(".custom-input-file input:file").change(function(){
        $(this).parent().find(".archivo").html($(this).val());
    }).css('border-width',function(){
        if(navigator.appName == "Microsoft Internet Explorer")
            return 0;
    });

});

function catSelect(){
	var categoria = $("#categoriaAdd option:selected").val();
	$.ajax({
		crossDomain: true,
		type:'POST',
		url: "http://localhost/buscame/accesopanel/acceso/php/getDataAcceso.php?data=changeCat&id_categoria="+categoria,
		dataType: 'html',
		success: function(data) {
			if(data){
				$('#contTipo').html(data);
			}
		},
	});
}

function changeTipoTalla(){
	var tipoTalla = $("#tipoTallaAdd option:selected").val();
	$.ajax({
		crossDomain: true,
		type:'POST',
		url: "http://localhost/buscame/accesopanel/acceso/php/getDataAcceso.php?data=changeTipoTalla&tipoTalla="+tipoTalla,
		dataType: 'html',
		success: function(data) {
			if(data){
				  $('#contTalla').html(data);
			}
		},
	});
}

function promYes(){
	$('#preAnt').html('<div class="input-prepend input-append" id="div_price"><label class="control-label" id="preAct">Precio anterior</label><span class="add-on">$</span><input class="span2" id="preAntAdd" type="number" name="preAntAdd" required></div>');
	$('#preAct').html('Precio actual');
}
function promNo(){
	$('#preAnt').html('');
	$('#preAct').html('Precio');
}


function checkFile2(){
	var checkbox = document.getElementById("checkImg2");
  	if(checkbox.checked){
    $('#contentInputFileImg2').html('<div class="custom-input-file"><input name="fileImg2" id="fileImg2" type="file" class="input-file" />Seleccionar imagen 2<div class="archivo">...</div></div><div id="contentFileImg2"><img id="imgSalida2" width="500" src="" /><input type="hidden" id="x2" name="x2" /> <input type="hidden" id="y2" name="y2" /><input type="hidden" id="w2" name="w2" /><input type="hidden" id="h2" name="h2" /></div>');
  	}else{
	 	$('#contentInputFileImg2').html(' ');
  	}
  	$(".custom-input-file input:file").change(function(){
        $(this).parent().find(".archivo").html($(this).val());
    }).css('border-width',function(){
        if(navigator.appName == "Microsoft Internet Explorer")
            return 0;
    });
	
	$('#fileImg2').change(function(e) {
			value=$('#fileImg2').val();
			
			if( !value.match(/.(jpg)|(png)$/) ){//here your extensions
				alert("Seleccione una imagen de extensión jpg o png.");   //actions like focus, not validate...
			}
			else {//right extension
				addImage2(e); //actions
			}
     });
	function addImage2(e){
    	var file = e.target.files[0],
      	imageType = /image.*/;
    
      	if (!file.type.match(imageType))
       		return;
  
      	var reader = new FileReader();
		reader.onload = fileOnload2;
		reader.readAsDataURL(file);
    }
	function fileOnload2(e) {
   		var result=e.target.result;
		$('#contentFileImg2').html('<div class="alert alert-info" style="margin-top:15px;"><button type="button" class="close" data-dismiss="alert">×</button>Selecciona el &aacute;rea de la imagen a mostrar en la aplicaci&oacute;n.</div><img id="imgSalida2" width="500" src="" /><input type="hidden" id="x2" name="x2" /><input type="hidden" id="y2" name="y2" /><input type="hidden" id="w2" name="w2" /><input type="hidden" id="h2" name="h2" />');
      	$('#imgSalida2').attr("src",result);
		$(function(){			
			$('#imgSalida2').Jcrop({
				aspectRatio: 1,
				onSelect: updateCoords,
				setSelect:   [ 200, 200, 50, 50 ],
			});
			
		});
			
		function updateCoords(c){
			$('#x2').val(c.x);
			$('#y2').val(c.y);
			$('#w2').val(c.w);
			$('#h2').val(c.h);
		};
			
		function checkCoords(){
			if (parseInt($('#w').val())) return true;
				alert('Please select a crop region then press submit.');
				return false;
		};
     }
  
};
function checkFile3(){
	var checkbox = document.getElementById("checkImg3");
  	if(checkbox.checked){
    $('#contentInputFileImg3').html('<div class="custom-input-file"><input name="fileImg3" id="fileImg3" type="file" class="input-file" />Seleccionar imagen 3<div class="archivo">...</div></div><div id="contentFileImg3"<img id="imgSalida3" width="500" src="" /><input type="hidden" id="x3" name="x3" /> <input type="hidden" id="y3" name="y3" /><input type="hidden" id="w3" name="w3" /><input type="hidden" id="h3" name="h3" /></div>');
  	}else{
	 	$('#contentInputFileImg3').html(' ');
  	}
  	$(".custom-input-file input:file").change(function(){
        $(this).parent().find(".archivo").html($(this).val());
    }).css('border-width',function(){
        if(navigator.appName == "Microsoft Internet Explorer")
            return 0;
    });
	
	$('#fileImg3').change(function(e) {
			value=$('#fileImg3').val();
			
			if( !value.match(/.(jpg)|(png)$/) ){//here your extensions
				alert("Seleccione una imagen de extensión jpg o png.");   //actions like focus, not validate...
			}
			else {//right extension
				addImage3(e); //actions
			}
     });
	function addImage3(e){
    	var file = e.target.files[0],
      	imageType = /image.*/;
    
      	if (!file.type.match(imageType))
       		return;
  
      	var reader = new FileReader();
		reader.onload = fileOnload3;
		reader.readAsDataURL(file);
    }
	function fileOnload3(e) {
   		var result=e.target.result;
		$('#contentFileImg3').html('<div class="alert alert-info" style="margin-top:15px;"><button type="button" class="close" data-dismiss="alert">×</button>Selecciona el &aacute;rea de la imagen a mostrar en la aplicaci&oacute;n.</div><img id="imgSalida3" width="500" src="" /><input type="hidden" id="x3" name="x3" /><input type="hidden" id="y3" name="y3" /><input type="hidden" id="w3" name="w3" /><input type="hidden" id="h3" name="h3" />');
      	$('#imgSalida3').attr("src",result);
		$(function(){			
			$('#imgSalida3').Jcrop({
				aspectRatio: 1,
				onSelect: updateCoords,
				setSelect:   [ 200, 200, 50, 50 ],
			});
			
		});
			
		function updateCoords(c){
			$('#x3').val(c.x);
			$('#y3').val(c.y);
			$('#w3').val(c.w);
			$('#h3').val(c.h);
		};
			
		function checkCoords(){
			if (parseInt($('#w').val())) return true;
				alert('Please select a crop region then press submit.');
				return false;
		};
     }
  
};

