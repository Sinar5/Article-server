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
        
        if(isset($_GET["id"])){
            
            $id = $_GET["id"];
            $article = Article::find($mysqli, $id)->toArray();
            echo ResponseService::success_response($article);
            return;
        }
    }

    public function getArticlesByCategoryID(){}

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
            return;
        }         
    }
}

//To-Do:

//1- Try/Catch in controllers ONLY!!! 
//2- Find a way to remove the hard coded response code (from ResponseService.php)
//3- Include the routes file (api.php) in the (index.php) -- In other words, seperate the routing from the index (which is the engine)
//4- Create a BaseController and clean some imports 