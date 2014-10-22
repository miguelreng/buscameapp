
//JavaScript Scroll

document.addEventListener('touchmove', function (e) { e.preventDefault(); }, false);
document.addEventListener('DOMContentLoaded', function () { setTimeout(loaded, 4000); }, false);
//Variables del scroll 

var articleGustos;
var selectT;
var carousel;
var myrefresh;
var myScroll3;
var myScroll;
var myScroll4;
var wrappSus;
var wrappMenor;
var wrappPromo;
var wrappCC;
var wrappCCMe;
var wrapperProMe;
var wrapperAlMe;
var wrappArtiGustos;
var wrappArti;
var wrapperProGus;
var wrappCCGus;
var wrapperAlGus;
var pullDownEl;
var pullDownOffset;
var pullUpEl;
var pullUpOffset;
var pullUpElProm;
var pullUpMe;
var pullUpGus;

//Funcion del "Tire para refrescar" búsqueda normal	
function pullUpActionAll () {
	var limite = parseInt(sessionStorage.limiteAll)+5;
	sessionStorage.limiteAll= limite;
	var cat = $("#dataCategoria").val();
	var tipo = $("#dataTipo").val();
	var ran = $("#dataPrecio").val();
	var col = $("#dataColor").val();
	var mar = $("#dataMarca").val();
	var mat = $("#dataMaterial").val();
	var cc = $("#dataCC").val();
	var al = $("#dataAlmacen").val();
	var talla = $("#dataTalla").val();
	var none = "none";
	var list = "no";		
	if(cat!=none && tipo!=none && ran != none && col != none && mar != none && mat !=none &&cc != none && al != none && talla != none){ 
		$$.ajax({
			crossDomain: true,
			type:'POST',
			url: 'http://localhost/buscame/app/components/php/getData.php?data=dataList&id_categoria='+cat+'&id_tipo='+tipo+'&id_rango='+ran+'&id_color='+col+'&id_marca='+mar+'&id_material='+mat+'&id_centrocomercial='+cc+'&id_almacen='+al+"&list="+list+"&id_talla="+talla+"&limite="+limite,
			dataType: 'html',
			async: true,
			success: function(data) {
				if(data){
					$('#list_products').append(data);
					myrefresh.refresh();
				}else{
					Lungo.Notification.hide();
					setTimeout(function(){
						Lungo.Notification.show(
								"Por favor, compruebe su conexión a internet e intente de nuevo.",
								"signal",  
								4
						);						
					},150);
					limite = parseInt(sessionStorage.limiteAll)-5;
					sessionStorage.limiteAll= limite
				}
			},
		});
		  
	}else{
		Lungo.Notification.html('<h1 style= "padding: 20px; font-size: 15px;">Selecciona todos los campos por favor.</h1> <a href="#form" data-router="section" class="button large anchor" data-action="close">Cerrar</a>');
	}  
	
		
}
	
//Funcion del "Tire para refrescar" búsqueda promoción
function pullUpActionProm () {
	var cat = $("#dataCategoria").val();
	var tipo = $("#dataTipo").val();
	var ran = $("#dataPrecio").val();
	var col = $("#dataColor").val();
	var mar = $("#dataMarca").val();
	var mat = $("#dataMaterial").val();
	var cc = $("#dataCC").val();
	var al = $("#dataAlmacen").val();		
	var talla = $("#dataTalla").val();
	var list = "promo";
	var limite = parseInt(sessionStorage.limiteProm)+5;
	sessionStorage.limiteProm= limite;	
	$$.ajax({
			crossDomain: true,
			type:'POST',
			url: 'http://localhost/buscame/app/components/php/getData.php?data=dataList&id_categoria='+cat+'&id_tipo='+tipo+'&id_rango='+ran+'&id_color='+col+'&id_marca='+mar+'&id_material='+mat+'&id_centrocomercial='+cc+'&id_almacen='+al+"&list="+list+"&id_talla="+talla+"&limite="+limite,
			dataType: 'html',
			async: true,
			success: function(data) {
				if(data){				
					$('#list_promo').append(data);	
					wrappPromo.refresh();
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
					limite = parseInt(sessionStorage.limiteProm)-5;
					sessionStorage.limiteProm= limite;
				}			
			},
		}); 
	
}

