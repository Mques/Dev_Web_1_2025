<?php
$array = [
    ["nome" => "Vitor", "sobrenome" => "Padilha"],
    ["nome" => "Vitor", "sobrenome" => "Silva"],
    ["nome" => "Ciclano", "sobrenome" => "Padilha"],
    ["nome" => "Ciclano", "sobrenome" => "Silva"]
];

$resultado = array_map( 
    function ($valor) {
        $valor["nomeCompleto"] = $valor["nome"]." ".$valor["sobrenome"];
        return $valor;
    }, $array
);

var_dump($resultado);
?>
