<?php   
$categ = new Categorias();

switch(isset($_GET['mode'])?$_GET['mode']:null) { 
    case 'add':
        if($_POST){
            $categ->Add();
        }else{
            include(HTML_DIR . 'categorias/addCategoria.php');
        }
        break;
    case 'edit':
        if(isset($_GET['id'])){
            if($_POST){
                // Metodo ACTUALIZO a la BD Por id
            }else{
                include(HTML_DIR . 'categorias/editCategoria.php');
            }
        }
        break;
    case 'delete':
        if(isset($_GET['id'])){
            // Metodo ELIMINAR a la BD Por id
        }
        break;
    default: // all
        include(HTML_DIR . 'categorias/allCategoria.php');
    break;

}
