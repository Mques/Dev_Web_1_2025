<?php
    // Inclui a classe Pai para herança
    include("class_pai.class.php");

    // Classe Funcionario herda de ClassePai
    // Responsável por manipular os dados de funcionário
    class Funcionario extends ClassePai {
        // Atributos da classe
        public $nome;
        public $telefone;
        public $salario;

        // Caminho fixo do arquivo onde os dados são armazenados
        const NOME_ARQUIVO = "../../db/funcionario.txt";

        // Construtor da classe
        // Recebe id, nome, salário e telefone e inicializa o objeto
        public function __construct($id, $nome, $salario, $telefone) {
            // Chama o construtor da ClassePai passando id e caminho do arquivo
            parent::__construct($id, "../../db/funcionario.txt");
            $this->nome = $nome;
            $this->salario = $salario;
            $this->telefone = $telefone;
        }

        // Método estático que retorna um funcionário pelo ID
        static public function pegaPorId($id) {
            // Abre o arquivo de funcionários em modo leitura
            $arquivo = fopen("../../db/funcionario.txt", "r");

            // Percorre o arquivo linha a linha
            while(!feof($arquivo)){
                $linha = fgets($arquivo);
                
                // Se a linha estiver vazia, pula
                if(empty($linha))
                    continue;

                // Separa os dados da linha pelo separador definido na ClassePai
                $dados = explode(self::SEPARADOR, $linha);

                // Verifica se o ID da linha corresponde ao buscado
                if($dados[0] == $id){
                    fclose($arquivo);
                    // Retorna um objeto Funcionario com os dados da linha
                    return new Funcionario($dados[0], $dados[1], $dados[2], $dados[3]);
                }
            }

            // Fecha o arquivo se não encontrar
            fclose($arquivo);
            return null;
        }

        // Método que transforma o objeto em string para salvar no arquivo
        public function __toString(){
            return $this->id . self::SEPARADOR . 
                   $this->nome . self::SEPARADOR . 
                   $this->salario . self::SEPARADOR . 
                   $this->telefone . "\n";
        }
    }
?>
