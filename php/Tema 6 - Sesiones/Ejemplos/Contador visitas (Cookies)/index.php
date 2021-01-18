<html>
<head>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <?php

        if(!isset($_COOKIE['numVisitas'])){
            setcookie('numVisitas', 0);
        } else {
            $visita = ++$_COOKIE['numVisitas'];
            setcookie('numVisitas', $visita);
        }

        print_r($_COOKIE['numVisitas']);        

    ?>
</body>
</html>