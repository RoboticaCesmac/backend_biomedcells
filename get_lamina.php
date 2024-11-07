<?php

  
require_once 'init.php';

TTransaction::open('sample');

$repository = new TRepository('Lamina');

$laminas = $repository->load();

$json_laminas = [];

foreach($laminas as $lamina)
{
    $lamina_array = $lamina->toArray();
    $lamina_json = json_encode($lamina_array);
    $json_laminas[] = $lamina_json;
}

var_dump($json_laminas);

TTransaction::close();