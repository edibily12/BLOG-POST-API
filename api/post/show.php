<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

require_once __DIR__."/../../models/Post.php";

$post = new Post();

$post->id = $_GET['id'] ?? die();

$post->show();

$post_arr = array(
  'id' => $post->id,
    'category_id' => $post->category_id,
    'category_name' => $post->category_name,
    'title' => $post->title,
  'author' => $post->author,
  'body' => $post->body,
  'created_at' => $post->created_at,
);

echo json_encode($post_arr, JSON_THROW_ON_ERROR);

$post->db->closeConnection();