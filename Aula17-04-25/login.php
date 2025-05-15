<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <input placeholder="Usuário" name="usuario" type="text">
        <input placeholder="Senha" name="senha" type="text">
        <button type="submit">Logar</button>
    </form>

    <?php
        if (isset($_POST["usuario"])) {
            $usuario = $_POST["usuario"];
            $senha = $_POST["senha"];

            $contas = [
                'Gabriel' => 1001,
                'Miguel' => "Fortnite"
            ];
            if ($senha == "" || $usuario == "") {
                echo "Por favor, insira os valores";
            }
            else {
                if ($senha == @$contas[$usuario]) {
                    echo "foi";
                }
                else {
                    echo "n foi";
                }
            }
        }
    ?>
</body>
</html>