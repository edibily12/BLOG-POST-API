<?php


header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: PUT");

global $data, $post;
require_once "post_data.php"; //include Post model

// Get raw posted data
$post->id = htmlspecialchars(strip_tags($data->id));
$post->category_id = htmlspecialchars(strip_tags($data->category_id));
$post->title = htmlspecialchars(strip_tags($data->title));
$post->author = htmlspecialchars(strip_tags($data->author));
$post->body = htmlspecialchars(strip_tags($data->body));

// Attempt to update the post
if ($post->update()) {
    echo json_encode(array('message' => 'Post Updated Successfully'), JSON_THROW_ON_ERROR);
} else {
    echo json_encode(array('error' => 'Something went wrong'), JSON_THROW_ON_ERROR);
}