//Funcion del "Tire para refrescar" Me gusta
function pullUpActionMe () {
	var limite = parseInt(sessionStorage.limiteMe)+5;
	sessionStorage.limiteMe= limite;	
	var usuario = localStorage.usuario;
	$$.ajax({
			crossDomain: true,
			type:'POST',
			url: "http://localhost/buscame/app/components/php/getData.php?data=meGustan&usuario="+usuario+"&limite="+limite,
			dataType: 'html',
			async: true,
			success: function(data) {							
				if(data){
					$('#wrappLike').append(data);
					wrappArti.refresh();
				}else{
					Lungo.Notification.hide();
					setTimeout(function(){
						Lungo.Notification.show(
								"Por favor, compruebe su conexión a internet e intente de nuevo.",
								"signal",  
								4
						);						
					},150);
					limite = parseInt(sessionStorage.limiteMe)-5;
					sessionStorage.limiteMe= limite;
				}				
			}						
	});
} 
	
//Funcion del "Tire para refrescar" Gustos
function pullUpActionGus () {
	var limite = parseInt(sessionStorage.limiteGustos)+5;
	sessionStorage.limiteGustos= limite;	
	var cat = "all";
	var ran = "all";
	var mar = "all";
	var mat = "all";
	var cc = "all";
	var al = "all";
	var talla = "all";
	var none = "none";
	var list = "no";
	$$.ajax({
		crossDomain: true,
		type:'POST',
		url: 'http://localhost/buscame/app/components/php/getData.php?data=dataListGus&id_categoria='+cat+'&id_tipo='+sessionStorage.tipoGus+'&id_rango='+ran+'&id_color='+localStorage.id_color+'&id_marca='+mar+'&id_material='+mat+'&id_centrocomercial='+cc+'&id_almacen='+al+"&list="+list+"&id_talla="+talla+"&limite="+limite,
		dataType: 'html',
		async: true,
		success: function(data) {
			if(data){				
				$('#wrappGustos').append(data).trigger('refresh');
				wrappArtiGustos.refresh();
			}else{
				Lungo.Notification.hide();
				setTimeout(function(){
					Lungo.Notification.show(
							"Por favor, compruebe su conexión a internet e intente de nuevo.",
							"signal",  
							4
					);						
				},150);
				limite = parseInt(sessionStorage.limiteGustos)-5;
				sessionStorage.limiteGustos= limite;
			}			
		},
	});
} 

