<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: DELETE");

global $data, $post;
require_once "post_data.php"; //include Post model

// Get raw posted data
$post->id = htmlspecialchars(strip_tags($data->id));

if ($post->delete()){
    echo json_encode(array('message' => 'Post Deleted Successfully'), JSON_THROW_ON_ERROR);
}else{
    echo json_encode(array('error' => 'Something went wrong'), JSON_THROW_ON_ERROR);
}
