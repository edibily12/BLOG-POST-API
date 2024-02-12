<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Access-Control-Allow-Headers, Access-Control-Request-Methods, Authorization, X-Requested-With, Content-Type");

global $data, $category;
require_once "category_data.php"; //include Category model

// Get raw posted data
$category->name = htmlspecialchars(strip_tags($data->name));


if ($category->create()){
    echo json_encode(array('message' => 'Category Created Successfully'), JSON_THROW_ON_ERROR);
}else{
    echo json_encode(array('error' => 'Something went wrong'), JSON_THROW_ON_ERROR);
}
