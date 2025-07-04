<?php

require(__DIR__ . "/../models/Category.php");
require(__DIR__ . "/../connection/connection.php"); 
require(__DIR__ . "/../services/CategoryService.php");
require(__DIR__ . "/../services/ResponseService.php");

class ArticleController{
    
    public function getAllCategories(){

        $categories = Category::all($mysqli);
        $categories_array = CategoryService::categoriesToArray($categories); 
        echo ResponseService::success_response($categories_array);
        return;
        
    }

    public function addCategory(){
        $data = [
            'id' => $_POST["id"],
            'name' => $_POST["name"],
            'description' => $_POST["description"]
        ];

        Category::create($mysqli, $data);
        echo ResponseService::success_response("Category added successfully.");
        return;
    }

    public function updateCategory(){}

    public function getCategory(){

        if(!isset($_GET["id"])){
            $id = $_GET["id"];
            $category = Category::find($mysqli, $id)->toArray();
            echo ResponseService::success_response($category);
            return;
        }
    }

    public function getCategoriesByArticleID(){

    }

    public function deleteAllCategories(){
        $categories = Category::all($mysqli);
        foreach($categories as $category){
            Category::delete($mysqli, $category->name);
        }
        echo ResponseService::success_response("All categories deleted successfully.");
        return;
    }

    public function deleteCategory(){
        if(isset($_GET["name"])){
            $name = $_GET["name"];
            Category::delete($mysqli, $name);
            echo ResponseService::success_response("Category deleted successfully.");
            return;
        }
        echo ResponseService::error_response("Category name not provided.");
    }
}