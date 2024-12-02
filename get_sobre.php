<?php

require_once 'init.php';

header('Content-Type: application/json');

TTransaction::open('sample');

$id = 1;
$sobre = new Sobre($id);
$sobre_array = $sobre->toArray();
$sobre_json = json_encode($sobre_array);
echo $sobre_json;

TTransaction::close();
