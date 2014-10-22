function removeProduct(id_producto,nombre){
	$('#mensajeEliminar').html('¿Está seguro de que desea eliminar "'+nombre+'"?');
	$('#removeModal').modal('show');
	$('#btnEliminar').click(function(){
		deleteProduct(id_producto);
	});
}

function deleteProduct(id_producto){
	$.ajax({
		crossDomain: true,
		type:'POST',
		url: "http://localhost/buscame/accesopanel/acceso/php/getDataAcceso.php?data=removeProduct&id_producto="+id_producto,
		dataType: 'html',
		success: function(data) {
			location.href="http://localhost/buscame/accesopanel/acceso/content/#eliminar_tab";
			location.reload();
		},
	});
}