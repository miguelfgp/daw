<?php
    $var = NULL;

    if(empty($var)){
        echo 'La variable está vacía<br>';
    }

    if(is_null($var)){
        echo 'La variable es NULL<br>';
    }

    if(isset($var)){
        echo 'isset me dice true<br>';
    }