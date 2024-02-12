<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

require_once __DIR__."/../../models/Category.php";

$category = new Category();

$category->id = $_GET['id'] ?? die();

$category->show();

$category_arr = array(
  'id' => $category->id,
    'name' => $category->name,
    'created_at' => $category->created_at
);

echo json_encode($category_arr, JSON_THROW_ON_ERROR);

$category->db->closeConnection();