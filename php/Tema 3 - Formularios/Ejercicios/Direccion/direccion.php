<?php

    $direccion = "";
    
    /* 
        He quitado las comprobaciones por PHP al no admitir caracteres especiales (Palabras con tilde y ñ) 
        y las he realizado en HTML con pattern
    */

    if(isset($_POST) && !empty($_POST)){
        $direccion .= $_POST['tipo'] . ' ' . $_POST['nombre'] . ' ' . $_POST['numero'] . '<br>' . $_POST['poblacion'] . ' ' . $_POST['pais'];
    }
 

    if (!empty($direccion)){
        echo $direccion;
    } else {
        echo "Introduzca una dirección correcta";
    }

?>