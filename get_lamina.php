<?php

require_once 'init.php';

header('Content-Type: application/json');

TTransaction::open('sample');

$repository = new TRepository('Lamina');

$laminas = $repository->load();

$json_laminas = [];

foreach($laminas as $lamina) 
{
    $json_laminas[] = $lamina->toArray(); 
}

TTransaction::close();

echo json_encode($json_laminas);

// $lamina = new Lamina($_GET['id']);
// $lamina_array = $lamina->toArray();
// $lamina_json = json_encode($lamina_array);
// echo $lamina_json;
