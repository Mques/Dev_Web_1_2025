<?php
    // Classe Produto herda de ClassePai
    // Responsável por representar e manipular os dados de um produto
    class Produto extends ClassePai {
        // Atributos da classe
        public $nome;
        public $preco;

        // Método que monta a linha de dados para salvar no arquivo
        // Concatena id, nome e preço separados pelo SEPARADOR da ClassePai
        function montaLinhaDados()
        {
            return $this->id . self::SEPARADOR . 
                   $this->nome . self::SEPARADOR . 
                   $this->preco;
        }
    }
?>
