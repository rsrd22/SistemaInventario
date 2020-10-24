function Item(id){
	return document.getElementById(id);
}

function DeleteItem(contenido, url){
	var action = window.confirm(contenido);
	if(action){
		window.location = url;
	}
}

function EventoBoton(url){
	window.location = url;
}

function EventoBuscar(url){
	var filtro = Item('txtFiltro').value;
	var add = '';
	if(filtro !== ''){
		add = '&filtro='+filtro
	}
	window.location = url+add;
}





///////////FUNCIONES GENERICAS//////////////

function ValidarCampoNumerico(e){
	key = e.keyCode || e.which;
	teclado = String.fromCharCode(key);
	//alert(key);
	numeros = "0123456789";  

	especiales = ["8","9","37","38","46"];

	teclado_especial = false;

	for(var i in especiales){
		if(key == especiales[i]) {
			teclado_especial = true;
		}
	}

	if(numeros.indexOf(teclado) == -1 && !teclado_especial){
		return false;
	}
}



function redondeo(numero, decimales)
{
	var flotante = parseFloat(numero);
	var resultado = Math.round(flotante*Math.pow(10,decimales))/Math.pow(10,decimales);
	return resultado;
}

function redondeoVentas(numero){
	var tam = ''+numero;
	var dcifrs = tam[tam.length - 2]+ tam[tam.length-1];
	var rest = 100-parseInt(dcifrs);
	var tot = 0;
	if(rest < 100/2){
		total = numero + rest;
	}else{
		total = numero - rest;
	}

	return total;
}

function GetValorUnitario(input){
	
	var valor = input.value;
	var can = Item('txtCantidad').value;

	var div = valor / (can == 0 ? 1 : can);

	div = redondeo(div, 0);

	Item('txtValor_Compra').value = div;
}

function GetValorVenta(){
	var vlor = Item('txtValor_Compra').value;

	var venta = parseInt(vlor) + parseInt(vlor)*0.75; 

	venta = redondeoVentas(redondeo(venta,0));

	Item('txtValor_Venta').value = venta;
}

function KeyIsEnter(e){
	if(e.keyCode == 13){
		return true;
	}else{
		return false;
	}
}
