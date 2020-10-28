<?php


    if(isset($_POST) && !empty($_POST)){
        echo '<h1>' . $_POST['nombre'] . ' ' . $_POST['apellidos'] . '</h1>';
        echo '<h2>' . $_POST['curso'] . ' ' . $_POST['ciclo'] . '</h2>';

        $calificaciones = array();

        $calificaciones[] = $_POST['prog'];
        $calificaciones[] = $_POST['ed'];
        $calificaciones[] = $_POST['llmm'];
        $calificaciones[] = $_POST['bbdd'];

        $notaMedia = 0;
        $notaMax = 0;
        $notaMin = 10;

        foreach ($calificaciones as $nota){
            $notaMedia += $nota; 
            if ($nota > $notaMax){
                $notaMax = $nota;
            }

            if ($nota < $notaMin){
                $notaMin = $nota;
            }
        }

        $notaMedia /= sizeof($calificaciones);

        echo '<h3>Nota media: ' . $notaMedia . '</h3>';
        echo '<h3>Nota más alta: ' . $notaMax . '</h3>';
        echo '<h3>Nota más baja: ' . $notaMin . '</h3>';
    }
?>