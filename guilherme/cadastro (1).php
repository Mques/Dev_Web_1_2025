<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="cadastro.php" method="post">
        <label for="">Nome do produto</label>
        <input type="text" name="nome">
        <select name="categoria">
            <option value="limpeza">Limpeza</option>
            <option value="Cereais">Cereais</option>
            <option value="Armarinho">Armarinho</option>
        </select>
        <label for="">Fabricante</label>
        <input type="text" name="fabricante">
        <button type="submit">Cadastrar</button>
    </form>
    <form method="post">
    <button type="submit" name="apagar">Apagar todos os produtos</button>
</form>
    <?php
    session_start();
    if (isset($_POST["apagar"])) {
        session_destroy();
    }
    if(!(isset($_SESSION["produtos"]))){
        $_SESSION["produtos"]=[];
}
if(isset($_POST["nome"])&& isset($_POST["categoria"]) && $_POST["fabricante"]){
$nome=$_POST["nome"];
$categoria=$_POST["categoria"];
$fabricante=$_POST["fabricante"];
$produto=[
    "nome" => $nome,
    "categoria" => $categoria,
    "fabricante" =>$fabricante];

$_SESSION["produtos"][]=$produto;
}


?>
<a href="lista.php">IE</a>


</body>
</html>