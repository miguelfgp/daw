<html>
<body>
<table>
<?php  
    $numero=1;
    define('TAM', 10);
    for ($fila = 1; $fila <= TAM; $fila++){
        if ($fila%2==0)
            echo '<tr bgcolor="#808080">';
        else
            echo '<tr bgcolor="#FFFFFF">';
        for ($columna=1; $columna <= TAM; $columna++){
            echo '<td>';
            echo $numero;
            $numero++;
            echo '</td>';
        }
        echo '</tr>';
    }
?>
</table>
</body>
</html>