<?php
  // Inclui o arquivo de serviço que contém as funções para manipulação de funcionários.
  include("../../service/funcionario.service.php");

  // Recebe o valor da ação (cadastrar, alterar ou remover) do formulário enviado via POST.
  $acao = $_POST['acao'];

  // Recebe os dados do formulário. Se algum dado não for enviado, ele será tratado como nulo.
  $nome = isset($_POST['nome']) ? $_POST['nome'] : null;
  $salario = isset($_POST['salario']) ? $_POST['salario'] : null;
  $telefone = isset($_POST['telefone']) ? $_POST['telefone'] : null;
  $id = isset($_POST['id']) ? $_POST['id'] : null;

  // Verifica qual ação foi solicitada.
  if ($acao == "cadastrar") {
    // Se a ação for cadastrar, chama a função para cadastrar o funcionário.
    cadastrarFuncionario($nome, $salario, $telefone);
    echo "Cadastrado com sucesso"; // Retorna uma mensagem de sucesso.

  } else if ($acao == "alterar") {
    // Se a ação for alterar, chama a função para alterar os dados do funcionário com o ID especificado.
    alterarFuncionario($id, $nome, $salario, $telefone);
    echo "Alterado com sucesso"; // Retorna uma mensagem de sucesso.

  } else if ($acao == "remover") {
    // Se a ação for remover, chama a função para remover o funcionário com o ID especificado.
    removerFuncionario($id);
    echo "Removido com sucesso"; // Retorna uma mensagem de sucesso.

  } else {
    // Se a ação não for reconhecida, retorna uma mensagem de erro.
    echo "Ação inválida";
  }
?>
