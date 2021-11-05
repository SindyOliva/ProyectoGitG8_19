<?php
    header('Content-Type: application/json');

    require_once("../config/conexion.php");
    require_once("../models/Socios.php");
    $socios =new Socios();

    $body = json_decode(file_get_contents("php://input"), true);

    switch($_GET["op"]){
        case "GetSocios":  //para obtener todos los registros
            $datos=$socios->get_socios();
            echo json_encode($datos);
            break;
        
        case "GetUno":   //para obtener un registro en especifico
            $datos=$socios->get_socio($body["id"]);
            echo json_encode($datos);
            break;
        
        case "InsertSocio":    //para insertar registros
            $datos=$socios->insert_socio($body["id"],$body["nombre"],$body["razon_social"],$body["direccion"],$body["tipo_socio"],$body["contacto"],$body["email"],$body["fecha_creado"],$body["estado"],$body["telefono"]); 
            echo json_encode("Socio Agregado");
        break;    
        case "DeleteUno":      //para eliminar un registro
            $datos=$socios->delete_socio($body["id"]);  
            echo json_encode("Socio Eliminado");   
        break; 
        case "UpdateUno":      //para actualizar un registro
            $datos=$socios->update_socio($body["id"],$body["nombre"],$body["razon_social"],$body["direccion"],$body["tipo_socio"],$body["contacto"],$body["email"],$body["fecha_creado"],$body["estado"],$body["telefono"]); 
            echo json_encode("Socio Actualizado");
        break;

    }

?>