<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Funcionário</title>
    <script src="cadastro_funcionario.js"></script>
</head>
<body>
<?php
  // Inclui os arquivos de serviço necessários para manipulação de dados.
  include("../../service/funcionario.service.php");
  include("../../service/venda.service.php");

  // Se o ID da venda foi passado na URL, busca a venda correspondente.
  $venda = "";
  if(isset($_GET["id"]))
      $venda = pegaVendaPeloId($_GET["id"]);
?>
    <!-- Formulário de cadastro/alteração de venda -->
    <form id="formCadastroVenda" action="executa_acao_venda.php" method="post">
        <!-- Define a ação a ser tomada (cadastrar ou alterar) -->
        <input type="hidden" name="acao" value="<?php if(!empty($venda)) { echo "alterar"; } else echo "cadastrar"; ?>"/>
        
        <!-- Se o ID da venda foi passado, inclua o ID da venda no formulário -->
        <input type="hidden" name="id" value="<?php echo isset($_GET["id"]) ? $_GET["id"] : ""; ?>"/>
        
        <!-- Campo de seleção para escolher o funcionário que realizou a venda -->
        <label for="nome">Funcionário que realizou a venda:</label>
        <select name="funcionario">
            <?php
                // Lista todos os funcionários para selecionar qual funcionário fez a venda
                $funcionarios = listarTodosFuncionarios();
                foreach($funcionarios as $funcionario){
                    // Exibe cada funcionário como uma opção no dropdown
                    echo "<option value=\"".$funcionario->id."\">".$funcionario->nome."</option>";
                }
            ?>
        </select>
        
        <!-- Botão para submeter o formulário, a ação será "Alterar" ou "Cadastrar" -->
        <button type="submit"><?php if(!empty($venda)) { echo "Alterar"; } else echo "Cadastrar"; ?></button>
    </form>
</body>
</html>
