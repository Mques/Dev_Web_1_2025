<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- Formulário para filtrar funcionários -->
    <form method="post">
        <!-- Campo para digitar o nome do funcionário a ser filtrado -->
        <label>Nome:</label><input name="filtro"/>
        <button>Filtrar</button>
    </form>

    <?php
    // Inclui o arquivo de serviço que contém funções de manipulação de funcionários.
    include("../../service/funcionario.service.php");

    // Obtém o valor do filtro (se o formulário foi enviado) ou usa uma string vazia como valor padrão.
    $filtro = isset($_POST["filtro"]) ? $_POST["filtro"] : "";

    // Chama a função 'listarFuncionario' para exibir os resultados com base no filtro.
    listarFuncionario($filtro);
    ?>
</body>
</html>
