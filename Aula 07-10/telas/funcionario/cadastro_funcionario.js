// Adiciona um evento "DOMContentLoaded" que garante que o código só será executado após o carregamento completo da página.
document.addEventListener("DOMContentLoaded", (ev) => {     
    // Obtém o formulário de cadastro de funcionário (provavelmente com o ID "formCadastroFuncionario").
    let formCad = document.getElementById("formCadastroFuncionario");
    
    // Obtém o campo de salário (provavelmente com o ID "salario").
    let campoSalario = document.getElementById("salario");
    
    // Adiciona um evento ao formulário para quando ele for enviado (evento 'submit').
    formCad.addEventListener("submit", (ev2) => {
        ev2.preventDefault(); // Previne o comportamento padrão do formulário, que seria enviá-lo.
        
        // Obtém os valores dos campos de nome e telefone.
        let campoNome = document.getElementById("nome");
        let campoTelefone = document.getElementById("telefone");
        
        // Chama a função validaFormulario, passando os valores dos campos.
        // Se a função validaFormulario retornar true, o formulário será enviado (chamando formCad.submit()).
        validaFormulario(campoNome.value, campoSalario.value, campoTelefone.value) ? formCad.submit() : null;
    });
    
    // Adiciona um evento ao campo de salário para cada tecla pressionada (evento 'keyup').
    campoSalario.addEventListener("keyup", (ev2) => {
        // Chama a função validaSalario a cada tecla pressionada no campo salário.
        validaSalario(campoSalario, ev2.key);
    });
});

// Função para validar o formulário. Retorna "true" se os campos forem válidos (aqui está simplificada para sempre retornar "true").
let validaFormulario = (nome, salario, telefone) => {
    return true; // Pode ser expandida com validações adicionais de nome, salário e telefone.
};

// Função para validar o campo de salário enquanto o usuário digita.
let validaSalario = (campoSalario, charDigitado) => {
    // Verifica se o caractere digitado é um número ou uma vírgula. Caso contrário, remove o último caractere.
    if (!["1", "2", "3", "4", "5", "6", "7", "8", "9", "0", ","].find((el) => {
        return charDigitado == el;
    })) {
        // Se o caractere não for número ou vírgula, exclui o último caractere digitado.
        campoSalario.value = campoSalario.value.substring(0, campoSalario.value.length - 2);
    }

    // Verifica se a vírgula já foi digitada antes. Se sim, remove a última vírgula.
    if (charDigitado == "," && campoSalario.value.indexOf(",") < campoSalario.value.length - 1) {
        // Se já houver outra vírgula no campo, remove a última inserida.
        campoSalario.value = campoSalario.value.substring(0, campoSalario.value.length - 1);
    }
};
