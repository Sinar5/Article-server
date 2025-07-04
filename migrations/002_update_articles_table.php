<?php 

require("../connection/connection.php");

$query = "ALTER TABLE articles 
            ADD category_name VARCHAR(100) NOT NULL,
            ADD FOREIGN KEY (category_name) REFERENCES categories(name);";

$execute = $mysqli->prepare($query);
$execute->execute();