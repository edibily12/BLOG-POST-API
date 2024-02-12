<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

require_once __DIR__."/../../models/Category.php";

$category = new Category();
$res = $category->index();

$rows = $res->num_rows;

if ($rows > 0){
    $categories_array = array();
    $categories_array['data'] = array();

    while ($row = $res->fetch_assoc()){
        extract($row);

        $category_item = array(
            'id' => $id,
            'name' => $name,
            'created_at' => $created_at,
        );

        $categories_array['data'][] = $category_item;
    }

    echo json_encode($categories_array, JSON_THROW_ON_ERROR);
} else {
    // Added 'echo' to output the JSON string
    echo json_encode(['message' => 'No Categories found'], JSON_THROW_ON_ERROR);
}

$category->db->closeConnection();
