<?php

function Categorias(){
    $db = new Conexion();

    $sql = "SELECT id AS ID, descripcion AS DESCRIPCION FROM `categorias`";

    $query = $db->query($sql);
    if($db->rows($query)>0){
        while($data = $db->recorrer($query)){
            $categorias[$data['ID']] = array(
                'ID' => $data['ID'],
                'DESCRIPCION' => $data['DESCRIPCION']
            );
        }
    }else{
        $categorias = false;
    }

    $db->liberar($query);
    $db->close();
    
    return $categorias;
}