//Funcion total iScroll	
function loaded() {
	
	
	pullUpEl = document.getElementById('pullUpAll');	
	pullUpOffset = pullUpEl.offsetHeight;
	pullUpElProm = document.getElementById('pullUpProm');	
	pullUpElMe = document.getElementById('pullUpMe');	
	pullUpMeOffset = pullUpElMe.offsetHeight;
	
	pullUpGus = document.getElementById('pullUpGus');
	
	
	myScroll = new iScroll('wrapper', {
		useTransform: false,
		checkDOMChanges: true,
		hScrollbar: false,
		vScrollbar:false,
		onBeforeScrollStart: function (e) {
			var target = e.target;
			while (target.nodeType != 1) target = target.parentNode;

			if (target.tagName != 'SELECT' && target.tagName != 'INPUT' && target.tagName != 'TEXTAREA')
				e.preventDefault();
		}
	});
					
	myScroll3 = new iScroll('wrapper3', {checkDOMChanges: true,hScrollbar: false,vScrollbar:false,});
	myScroll4 = new iScroll('wrapper4', {checkDOMChanges: true,hScrollbar: false,vScrollbar:false,});
	articleGustos = new iScroll('wrappArtGustos', {checkDOMChanges: true,hScrollbar: false,vScrollbar:false,});
	wrappCCGus = new iScroll('wrappCCGus', {checkDOMChanges: true,hScrollbar: false,vScrollbar:false,});
	wrappPromo = new iScroll('wrappPromo', {
		useTransition: true,
		checkDOMChanges: true,
		hScrollbar: false,
		vScrollbar:false,
		onRefresh: function () {
			if (pullUpElProm.className.match('loading')) {
				pullUpElProm.className = '';
				pullUpElProm.querySelector('.pullUpLabelProm').innerHTML = 'Tire hacia arriba para cargar más...';
			}
		},
		onScrollMove: function () {
			if (this.y < (this.maxScrollY - 5) && !pullUpEl.className.match('flip')) {
				pullUpElProm.className = 'flip';
				pullUpElProm.querySelector('.pullUpLabelProm').innerHTML = 'Suelte para actualizar...';
				this.maxScrollY = this.maxScrollY;
			} else if (this.y > (this.maxScrollY + 5) && pullUpEl.className.match('flip')) {
				pullUpElProm.className = '';
				pullUpElProm.querySelector('.pullUpLabelProm').innerHTML = 'Tire hacia arriba para cargar más...';
				this.maxScrollY = pullUpOffset;
			}
		},
		onScrollEnd: function () {
			if (pullUpElProm.className.match('flip')) { 
				pullUpElProm.className = 'loadingNew';
				pullUpElProm.querySelector('.pullUpLabelProm').innerHTML = 'Cargando...';				
				pullUpActionProm();	// Execute custom function (ajax call?)
			}
		}
	});
	wrapperProGus = new iScroll('wrapperProGus',{checkDOMChanges: true,hScrollbar: false,vScrollbar:false,});
	wrappMenor = new iScroll('wrappMenor',{checkDOMChanges: true,hScrollbar: false,vScrollbar:false,});
	wrappCC = new iScroll('wrappCC',{checkDOMChanges: true,hScrollbar: false,vScrollbar:false,});
	wrapperProMe = new iScroll('wrapperProMe',{checkDOMChanges: true,hScrollbar: false,vScrollbar:false,});
	wrappCCMe = new iScroll('wrappCCMe',{checkDOMChanges: true,hScrollbar: false,vScrollbar:false,});
	wrapperAlMe = new iScroll('wrapperAlMe',{checkDOMChanges: true,hScrollbar: false,vScrollbar:false,});
	wrapperAlGus = new iScroll('wrapperAlGus',{checkDOMChanges: true,hScrollbar: false,vScrollbar:false,});
	wrappSus = new iScroll('wrappSus',{checkDOMChanges: true,hScrollbar: false,vScrollbar:false,});
	
	carousel = new iScroll('carousel-article',{
		useTransform: false,
		checkDOMChanges: true,
		hScrollbar: false,
		vScrollbar:false,
		onBeforeScrollStart: function (e) {
			var target = e.target;
			while (target.nodeType != 1) target = target.parentNode;

			if (target.tagName != 'SELECT' && target.tagName != 'INPUT' && target.tagName != 'TEXTAREA')
				e.preventDefault();
		}
	});
	selectT	= new iScroll('selectT',{
		useTransform: false,
		checkDOMChanges: true,
		hScrollbar: false,
		vScrollbar:false,
		onBeforeScrollStart: function (e) {
			var target = e.target;
			while (target.nodeType != 1) target = target.parentNode;

			if (target.tagName != 'SELECT' && target.tagName != 'INPUT' && target.tagName != 'TEXTAREA')
				e.preventDefault();
		}
	});

	wrappArti = new iScroll('wrappArti', {
		useTransition: true,
		checkDOMChanges: true,
		hScrollbar: false,
		vScrollbar:false,
		onRefresh: function () {
			if (pullUpElMe.className.match('loading')) {
				pullUpElMe.className = '';
				pullUpElMe.querySelector('.pullUpLabelMe').innerHTML = 'Tire hacia arriba para cargar más...';
			}
		},
		onScrollMove: function () {
			if (this.y < (this.maxScrollY - 5) && !pullUpEl.className.match('flip')) {
				pullUpElMe.className = 'flip';
				pullUpElMe.querySelector('.pullUpLabelMe').innerHTML = 'Suelte para actualizar...';
				this.maxScrollY = this.maxScrollY;
			} else if (this.y > (this.maxScrollY + 5) && pullUpElMe.className.match('flip')) {
				pullUpElMe.className = '';
				pullUpElMe.querySelector('.pullUpLabelMe').innerHTML = 'Tire hacia arriba para cargar más...';
				this.maxScrollY = pullUpMeOffset;
			}
		},
		onScrollEnd: function () {
			if (pullUpElMe.className.match('flip')) { 
				pullUpElMe.className = 'loadingNew';
				pullUpElMe.querySelector('.pullUpLabelMe').innerHTML = 'Cargando...';				
				pullUpActionMe();	// Execute custom function (ajax call?)
			}
		}
	});
	
	
	wrappArtiGustos = new iScroll('wrappArtiGustos', {
		useTransition: true,
		checkDOMChanges: true,
		hScrollbar: false,
		vScrollbar:false,
		onRefresh: function () {
			if (pullUpGus.className.match('loading')) {
				pullUpGus.className = '';
				pullUpGus.querySelector('.pullUpLabelGus').innerHTML = 'Tire hacia arriba para cargar más...';
			}
		},
		onScrollMove: function () {
			if (this.y < (this.maxScrollY - 5) && !pullUpEl.className.match('flip')) {
				pullUpGus.className = 'flip';
				pullUpGus.querySelector('.pullUpLabelGus').innerHTML = 'Suelte para actualizar...';
				this.maxScrollY = this.maxScrollY;
			} else if (this.y > (this.maxScrollY + 5) && pullUpGus.className.match('flip')) {
				pullUpGus.className = '';
				pullUpGus.querySelector('.pullUpLabelGus').innerHTML = 'Tire hacia arriba para cargar más...';
				this.maxScrollY = pullUpMeOffset;
			}
		},
		onScrollEnd: function () {
			if (pullUpGus.className.match('flip')) { 
				pullUpGus.className = 'loadingNew';
				pullUpGus.querySelector('.pullUpLabelGus').innerHTML = 'Cargando...';				
				pullUpActionGus();	// Execute custom function (ajax call?)
			}
		}
	});
	
	myrefresh = new iScroll('wrapper2', {
		useTransition: true,
		topOffset: pullDownOffset,
		checkDOMChanges: true,
		hScrollbar: false,
		vScrollbar:false,
		onRefresh: function () {
			if (pullUpEl.className.match('loading')) {
				pullUpEl.className = '';
				pullUpEl.querySelector('.pullUpLabelAll').innerHTML = 'Tire hacia arriba para cargar más...';
			}
		},
		onScrollMove: function () {
			if (this.y < (this.maxScrollY - 5) && !pullUpEl.className.match('flip')) {
				pullUpEl.className = 'flip';
				pullUpEl.querySelector('.pullUpLabelAll').innerHTML = 'Suelte para actualizar...';
				this.maxScrollY = this.maxScrollY;
			} else if (this.y > (this.maxScrollY + 5) && pullUpEl.className.match('flip')) {
				pullUpEl.className = '';
				pullUpEl.querySelector('.pullUpLabelAll').innerHTML = 'Tire hacia arriba para cargar más...';
				this.maxScrollY = pullUpOffset;
			}
		},
		onScrollEnd: function () {
			if (pullUpEl.className.match('flip')) { 
				pullUpEl.className = 'loadingNew';
				pullUpEl.querySelector('.pullUpLabelAll').innerHTML = 'Cargando...';				
				pullUpActionAll();	// Execute custom function (ajax call?)
			}
		}
	});
	
	setTimeout(function () { document.getElementById('wrapper2').style.left = '5'; }, 800);
	
}
	

