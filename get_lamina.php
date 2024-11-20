<?php

require_once 'init.php';

header('Content-Type: application/json');

TTransaction::open('sample');

$lamina = new Lamina($_GET['id']);
$lamina_array = $lamina->toArray();
$lamina_json = json_encode($lamina_array);
echo $lamina_json;

TTransaction::close();
