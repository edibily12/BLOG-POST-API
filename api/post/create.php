<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Access-Control-Allow-Headers, Access-Control-Request-Methods, Authorization, X-Requested-With, Content-Type");

global $data, $post;
require_once "post_data.php"; //include Post model

// Get raw posted data
$post->category_id = htmlspecialchars(strip_tags($data->category_id));
$post->title = htmlspecialchars(strip_tags($data->title));
$post->author = htmlspecialchars(strip_tags($data->author));
$post->body = htmlspecialchars(strip_tags($data->body));


if ($post->create()){
    echo json_encode(array('message' => 'Post Created Successfully'), JSON_THROW_ON_ERROR);
}else{
    echo json_encode(array('error' => 'Something went wrong'), JSON_THROW_ON_ERROR);
}