//Función para los almacenes
function touchAlmacen(id_almacen){
	var al = '<select id="dataAlmacen"><option value="'+id_almacen+'"></option></select>';	
	$('#divsAdicionales').html(al);
	var cat = $("#dataCategoria").val();
	var tipo = $("#dataTipo").val();
	var ran = $("#dataPrecio").val();
	var col = $("#dataColor").val();
	var mar = $("#dataMarca").val();
	var mat = $("#dataMaterial").val();
	var cc = $("#dataCC").val();
	var al = $("#dataAlmacen").val();
	var talla = $("#dataTalla").val();
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
				Lungo.Router.section("sectionSus");
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

//Función para cuando selecciona el centro comercial
function clickCC(){
	var valor = $("#dataCC").val();
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
				$('#contentAlmacen').html('<div id="reintentar1"><a id="btnReintentar4" class="button" style="background-color: rgb(61, 191, 247);">Reintentar</a></div>');
			}			
		},
	});	
}

//Función para validar el correo
function validarEmail( email ) {
    expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if ( !expr.test(email) ){
        return true;
	}else{
		return false;
	}
}

//Función para reintentar si no hay conexión
function reintentar(php, data, div){
	Lungo.Notification.show();		
	$$.ajax({
		crossDomain: true,
		type:'POST',
		url: 'http://localhost/buscame/app/components/php/'+php+'.php?data='+data,
		dataType: 'html',
		async: true,
		success: function(data) {
			if(data){
				$('#'+div).html(data).trigger('refresh');
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

//Función para mostrar los gustos según el tipo
function mostrarGustos(tipo){
	Lungo.Notification.show();
	var cat = "all";
	var ran = "all";
	var mar = "all";
	var mat = "all";
	var cc = "all";
	var al = "all";
	var talla = "all";
	var none = "none";
	var list = "no";
	var limite = 5;

	if(typeof(Storage)!=="undefined"){
		if (sessionStorage.limiteGustos){
			sessionStorage.limiteGustos=limite;
		}else{
			sessionStorage.limiteGustos=limite;
		}
		sessionStorage.tipoGus = tipo;
	}
	$$.ajax({
		crossDomain: true,
		type:'POST',
		url: 'http://localhost/buscame/app/components/php/getData.php?data=dataListGus&id_categoria='+cat+'&id_tipo='+sessionStorage.tipoGus+'&id_rango='+ran+'&id_color='+localStorage.id_color+'&id_marca='+mar+'&id_material='+mat+'&id_centrocomercial='+cc+'&id_almacen='+al+"&list="+list+"&id_talla="+talla+"&limite="+limite,
		dataType: 'html',
		async: true,
		success: function(data) {
			if(data){				
				$('#wrappGustos').html(data).trigger('refresh');
				Lungo.Router.section('sectionListGustos');
				Lungo.Notification.hide();
			}else{
				Lungo.Router.section("sectionGustos");
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

//Función para cuando selecciona una categoría
function clickCat(){
	Lungo.Notification.show();
	var valor = $("#dataCategoria").val();
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
				$('#contentTipo').html('<div id="reintentar1"><a id="btnReintentar2" class="button" style="background-color: rgb(61, 191, 247);">Reintentar</a></div>');
			}
		},
	});
}

//Función para cuando selecciona el tipo
function clickTipo(){
	var valor =$("#dataTipo").val();
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
				$('#contentProducto').html('<div id="reintentar1"><a id="btnReintentar3" class="button" style="background-color: rgb(61, 191, 247);">Reintentar</a></div>');
			}				
		},
	});
}

//Función para eliminar el div del mapa
function clearMap(div){
	$('#'+div).html(' ');
}
