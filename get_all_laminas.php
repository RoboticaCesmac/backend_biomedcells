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

