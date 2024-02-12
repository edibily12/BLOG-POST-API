<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

require_once __DIR__."/../../models/Post.php";

$post = new Post();
$res = $post->index();

$rows = $res->num_rows;

if ($rows > 0){
    $posts_array = array();
    $posts_array['data'] = array();

    while ($row = $res->fetch_assoc()){
        extract($row);

        $post_item = array(
            'id' => $id,
            'category_id' => $category_id,
            'category_name' => $category_name,
            'title' => $title,
            'body' => $body,
            'author' => $author,
            'created_at' => $created_at,
        );

        $posts_array['data'][] = $post_item;
    }

    echo json_encode($posts_array, JSON_THROW_ON_ERROR);
} else {
    // Added 'echo' to output the JSON string
    echo json_encode(['message' => 'No post found'], JSON_THROW_ON_ERROR);
}

$post->db->closeConnection();
