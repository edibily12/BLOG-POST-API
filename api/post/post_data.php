<?php
require_once __DIR__ . "/../../models/Post.php";

// Get JSON data from the request body
$data = json_decode(file_get_contents("php://input"), false);

$post = new  Post();
