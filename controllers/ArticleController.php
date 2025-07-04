<?php 

require(__DIR__ . "/../models/Article.php");
require(__DIR__ . "/../connection/connection.php");
require(__DIR__ . "/../services/ArticleService.php");
require(__DIR__ . "/../services/ResponseService.php");

class ArticleController{
    
    public function getAllArticles()
    {
        $articles = Article::all($mysqli);
        $articles_array = ArticleService::articlesToArray($articles); 
        echo ResponseService::success_response($articles_array);
        return;
    }

    public function addArticle(){

        $data = [
            'id'= $_POST["id"],
            'name' => $_POST["name"],
            'author' => $_POST["author"],
            'description' => $_POST["description"]
        ]

        Article::create($mysqli, $data);
    }

    public function updateArticle(){}

    public function getArticle(){
        
        if(isset($_GET["name"])){
            
            $name = $_GET["name"];
            $article = Article::find($mysqli, $name)->toArray();
            echo ResponseService::success_response($article);
            return;
        }
    }

    public function getArticlesByCategoryID(){
        if(isset($_GET["category_id"])){
            $category_id = $_GET["category_id"];
            $articles = getArticlesByCategoryID($mysqli, $category_id);
            $articles_array = ArticleService::articlesToArray($articles);
            echo ResponseService::success_response($articles_array);
            return;
        }
    }

    public function deleteAllArticles()
    {
        $articles = Article::all($mysqli);
        foreach($articles as $article){
            Article::delete($mysqli, $article->name);
        }
        echo ResponseService::success_response("All articles deleted successfully.");
        return;
    }

    public function deleteArticle()
    {
        if(isset($_GET["name"])){

            $name = $_GET["name"];
            Article::delete($mysqli, $name);

            echo ResponseService::success_response("Article $name deleted successfully.");
            return;
        }         
    }
}

//To-Do:

//1- Try/Catch in controllers ONLY!!! 
//2- Find a way to remove the hard coded response code (from ResponseService.php)
//3- Include the routes file (api.php) in the (index.php) -- In other words, seperate the routing from the index (which is the engine)
//4- Create a BaseController and clean some imports 