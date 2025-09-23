<?php
    // Inclui a classe Funcionario, que provavelmente contém métodos para manipulação de dados de funcionários.
    include("../../model/funcionario.class.php");

    // Função para cadastrar um novo funcionário.
    // Recebe os parâmetros: nome, salário e telefone do funcionário.
    function cadastrarFuncionario($nome, $salario, $telefone) {
        // Cria um novo objeto Funcionario com os dados recebidos.
        $funcionario = new Funcionario(null, $nome, $salario, $telefone);

        // Chama o método "cadastrar" da classe Funcionario para salvar o funcionário no banco de dados ou arquivo.
        $funcionario->cadastrar();
    }

    // Função para pegar um funcionário pelo seu ID.
    // Recebe o ID do funcionário como parâmetro e retorna o objeto Funcionario correspondente.
    function pegaFuncionarioPeloId($id) {
        // Chama o método estático "pegaPorId" da classe Funcionario e retorna o funcionário.
        return Funcionario::pegaPorId($id);
    }

    // Função para alterar os dados de um funcionário existente.
    // Recebe o ID do funcionário, novo nome, novo salário e novo telefone.
    function alterarFuncionario($id, $novoNome, $novoSalario, $novoTelefone) {
        // Chama o método "pegaPorId" para pegar o funcionário que será alterado.
        $funcionario = Funcionario::pegaPorId($id);

        // Se o funcionário for encontrado (não for nulo), atualiza seus dados.
        if ($funcionario) {
            $funcionario->nome = $novoNome;
            $funcionario->salario = $novoSalario;
            $funcionario->telefone = $novoTelefone;

            // Chama o método "alterar" para salvar as mudanças no banco de dados ou arquivo.
            $funcionario->alterar();
        }
    }

    // Função para remover um funcionário com base no seu ID.
    // Recebe o ID do funcionário que será removido.
    function removerFuncionario($id) {
        // Chama o método "pegaPorId" para pegar o funcionário que será removido.
        $funcionario = Funcionario::pegaPorId($id);

        // Se o funcionário for encontrado (não for nulo), chama o método "remover" para excluir o funcionário.
        if ($funcionario) {
            $funcionario->remover();
        }
    }

    // Função para listar os funcionários com base em um filtro de nome.
    // Recebe o parâmetro "filtroNome" para buscar funcionários com nomes que contenham o valor fornecido.
    function listarFuncionario($filtroNome) {
        // Chama o método "listar" da classe Funcionario com o filtro de nome para recuperar a lista de funcionários.
        $funcionarios = Funcionario::listar($filtroNome);

        // Exibe os dados dos funcionários em uma tabela HTML.
        echo "<table><thead><tr><th>Nome</th><th>Salário</th><th>Telefone</th>";
        echo "<th>Ações</th>"; // Coluna para as ações, como editar ou remover.
        echo "</tr></thead><tbody>";

        // Loop para exibir cada funcionário na tabela.
        foreach($funcionarios as $funcionario) {
            echo "<tr><td>".$funcionario->nome."</td>";  // Exibe o nome do funcionário.
            echo "<td>".$funcionario->salario."</td>";    // Exibe o salário do funcionário.
            echo "<td>".$funcionario->telefone."</td>";   // Exibe o telefone do funcionário.
            
            // Exibe um link para alterar os dados do funcionário. O link inclui o ID do funcionário como parâmetro na URL.
            echo "<td><a href='http://localhost:81/Aula%2007-10/telas/funcionario/cadastro_funcionario.php?id=".$funcionario->id."'>Alterar</a></td>";
            echo "</tr>";
        }
        echo "</tbody></table>";  // Finaliza a tabela de listagem.
    }

    // Função para listar todos os funcionários, sem filtro de nome.
    function listarTodosFuncionarios() {
        // Chama o método "listar" da classe Funcionario, passando uma string vazia como filtro para retornar todos os funcionários.
        return Funcionario::listar("");
    }

?>
