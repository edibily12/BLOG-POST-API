<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

require_once __DIR__."/../../models/Post.php";

$post = new Post();
$results = $post->post_trashed();

$items = $results->num_rows;

if ($items > 0){
    $posts_array = array();
    $posts_array['data'] = array();

    while ($row = $results->fetch_assoc()){
        extract($row);

        $post_item = array(
            'id' => $id,
            'category_id' => $category_id,
            'category_name' => $category_name,
            'name' => $title,
            'author' => $author,
            'body' => $body,
            'created_at' => $created_at,
            'deleted_at' => $deleted_at,
        );

        $posts_array['data'][] = $post_item;
    }

    echo json_encode($posts_array, JSON_THROW_ON_ERROR);
} else {
    // Added 'echo' to output the JSON string
    echo json_encode(['message' => 'No Categories found'], JSON_THROW_ON_ERROR);
}

$post->db->closeConnection();
