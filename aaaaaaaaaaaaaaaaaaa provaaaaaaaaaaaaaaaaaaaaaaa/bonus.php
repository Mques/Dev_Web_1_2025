<?php
abstract class funcionario{
    protected $nome;
    protected $salario;

    public function __construct($nome, $salario){
        $this->nome = $nome;
        $this->salario = $salario;
    }

    abstract public function calcularBonus();


    public function getNome(){
        return $this->nome; 
    }
}
    class gerente extends funcionario{
        public function calcularBonus(){
            return $this->salario * 0.20;
        }
    }
    class desenvolvedor extends funcionario{
        public function calcularBonus(){
            return $this->salario * 0.10;
        }
    }
    $funcionarios = [
        new gerente("Carlos", 5000),
        new desenvolvedor("Ana", 4000)
    ];
    foreach($funcionarios as $funcionario){
        echo "Nome: " . $funcionario->getNome();
        echo "Bônus: " . $funcionario->calcularBonus() . "\n";
    }
