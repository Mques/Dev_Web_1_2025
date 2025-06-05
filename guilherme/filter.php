<?php
$array = [
    ["nome" => "Vitor", "sobrenome" => "Padilha"],
    ["nome" => "Vitor", "sobrenome" => "Silva"],
    ["nome" => "Ciclano", "sobrenome" => "Padilha"],
    ["nome" => "Ciclano", "sobrenome" => "Silva"]
];

$resultado = array_filter(
    $array, 
    function ($valor, $indice) {
        return $valor["sobrenome"] == "Padilha"&& str_contains($valor["nome"],"t");
    },
    ARRAY_FILTER_USE_BOTH //isso ele n ensinou,mas se usa para usar 2 parametros na função
);

var_dump($resultado);
?>

