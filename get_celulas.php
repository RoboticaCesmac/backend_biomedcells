<?php

  
require_once 'init.php';

TTransaction::open('sample');

$repository = new TRepository('Celula');

$celulas = $repository->load();

$json_celulas = [];

foreach($celulas as $celula)
{
    $json_celulas[] = $celula->toArray();
}

echo json_encode($json_celulas);

TTransaction::close();