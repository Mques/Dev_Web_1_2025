<?php

    // Definindo uma classe abstrata chamada "ClassePai".
    // Classes abstratas servem como "molde" para outras classes.
    // Não podemos criar um objeto diretamente de uma classe abstrata,
    // apenas herdar dela e implementar os métodos obrigatórios.
    abstract class ClassePai {

        // Atributo público que identifica cada objeto (ex: id do cliente, produto, etc).
        public $id;

        // Atributo privado que guarda o nome do arquivo TXT onde os dados serão armazenados.
        // Como está "private", só pode ser acessado dentro desta própria classe.
        private $nomeArquivo = "";

        // Constante que define o caractere usado para separar os dados no arquivo.
        // Aqui foi escolhido o "#".
        const SEPARADOR = "#";

        // Constante que guarda um nome de arquivo vazio (parece não estar sendo usada de fato).
        const NOME_ARQUIVO = " ";

        // Construtor da classe. É chamado automaticamente quando criamos um objeto.
        // Ele inicializa o ID e o nome do arquivo que vai armazenar os dados.
        public function __construct($id, $nomeArquivo) {
            $this->id = $id;                   // guarda o ID inicial
            $this->nomeArquivo = $nomeArquivo; // guarda o nome do arquivo
        }

        // Método abstrato. Significa que toda classe filha (que herda desta)
        // será obrigada a criar sua própria versão deste método.
        // Este método deve montar uma linha de dados (string) para salvar no arquivo.
        abstract function montaLinhaDados();

        // Função que encontra o último ID utilizado no arquivo.
        // Serve para não repetir IDs e manter uma sequência crescente.
        public function encontraUltimoId(){
            // Abre o arquivo no modo leitura ("r").
            $arquivo = fopen($this->nomeArquivo, "r");

            // Começamos o contador de ID a partir de 1.
            $idTemp = 1;

            // Lê linha por linha até o fim do arquivo.
            while(!feof($arquivo)){
                $linha = fgets($arquivo); // lê uma linha

                // Se a linha estiver vazia, pula para a próxima.
                if(empty($linha))
                    continue;

                // "explode" quebra a linha em partes, separando pelo caractere "#".
                $dados = explode(self::SEPARADOR, $linha);

                // O primeiro dado da linha é o ID. Convertido para inteiro.
                // Adicionamos +1 para gerar o próximo ID disponível.
                $idTemp = intval($dados[0]) + 1;
            }

            // Atualiza o ID do objeto com o novo valor.
            $this->id = $idTemp;

            // Fecha o arquivo após a leitura (boa prática).
            fclose($arquivo);
        }

        // Função para cadastrar (salvar) um novo registro no arquivo TXT.
        public function cadastrar() {
            // Primeiro encontra qual será o próximo ID disponível.
            $this->encontraUltimoId();

            // Abre o arquivo no modo append ("a"), que adiciona no final sem apagar os dados antigos.
            $arquivo = fopen($this->nomeArquivo, "a");

            // Chama o método montaLinhaDados() (implementado pela classe filha)
            // para transformar o objeto em uma linha de texto formatada.
            $linha = $this->montaLinhaDados();

            // Escreve essa linha no arquivo junto com uma quebra de linha.
            fwrite($arquivo, $linha . PHP_EOL);

            // Fecha o arquivo.
            fclose($arquivo);
        }

        // Função para listar todos os registros armazenados no arquivo TXT.
        public function listar() {
            // Abre o arquivo no modo leitura.
            $arquivo = fopen($this->nomeArquivo, "r");

            // Cria um array para guardar os dados.
            $lista = array();

            // Lê linha por linha do arquivo.
            while(!feof($arquivo)){
                $linha = fgets($arquivo);

                // Pula linhas vazias.
                if(empty($linha))
                    continue;

                // Adiciona a linha no array.
                $lista[] = $linha;
            }

            // Fecha o arquivo.
            fclose($arquivo);

            // Retorna a lista completa.
            return $lista;
        }
    }
?>
