<?php


header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: PUT");

global $data, $category;
require_once "category_data.php"; //include Category model

// Get raw posted data
$category->id = htmlspecialchars(strip_tags($data->id));
$category->name = htmlspecialchars(strip_tags($data->name));

// Attempt to update the post
if ($category->update()) {
    echo json_encode(array('message' => 'Category Updated Successfully'), JSON_THROW_ON_ERROR);
} else {
    echo json_encode(array('error' => 'Something went wrong'), JSON_THROW_ON_ERROR);
}
