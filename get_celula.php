<?php

  
require_once 'init.php';

TTransaction::open('sample');

$repository = new TRepository('Celula');

$celulas = $repository->load();

$json_celulas = [];

foreach($celulas as $celula)
{
    $celula_array = $celula->toArray();
    $celula_json = json_encode($celula_array);
    $json_celulas[] = $celula_json;
}

var_dump($json_celulas);

TTransaction::close();