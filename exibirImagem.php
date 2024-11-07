<?php

require_once 'init.php';
// exibirImagem.php
$id = $_GET['id'];
$type = $_GET['type'];

try {

    TTransaction::open('sample'); // Abre a transação
    $object = new Lamina($id); // Busca o objeto Lamina

    var_dump($type);

    if ($object && $object->imagem) {
        // Configura o cabeçalho correto para o tipo de imagem (assumindo jpeg, altere conforme necessário)
        header("Content-Type: image/{$type}");
        echo $object->imagem; // Exibe a imagem
    } else {
        echo "Imagem não encontrada.";
    }
    TTransaction::close(); // Fecha a transação
} catch (Exception $e) {
    echo $e->getMessage();
    TTransaction::rollback(); // Desfaz as operações em caso de erro
}
?>
