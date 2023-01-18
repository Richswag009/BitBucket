<?php
require_once('../vendor/autoload.php');

//Setting upheaders
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: DELETE');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');
use APP\Products;


// Get the data 
$jsonData = json_decode(file_get_contents('php://input'));

$data =[
    'checkbox'=>$jsonData->checkbox
];
$product = Products::delete($data['checkbox']);
var_dump($product);

// $data = json_decode(file_get_contents('php://input'));

// $product = Products::delete($data->checkbox);
// var_dump($product);
