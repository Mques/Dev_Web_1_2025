<?php
    // A classe Cliente herda da ClassePai.
    // Isso significa que ela já possui todos os atributos e métodos da ClassePai,
    // mas pode adicionar novos atributos e implementar métodos obrigatórios.
    class Cliente extends ClassePai {

        // Atributo público para guardar o nome do cliente.
        public $nome;

        // Atributo público para guardar o telefone do cliente.
        public $telefone;

        // Implementação obrigatória do método abstrato "montaLinhaDados",
        // que foi definido na ClassePai.
        // Aqui definimos como os dados de um cliente serão salvos no arquivo TXT.
        function montaLinhaDados()
        {
            // Retorna uma string no formato:
            // ID#NOME#TELEFONE
            // Usamos "self::SEPARADOR" para pegar o caractere "#" definido na ClassePai.
            return $this->id . self::SEPARADOR . $this->nome . self::SEPARADOR . $this->telefone;
        }
    }
?>
