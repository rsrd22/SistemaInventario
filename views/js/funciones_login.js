
function showPassword() {
    var key_attr = $('#key').attr('type');
    
    if(key_attr != 'text') {
        
        $('.checkbox').addClass('show');
        $('#key').attr('type', 'text');
        
    } else {
        
        $('.checkbox').removeClass('show');
        $('#key').attr('type', 'password');
        
    }
    
}

function goLogin(){
	var connect, response, form, result, user, pass, session;
	user = Item('usuario_login').value;
	pass = Item('pass_login').value;
	session = Item('session_login').checked ? true : false;

	form = 'user='+user+'&pass='+pass+'&session='+session;
	connect = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
	connect.onreadystatechange = function(){
		if(connect.readyState == 4 && connect.status == 200){
			if(connect.responseText == 1){
				result = `
				<div class="alert alert-dismissible alert-success">
				 <h4>Conectado!</h4>
				 <p><strong>Te estamos redireccionando.</strong></p>
				</div>
				`;
				Item('_AJAX_LOGIN_').innerHTML= result;
				location.reload();
			}else{
				Item('_AJAX_LOGIN_').innerHTML= connect.responseText;
			}
			console.log(connect.responseText);
		}else if(connect.readyState != 4){
			result = `<div class="alert alert-dismissible alert-warning">
			 <button type="button" class="close" data-dismiss="alert">X</button>
			 <h4>Procesando...</h4>
			 <p><strong>Estamos intentando logearte.</strong></p>
			</div>`;
			Item('_AJAX_LOGIN_').innerHTML= result;
		}
	}
	connect.open('POST', 'ajax.php?mode=login', true);
	connect.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	connect.send(form);
}


function runScriptLogin(e){
	if(e.keyCode === 13){
		goLogin();
		
	}
}

