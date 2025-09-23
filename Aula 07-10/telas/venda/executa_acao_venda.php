<?php
  // Inclui os serviços necessários para manipular dados de funcionários
  include("../../service/funcionario.service.php");

  // Recebe os dados enviados pelo formulário
  $acao = $_POST['acao'];  // Ação que será executada (cadastrar, alterar, remover)
  $nome = isset($_POST['nome']) ? $_POST['nome'] : null; // Nome do funcionário
  $salario = isset($_POST['salario']) ? $_POST['salario'] : null; // Salário do funcionário
  $telefone = isset($_POST['telefone']) ? $_POST['telefone'] : null; // Telefone do funcionário
  $id = isset($_POST['id']) ? $_POST['id'] : null; // ID do funcionário (somente para alterar ou remover)

  // Verifica qual ação foi solicitada e executa a função correspondente
  if($acao == "cadastrar") {
    // Se a ação for "cadastrar", chama a função cadastrarFuncionario passando os dados recebidos
    cadastrarFuncionario($nome, $salario, $telefone);
    echo "Cadastrado com sucesso"; // Exibe uma mensagem de sucesso após o cadastro

  } else if($acao == "alterar") {
    // Se a ação for "alterar", chama a função alterarFuncionario passando o ID do funcionário e os dados atualizados
    alterarFuncionario($id, $nome, $salario, $telefone);
    echo "Alterado com sucesso"; // Exibe uma mensagem de sucesso após a alteração

  } else if($acao == "remover") {
    // Se a ação for "remover", chama a função removerFuncionario passando o ID do funcionário
    removerFuncionario($id);
    echo "Removido com sucesso"; // Exibe uma mensagem de sucesso após a remoção

  } else {
    // Caso a ação não seja válida, exibe uma mensagem de erro
    echo "Ação inválida";
  }
?>
