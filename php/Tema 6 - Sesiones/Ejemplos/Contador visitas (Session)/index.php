<html>
<head>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <?php
        session_start();
        if(!isset($_SESSION['numVisitas'])){
            $_SESSION['numVisitas'] = 0;
        } else {
            $_SESSION['numVisitas']++;
        }

        print_r($_SESSION);
    ?>
</body>
</html>