<?php

require 'nba.php';
require 'lib/request.php';

$request_method = $_SERVER['REQUEST_METHOD'];

if($request_method){
    $nba = new NBA();
    if($request_method=='GET'){
        $request = new Request($_GET);

        $select = null;

        if ($request->validate('Nombre')){
            $nombre = $_GET['Nombre'];
            $select = $nba->selectTeamByTeam($nombre);
        } else if ($request->validate('Ciudad')){
            $ciudad = $_GET['Ciudad'];
            $select = $nba->selectTeamByCity($ciudad);
        } else if ($request->validate('Conferencia')){
            $conferencia = $_GET['Conferencia'];
            $select = $nba->selectTeamByConference($conferencia);
        } else if ($request->validate('Division')){
            $division = $_GET['Division'];
            $select = $nba->selectTeamByDivision($division);
        }

        if ($select){
            $json = json_encode($select, true);
            echo $json;
        } else {
            echo 'La selección ha fallado';
        }
    } else if ($request_method=='POST'){

        $data = ['Nombre', 'Ciudad', 'Conferencia', 'Division'];
        $request = new Request($_POST);
        $validate = true;
        $i = 0;

        while ($i < sizeof($data) && $validate){
            $validate = $request->validate($data[$i]);
            $i++;
        }
        
        if ($validate){
            $json = json_encode($_POST);
            if ($nba->insertTeam($json)){
                $nombre = $_POST['Nombre'];
                $select = $nba->selectTeamByTeam($nombre);
                if ($select){
                    $json = json_encode($select, true);
                    echo $json;
                } else {
                    echo 'El equipo se ha creado pero no se ha podido mostrar';
                }
            } else {
                echo 'El equipo no se ha podido crear';
            }
        } else {
            echo 'La API no se ha llamado correctamente';
        }
    } else if($request_method=='PUT'){

        $data = ['Nombre', 'Ciudad', 'Conferencia', 'Division', 'nombreNuevo'];
        $request = new Request($_GET);
        $validate = true;
        $i = 0;

        while ($i < sizeof($data) && $validate){
            $validate = $request->validate($data[$i]);
            $i++;
        }
        
        if ($validate){
            $json = json_encode($_GET);
            if ($nba->updateTeam($json)){
                $nombre = $_GET['Nombre'];
                $select = $nba->selectTeamByTeam($nombre);
                if ($select){
                    $json = json_encode($select, true);
                    echo $json;
                } else {
                    echo 'El equipo se ha actualizado pero no se ha podido mostrar';
                }
            } else {
                echo 'El equipo no se ha podido actualizar';
            }
        } else {
            echo 'La API no se ha llamado correctamente';
        }
    } else if($request_method=='DELETE'){
        $request = new Request($_GET);

        if ($request->validate('Nombre')){
            $nombre = $_GET['Nombre'];
            $query = $nba->deleteTeam($nombre);
            if ($query){
                echo 'El equipo se ha eliminado correctamente';
            } else {
                echo 'La eliminación ha fallado';
            }
        }
    } else {
        echo 'La API no se ha llamado correctamente';
    }
} else {
    echo 'La API no se ha llamado correctamente';
}

?>