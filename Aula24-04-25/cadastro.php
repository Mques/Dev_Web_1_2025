<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="get">
        <input name="produto" type="text" placeholder="produto"><br>
        <select name="categoria" id="">
            <option value="limpeza">Limpeza</option>
            <option value="cereais">Cereais</option>
            <option value="armarinho">Armarinho</option>
        </select><br>
        <input name="fabricante" type="text" placeholder="fabricante"><br>
        <button type="submit">Enviar</button>
    </form>
    <?php
        session_start();
        if (!empty($_GET["produto"]) && !empty($_GET["categoria"]) && !empty($_GET["fabricante"])) {
            $_SESSION["produtos"] = [$_GET["produto"], $_GET["categoria"], $_GET["fabricante"]];
        }
        else {
            echo "teste'nt";
        }
    ?>
</body>
</html>