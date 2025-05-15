<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="get">
       <label for="">Linhas: </label><input type="number" name="linhas"><br>
       <label for="">Colunas: </label><input type="number" name="colunas"><br>
       <button type="submit">Enviar</button>
    </form>
    <?php
        if(isset($_GET["linhas"])) {
            $linhas = $_GET["linhas"];
            $colunas = $_GET["colunas"];
            $i = 0; 
            $j = 0;
    
            echo "<table>";
            for ($i = 0; $i < $linhas; $i++) {
                echo "<tr>";
                for ($j = 0; $j < $colunas; $j++) {
                    // echo '<td style="color: #'. $i . $j . '0;">L' . $i+1 . "C" . $j+1 . "</td>"; 
                    echo "<td>L" . $i+1 . "C" . $j+1 . "</td>"; 
                }
                echo "</tr>";
            }
            echo "</table>";
        }
    ?>
</body>
</html>