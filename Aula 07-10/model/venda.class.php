<?php
    // Inclui os arquivos de outras classes que serão usadas.
    include_once("class_pai.class.php");  // ClassePai é a classe base para todas as outras.
    include_once("cliente.class.php");    // Classe Cliente, para manipular dados de clientes.
    include_once("funcionario.class.php"); // Classe Funcionario, para manipular dados de funcionários.
    include_once("produto.class.php");    // Classe Produto, para manipular dados de produtos.

    // A classe "Venda" herda de "ClassePai", o que significa que ela herda todos os métodos e atributos dessa classe.
    class Venda extends ClassePai {

        // Atributo público que vai armazenar o objeto do Cliente relacionado à venda.
        public $cliente;
        
        // Atributo público que vai armazenar o objeto do Funcionario (vendedor) relacionado à venda.
        public $vendedor; // tipo Funcionario
        
        // Atributo público que vai armazenar um array com os produtos vendidos nesta venda.
        public $produtosVendidos;
        
        // Atributo público que vai armazenar o valor total da venda.
        public $valorTotal;

        // Método responsável por montar a linha de dados que será salva no arquivo.
        // Este método é obrigatório, pois a classe "Venda" herda de "ClassePai" e implementa a função "montaLinhaDados".
        function montaLinhaDados()
        {
            // Concatena todos os dados da venda em uma string.
            // Usei o "SEPARADOR" definido na classe Pai para separar os dados.
            $linha =
                $this->id                  // ID da venda.
                .self::SEPARADOR            // Separa os dados com o caractere "#".
                .$this->cliente->id         // ID do cliente que fez a compra.
                .self::SEPARADOR
                .$this->vendedor->id        // ID do vendedor que fez a venda.
                .self::SEPARADOR
                .$this->valorTotal          // Valor total da venda.
                .self::SEPARADOR;

            // Loop para adicionar os IDs dos produtos vendidos, um por um.
            foreach($this->produtosVendidos as $produto) {
                $linha .= $produto->id . self::SEPARADOR; // Adiciona o ID de cada produto, separando com "#".
            }

            // Retorna a linha final formatada, removendo o último separador "#".
            return rtrim($linha, self::SEPARADOR);
        }

        // Construtor da classe "Venda".
        // Recebe os dados necessários para criar uma nova venda.
        public function __construct($id, $cliente, $vendedor, $produtosVendidos, $valorTotal) {
            // Chama o construtor da classe Pai (ClassePai), passando o ID e o nome do arquivo onde os dados serão salvos.
            parent::__construct($id, "../../db/venda.txt");
            
            // Atribui os valores recebidos aos atributos da classe.
            $this->cliente = $cliente;
            $this->vendedor = $vendedor;
            $this->produtosVendidos = $produtosVendidos;
            $this->valorTotal = $valorTotal;
        }

        // Método estático "pegaPorId" para recuperar uma venda pelo seu ID.
        // Ele lê o arquivo de vendas e encontra a linha correspondente ao ID fornecido.
        static public function pegaPorId($id) {
            // Abre o arquivo de vendas no modo leitura.
            $arquivo = fopen("../../db/venda.txt", "r");
            
            // Loop para ler o arquivo linha por linha.
            while(!feof($arquivo)){
                $linha = fgets($arquivo);  // Lê uma linha do arquivo.
                
                // Se a linha estiver vazia, ignora e continua para a próxima.
                if(empty($linha))
                    continue;

                // Separa os dados da linha usando o separador "#" definido na classe Pai.
                $dados = explode(self::SEPARADOR, $linha);
                
                // Se o primeiro dado (ID da venda) corresponder ao ID procurado, retorna a venda.
                if($dados[0] == $id){
                    fclose($arquivo);  // Fecha o arquivo após encontrar a venda.

                    // Recupera os IDs dos produtos vendidos, que começam a partir do 4º elemento da linha.
                    $idsProdutos = array_slice($dados, 4, count($dados));

                    // Retorna um novo objeto "Venda", passando os dados encontrados no arquivo.
                    return new Venda($dados[0], Cliente::pegaPorId($dados[1]), Funcionario::pegaPorId($dados[2]), Produto::pegaPorIds($idsProdutos), $dados[3]);
                }
            }
            
            // Se não encontrar a venda, fecha o arquivo.
            fclose($arquivo);
        }

        // Método estático "pegaPorIds" que recebe um array de IDs de produtos e retorna um array de objetos Produto.
        static function pegaPorIds($ids) {
            // Array para armazenar os produtos encontrados.
            $retorno = [];
            
            // Loop que itera pelos IDs de produtos e chama o método "pegaPorId" de cada produto.
            foreach($ids as $id) {
                // Adiciona o produto encontrado no array de retorno.
                array_push($retorno, Produto::pegaPorId($id));
            }
            
            // Retorna o array com os produtos.
            return $retorno;
        }
    }
?>
