<?php

    require 'clubBasket.php';
    require 'lib/request.php';

    $request_method = $_SERVER['REQUEST_METHOD'];

    if($request_method){
        $club = new Club();
        if($request_method=='PUT'){

            $data = ['id', 'nombreJugador', 'posicion', 'numero', 'edad'];
            $request = new Request($_GET, $data);
    
            if ($request->validate()){
    
                if (is_numeric($_GET['id']) && is_numeric($_GET['numero']) && is_numeric($_GET['edad'])){
    
                    $json = json_encode($_GET);
    
                    if ($club->updatePlayer($json)){
                        echo 'El jugador se ha modificado correctamente';
                    } else {
                        echo 'La actualización ha fallado';
                    }
                }
            }
        } else if($request_method=='DELETE'){
            $data = ['id'];
            $request = new Request($_GET, $data);

            if ($request->validate()){
    
                if (is_numeric($_GET['id'])){
    
                    $id = $_GET['id'];
    
                    if ($club->deletePlayer($id)){
                        echo 'El jugador se ha eliminado correctamente';
                    } else {
                        echo 'La eliminación ha fallado';
                    }
                }
            }
        }
    } else {
        echo 'La API no se ha llamado correctamente';
    }

?>