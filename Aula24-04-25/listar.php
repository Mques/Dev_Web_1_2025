<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        session_start();
        foreach ($_SESSION["produtos"] as $element => $value) {
            echo $element . "   ---   ";
        }
        echo "<br> --> " . $_SESSION["produtos"][1];
    ?>
</body>
</html>