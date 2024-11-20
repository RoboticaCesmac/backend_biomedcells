<?php

require_once 'init.php';

header('Content-Type: application/json');

TTransaction::open('sample');

$repository = new TRepository('Lamina');

$laminas = $repository->load();

$count = count($laminas);

$id_aleatorio = rand(1, $count);

$lamina = new Lamina($id_aleatorio);
$lamina_array = $lamina->toArray();
$lamina_json = json_encode($lamina_array);

TTransaction::close();

echo $lamina_json;
