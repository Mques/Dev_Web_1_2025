<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Funcionário</title>
    <!-- Inclui o arquivo de script externo 'cadastro_funcionario.js' -->
    <script src="cadastro_funcionario.js"></script>
</head>
<body>
<?php
  // Inclui o arquivo de serviço 'funcionario.service.php' para que possa usar as funções de manipulação de funcionários.
  include("../../service/funcionario.service.php");

  // Variável para armazenar o objeto do funcionário, inicialmente vazia.
  $funcionario = "";

  // Verifica se o parâmetro 'id' está na URL (indicando que a página está sendo acessada para editar um funcionário existente).
  if(isset($_GET["id"])) {
      // Se o 'id' está presente, chama a função 'pegaFuncionarioPeloId' para buscar o funcionário com aquele ID.
      $funcionario = pegaFuncionarioPeloId($_GET["id"]);
  }
?>
    <!-- Formulário para cadastrar ou alterar dados de um funcionário -->
    <form id="formCadastroFuncionario" action="executa_acao_funcionario.php" method="post">
        <!-- Campo oculto que define a ação que será realizada no backend: 'cadastrar' ou 'alterar' -->
        <input type="hidden" name="acao" value="<?php 
            // Se o funcionário existe, significa que estamos alterando. Caso contrário, estamos cadastrando.
            if(!empty($funcionario)) {
                echo "alterar"; 
            } else {
                echo "cadastrar"; 
            }
        ?>"/>

        <!-- Campo oculto para armazenar o ID do funcionário, necessário para alteração -->
        <input type="hidden" name="id" value="<?php echo isset($_GET["id"]) ? $_GET["id"] : "" ?>"/>

        <!-- Campo de texto para o nome do funcionário -->
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" value="<?php 
            // Se estivermos editando um funcionário, preenchemos o campo com o nome atual do funcionário.
            if(!empty($funcionario)) {
                echo $funcionario->nome; 
            }
        ?>"/><br/>

        <!-- Campo de texto para o salário do funcionário -->
        <label for="salario">Salario:</label>
        <input type="text" id="salario" name="salario" value="<?php 
            // Se estivermos editando, preenchemos o campo com o salário atual.
            if(!empty($funcionario)) {
                echo $funcionario->salario; 
            }
        ?>"/>

        <!-- Campo de telefone para o funcionário -->
        <label for="telefone">Telefone:</label>
        <input type="tel" id="telefone" name="telefone" value="<?php 
            // Se estivermos editando, preenchemos o campo com o telefone atual.
            if(!empty($funcionario)) {
                echo $funcionario->telefone; 
            }
        ?>"/>

        <!-- Botão de envio do formulário que muda de texto dependendo da ação (Cadastrar ou Alterar) -->
        <button type="submit">
            <?php 
                // Se estivermos editando um funcionário, o botão exibirá "Alterar", caso contrário "Cadastrar"
                if(!empty($funcionario)) {
                    echo "Alterar"; 
                } else {
                    echo "Cadastrar"; 
                }
            ?>
        </button>
    </form>
</body>
</html>
