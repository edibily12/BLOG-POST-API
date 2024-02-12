<?php
require_once __DIR__ . "/../../models/Category.php";

// Get JSON data from the request body
$data = json_decode(file_get_contents("php://input"), false);

$category = new  Category();
