$(document).ready(function(){
	$('#imgFileAlmacen').change(function(){
		 $('#subfile').val($(this).val());
	});
	$('#btnSavePass').click(function(){
		 var passAnt = $('#passAnt').val();
		 var passNew = $('#passNew').val();
		 var passNewRe = $('#passNewRe').val();
		 
		 if(passAnt==""||passNew==""||passNewRe==""){
			$('#errorPass').hide(500);
		 	$('#errorPass').html('<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Ups!</strong> Parece que te falta ingresar alg&uacute;n campo.</div>');
			$('#errorPass').show(500);
		 }else if(passNew.length<5){
			 $('#errorPass').hide(500);
			 $('#errorPass').html('<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Ups!</strong> La contrase&ntilde;a debe de tener m&aacute;s de 6 car&aacute;cteres.</div>');
			$('#errorPass').show(500);
		 }else if(passNew!=passNewRe){
			 $('#errorPass').hide(500);
			 $('#errorPass').html('<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Ups!</strong> Las contrase&ntilde;as deben de ser iguales.</div>');
			$('#errorPass').show(500);
		 }else if(passNew){
			 $.ajax({
				crossDomain: true,
				type:'POST',
				url: "http://localhost/buscame/accesopanel/acceso/php/getDataAcceso.php?data=changePass&passAnt="+passAnt+"&passNew="+passNew+"&passNewRe="+passNewRe,
				dataType: 'html',
				success: function(data) {
					data = $.trim(data);
					if(data=="Incorrecta"){
						alert(data);
						$('#errorPass').hide(500);
						$('#errorPass').html('<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Ups!</strong> La contrase&ntilde;a anterior no es correcta.</div>');
						$('#errorPass').show(500);
					}else{
						$('#passAnt').val('');
		 				$('#passNew').val('');
		 				$('#passNewRe').val('');
						$('#errorPass').hide(500);
						$('#errorPass').html('<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Listo!</strong> La contrase&ntilde;a ha sido cambiada con &eacute;xito.</div>');
						$('#errorPass').show(500);
					}
				},
			});
		 }
		 
	});
});

function changeImgAl(){
	
	var img = $('#imgFileAlmacen').val();
	
	if(img==""){
		$('#messageImg').html('<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Ups!</strong> Selecciona una imagen.</div>');
		return false;
	}else if( !img.match(/.(jpg)|(png)$/) ){
		$('#messageImg').html('<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button>Selecciona una imagen jpg o png.</div>');
		return false;
	}else {
		
	}
	
}