<?php 

require(__DIR__ . "/../models/Model.php");
require("../connection/connection.php");

$data= [][];

$data[0] = ['name' => 'Technology','description' => 'Articles related to technology advancements and innovations'];
$data[1] = ['name' => 'Health',    'description' => 'Articles focused on health, wellness, and medical topics']; 
$data[2] = ['name' => 'Lifestyle', 'description' => 'Articles covering lifestyle choices, fashion, and personal development'];
$data[3] = ['name' => 'Travel',    'description' => 'Articles about travel destinations, tips, and experiences'];
$data[4] = ['name' => 'Food',      'description' => 'Articles related to food, recipes, and culinary experiences'];

foreach($data as $category) {
    Category::create($mysqli, $category);
}


