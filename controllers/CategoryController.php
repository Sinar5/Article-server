<?php

require(__DIR__ . "/../models/Category.php");
require(__DIR__ . "/../connection/connection.php"); 
require(__DIR__ . "/../services/CategoryService.php");
require(__DIR__ . "/../services/ResponseService.php");

class ArticleController{
    
    public function getAllCategories(){
        global $mysqli;

        if(!isset($_GET["id"])){
            $categories = Category::all($mysqli);
            $categories_array = CategoryService::categoriesToArray($categories); 
            echo ResponseService::success_response($categories_array);
            return;
        }

        $id = $_GET["id"];
        $category = Category::find($mysqli, $id)->toArray();
        echo ResponseService::success_response($category);
        return;
    }

    public function addCategory(){

    }

    public function updateCategory(){}

    public function getCategory(){}

    public function getCategoriesByArticleID(){}

    public function deleteAllCategories(){
    }

    public function deleteCategory(){}
}