<?php
include(HTML_DIR . 'overall/header.php');
?>

<h1>bienvenido Categorias</h1>
<ul class="nav navbar-nav navbar-right" role="tablist"> 						
    <li class=""><a href="#"><?php echo $_SESSION['app_usuario'];?></a></li>
    <li class=""><a href="?view=index">Inicio</a></li>
    <li class=""><a href="?view=logout">Cerrar Sesion</a></li>
</ul>

<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <span>
                <a href="?view=categorias&mode=add" class="fas fa-plus">Agregar</a>
            </span>
        </div>
        <div class="col-xs-12">
        <?php
            if(false != $_categorias){
                $HTML = '<table  class="table table-bordered table-hover " >
					<tr class="info ">
						<th class="text-center">No</th>
						<th class="text-center">Descripción	</th>
                        <th  ';
                  
                if($_SESSION['app_id_perfil'] == 1)
                    $HTML.= ' colspan="2" ';
   
                $HTML.= 'class="text-center">Acciones</th>
                        </tr>';

                foreach ($_categorias as $idcategoria => $value) {
                            # code...
                    $HTML.='<tr>
                        <td class="text-center" style="vertical-align: middle;">'.$_categorias[$idcategoria]['ID'].'</td>
                        <td class="text-capitalize" style="vertical-align: middle; ">'.$_categorias[$idcategoria]['DESCRIPCION'].'</td>
                        <td width="20px" class="text-center"><button class="btn btn-primary text-right" title="Editar" >
                            <span class="glyphicon glyphicon-pencil"></span> 
                        </button>	</td>';
                    if($_SESSION['app_id_perfil'] == 1)	{
                        $HTML.=	'<td width="20px" class="text-center">
                                    <button class="btn btn-primary text-right" title="Eliminar" >
                                        <span class="glyphicon glyphicon-trash"></span>
                                    </button>
                                </td>';
                    }
    
                    $HTML.= '</tr>';
                }	
    
                $HTML .= '</table>';
            }else{
                $HTML = '<div class="alert alert-dismissible alert-info">
                        <strong>Información:</strong> Todavia no existe ninguna Categoria.
                        </div>';
            } 

            echo $HTML;
        ?>
        </div>
    </div>
</div>

<?php
include(HTML_DIR . 'overall/footer.php');
?>