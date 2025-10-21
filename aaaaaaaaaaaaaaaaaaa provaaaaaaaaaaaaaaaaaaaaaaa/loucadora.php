<?php
class cliente {
    protected $nome;
    protected $cpf;
    protected $telefone;

    public function __construct($nome, $cpf, $telefone){
        $this->nome = $nome;
        $this->cpf = $cpf;
        $this->telefone = $telefone;
    }
    public function getNome(){
        return $this->nome; 
    }
    public function exibirDados(){
      return "Cliente: {$this->nome} | CPF: {$this->cpf} | Telefone: {$this->telefone}";
    }

}
abstract class veiculo {
    protected $marca;
    protected $modelo;
    protected $ano;
    protected $disponivel;

    public function __construct($marca, $modelo, $ano, $disponivel){
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->ano = $ano;
        $this->disponivel = true;
    }
    public function alugar(){
        $this->disponivel = false;
    }
    public function devolver(){
        $this->disponivel = true;
    }
    public function isDisponivel(){
        return $this->disponivel;
    }
    abstract public function exibirDados();
}
class carro extends veiculo {
    private $qtdPortas;

    public function __construct($marca, $modelo, $ano, $disponivel, $qtdPortas){
        parent::__construct($marca, $modelo, $ano, $disponivel);
        $this->qtdPortas = $qtdPortas;
    }

    public function exibirDados(){
        $disponibilidade = $this->isDisponivel();
        return "Carro: {$this->marca} {$this->modelo} ({$this->ano}) - Portas: {$this->qtdPortas} - Status: {$disponibilidade}";
    }
}
class moto extends veiculo {
    private $cilindradas;

    public function __construct($marca, $modelo, $ano, $disponivel, $cilindradas){
        parent::__construct($marca, $modelo, $ano, $disponivel);
        $this->cilindradas = $cilindradas;
    }

    public function exibirDados(){
        $disponibilidade = $this->isDisponivel();
        return "Moto: {$this->marca} {$this->modelo} ({$this->ano}) - Cilindradas: {$this->cilindradas}cc - Status: {$disponibilidade}";
    }
}
class locacao {
    private $cliente;
    public $veiculo;
    private $dias;
    private $valorDiaria;

    public function __construct($cliente, $veiculo, $dias, $valorDiaria){
        $this->cliente = $cliente;
        $this->veiculo = $veiculo;
        $this->dias = $dias;
        $this->valorDiaria = $valorDiaria;
    }
    public function calcularTotal(){
        return $this->dias * $this->valorDiaria;
    }
    public function finalizar(){
        $this-> disponivel=true;
    }
    public function exibirResumo(){
        return "Locação de {$this->veiculo->exibirDados()} para {$this->cliente->exibirDados()} a {$this->valorDiaria} por dia";
    }
}
class locadora {
    private $clientes = [];
    private $veiculos = [];
    private $locacoes = [];

    public function adicionarCliente($c){
        $this->clientes[] = $c;
    }
    public function adicionarVeiculo($v){
        $this->veiculos[] = $v;
    }
    public function registrarLocacao($l){
        $this->locacoes[] = $l;
        $l->veiculo->alugar();
    }
    public function registrarDevolucao($l){
        $l->finalizar();
    }
    public function listarVeiculosDisponiveis(){
        foreach($this->veiculos as $v){
            if($v->isDisponivel()){
                echo $v->exibirDados() . "\n";
            }
        }
    }
    public function listarLocacoes(){
        foreach($this->locacoes as $l){
            echo $l->exibirResumo() . "\n";
        }
    }
}
$locadora = new locadora();
$c1 = new cliente("João Silva", "123.456.789-00", "(11) 98765-4321");
$c2 = new cliente("Maria Souza", "987.654.321-00", "(11) 91234-5678");
$c3 = new cliente("Pedro Santos", "456.789.123-00", "(11) 99876-5432");
$locadora->adicionarCliente($c1);
$locadora->adicionarCliente($c2);
$locadora->adicionarCliente($c3);
$v1 = new carro("Toyota", "Corolla", 2020, true, 4);
$v2 = new moto("Honda", "CB500", 2019, true, 500);
$v3 = new carro("Ford", "Fiesta", 2018, true,   2);
$v4 = new moto("Yamaha", "YZF-R3", 2021, true, 321);
$locadora->adicionarVeiculo($v1);
$locadora->adicionarVeiculo($v2);
$locadora->adicionarVeiculo($v3);
$locadora->adicionarVeiculo($v4);
$l1= new locacao ($c1, $v1, 5, 150);
$l2= new locacao ($c2, $v2, 3, 100);
$locadora->registrarLocacao($l1);
$locadora->registrarLocacao($l2);
$locadora->listarLocacoes();
$locadora->listarVeiculosDisponiveis();
?>