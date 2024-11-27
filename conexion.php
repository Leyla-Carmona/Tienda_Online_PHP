<?php
require 'vendor/autoload.php';

$url = 'https://fbkljamdhlvfrwjguezi.supabase.co';
$apiKey = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6ImZia2xqYW1kaGx2ZnJ3amd1ZXppIiwicm9sZSI6ImFub24iLCJpYXQiOjE3MzI3MTIxMDYsImV4cCI6MjA0ODI4ODEwNn0.xNPK1LgBttlrasJcbTL8Z1_qblQktM7yvSjL8cevRpg';

$client = new \Supabase\SupabaseClient($url, $apiKey);

// Consulta ejemplo
$response = $client->from('productos')->select('codigo, nombre, detalle, imagen')->gte('codigo', 10)->execute();

// Verifica el resultado
if ($response->error) {
    echo 'Error: ' . $response->error->message;
} else {
    print_r($response->data);
}
