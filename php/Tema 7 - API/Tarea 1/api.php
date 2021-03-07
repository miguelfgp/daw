<?php

    require 'clubBasket.php';
    require 'lib/request.php';

    $request_method = $_SERVER['REQUEST_METHOD'];

    if($request_method=='PUT'){

        $data = ['id', 'nombreJugador', 'posicion', 'numero', 'edad'];
        $request = new Request($_GET, $data);
        $club = new Club();

        if ($request->validate()){

            if (is_numeric($_GET['id']) && is_numeric($_GET['numero']) && is_numeric($_GET['edad'])){

                $json = json_encode($_GET);

                if ($club->updatePlayer($json)){
                    echo 'La actualización se realizó correctamente';
                } else {
                    echo 'La actualización ha fallado';
                }
            }
        }
    }


?>