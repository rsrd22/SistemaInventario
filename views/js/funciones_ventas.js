function removerFila(fila){
	$('#tr'+fila).remove();
	CalcularTotal();
}

function agregarFila(){

	if(Item("hddEstado").value == '0'){//AGREGR UN NUEVO ELEMENTO
		var filas = $("#tbl_venta tr:first td").length;
		var trs=$("#tbl_venta tr").length;
		cant = $('#contador-filas').val();
		cant++;
		$('#contador-filas').val(cant);
		var newfila = '<tr id="tr'+cant+'">'
						+'<td class="text-center" style="vertical-align: middle;">'
						+'	<input type="hidden" id="idelemento'+cant+'" name="pkelemento[]" >'
						+'	<input type="hidden" id="tipo'+cant+'" name="tipo[]" >'
						+'	<input type="hidden" id="stock'+cant+'" name="stock[]" >'
						+cant
						+'</td>'
						+'<td class="text-left">'
						+'	<input class="form-control" type="text" id="descripcion'+cant+'" name="descripcion[]" placeholder="Articulo o Servicio"  onkeypress="Autocompletar('+cant+');"></td>'
						+'<td width="30px" class="text-right">'
						+'	<input class="form-control text-center" required type="text" id="cantidad'+cant+'" title="Cantidad" name="cantidad[]" placeholder="Cant" onkeypress="EstadoFila(event, 0, '+cant+');" onkeydown="return ValidarCampoNumerico(event);" onblur="VerificarCantidadItem('+cant+');" ></td>'
						+'  <div class="invalid-feedback">Example invalid custom select feedback</div>'
						+'<td width="150px" class="text-right">'
						+'	<input class="form-control  text-right" type="text" id="valorunidad'+cant+'"  name="valorunidad[]" placeholder="Valor Unidad" onkeypress="return ValidarCampoNumerico(event);" onblur="calcularTotalFila('+cant+')" ></td>'
						+'<td width="150px" class="text-right">'
						+'	<input class="form-control text-right" type="text" disabled id="valortotal'+cant+'" name="valortotal[]" placeholder="Total" onkeypress="return ValidarCampoNumerico(event);"></td>'
						+'<td width="20px" class="text-center">'
						+'	<button class="btn btn-primary text-right" title="Quitar Elemento" onclick="removerFila('+cant+');">'
						+'		<span class="glyphicon glyphicon-remove-sign"></span>'
						+'	</button></td>'
						+'</tr>';
		$("#tbl_venta").append(newfila);	
		$("#descripcion"+cant).focus();
	}else{//NO SE H ESPECIFICADO NINGUN ELEMENTO

	}		
}

function calcularTotalFila(fila){ 
	var cant = $('#cantidad'+fila).val();
	var valor = $('#valorunidad'+fila).val();
	var total = cant * valor;
	$('#valortotal'+fila).val(total);
	CalcularTotal();
}

function CalcularTotal(){
	var tbs = document.getElementById('tbl_venta').getElementsByTagName('TR');
	var trs=$("#tbl_venta tr").length;
	var fila = '';  
	var id = '';
	var total = 0;
	for(var i =1; i < trs; i++){
		id = tbs[i].id;
		fila = id.substring(2, id.lenght);
		var valor = $("#valortotal"+fila).val();
		total += parseInt((valor=== ''? 0 : valor));
	}
	var iva = total * (19 / 100);
	var subtotal = total-iva;

	$("#Iva").val(iva);
	$("#SubTotal").val(subtotal);
	$("#lblTotal").html(total);
	$("#Total").val(total);
	
}

function VerificarCantidadItem(fila){
	var stock = $('#stock'+fila).val();	
	var cant = $('#cantidad'+fila).val();
	var tipo = $('#tipo'+fila).val();
	var articulo = $('#descripcion'+fila).val();

	if(tipo === 'a' && cant > stock){
		$('#cantidad'+fila).val(0);
		
		document.getElementById("cantidad"+fila).style.border = "2px solid red";
		var conf = confirm('Stock insuficiente. Quedan '+stock+' unidades disponibles del articulo <b>'+articulo+'</b>.');
		if(conf === 'ok'){
			document.getElementById("cantidad"+fila).focus();
		}else{
			document.getElementById("cantidad"+fila).focus();
		}
		
	}else{
		document.getElementById("cantidad"+fila).style.border = "";
		calcularTotalFila(fila);	
	}

	
}

function EstadoFila(e, estado, fila){
	var keyCode = e.keyCode ? e.keyCode : e.which ? e.which : e.charCode;
    if (keyCode === 9){
		if(estado === 0){//si es desde la casilla cantidad
			calcularTotalFila(fila);
			//$("#valorunidad"+fila).focus();
			document.getElementById('cantidad'+fila).focus();
		}else{//CAsilla Valor Unidad     
			calcularTotalFila(fila);
		}
		
	}
	
}