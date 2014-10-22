
function modalEdit(id_producto){
	$.ajax({
		crossDomain: true,
		type:'POST',
		url: "http://localhost/buscame/accesopanel/acceso/php/getDataAcceso.php?data=editProduct&id_producto="+id_producto,
		dataType: 'html',
		success: function(data) {
			if(data){
				$('#contEditModal').html(data);
			}
		},
	});
	
	$('#editModal').modal('show');
}

function changeTipoEdit(){
	var categoria = $("#categoriaEdit option:selected").val();
	$.ajax({
		crossDomain: true,
		type:'POST',
		url: "http://localhost/buscame/accesopanel/acceso/php/getDataAcceso.php?data=changeCatEdit&id_categoria="+categoria,
		dataType: 'html',
		success: function(data) {
			if(data){
				$('#tipoEdit').html(data);
			}
		},
	});
}

function promEditYes(){
	$('#preAntEdit').html('<div class="input-prepend input-append" id="div_price"><label class="control-label">Precio anterior</label><span class="add-on">$</span><input class="span2" id="preAntEdit" type="number" name="precioAntEdit" required></div>');
}
function promEditNo(){
	$('#preAntEdit').html('');
}

