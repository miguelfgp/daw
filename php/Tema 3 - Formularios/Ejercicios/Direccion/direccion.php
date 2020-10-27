<?php

    $direccion = "";
    
    if(isset($_POST) && !empty($_POST)){
        if(ctype_alpha($_POST['nombre'])){
            if(ctype_digit($_POST['numero'])){
                if(ctype_alpha($_POST['poblacion'])){
                    if(ctype_alpha($_POST['pais'])){
                        $direccion .= $_POST['tipo'] . ' ' . $_POST['nombre'] . ' ' . $_POST['numero'] . '<br>' . $_POST['poblacion'] . ' ' . $_POST['pais'];
                    }
                }
            }
        }
    }

    if (!empty($direccion)){
        echo $direccion;
    } else {
        echo "Introduzca una dirección correcta";
    }

?>