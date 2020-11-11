<?php

class Categorias{
    private $_id;
    private $_descripcion;
    private $_fecha;
    private $_id_usuario;
    private $db;
    
    public function __construct(){
        $this->db = new Conexion();
    }

    
    
    public function Add(){
        $_id_usuario = $_SESSION['app_id'];
        $_descripcion = $this->db->real_escape_string($_POST['descripcion']);
        $sql = "INSERT INTO `categorias`
                        (`descripcion`, `fecha`, `id_usuario`)
                        VALUES 
                        ('$_descripcion', NOW(), '$_id_usuario');";
        $this->db->query($sql);

        header('location: ?view=categorias&mode=add&success=true');
    }

    public function Edit(){

    }

    public function Delete(){

    }


}

