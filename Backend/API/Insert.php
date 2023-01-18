<?php
require_once("../vendor/autoload.php");

// Required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$productType = [
    "Book" => 'APP\Book',
    "Furniture" => 'APP\Furniture',
    "DVD" => 'APP\DVD'
];

//Get the data from POST method
$data = json_decode(file_get_contents('php://input'));



// $product
$product= new $productType[$data->type]($data);
if($product->create()){
    var_dump($data);
};
