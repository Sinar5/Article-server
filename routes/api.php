<?php

$apis = [

    //article apis
    '/articles'           => ['controller' => 'ArticleController', 'method' => 'getAllArticles'],
    '/add_new_article'    => ['controller' => 'ArticleController', 'method' => 'addArticle'],
    '/update_article'     => ['controller' => 'ArticleController', 'method' => 'updateArticle'],
    '/get_article'        => ['controller' => 'ArticleController', 'method' => 'getArticle'],
    '/get_articles_by_Id' => ['controller' => 'ArticleController', 'method' => 'getArticlesByID'],

    '/delete_articles'    => ['controller' => 'ArticleController', 'method' => 'deleteAllArticles'],
    '/delete_article'     => ['controller' => 'ArticleController', 'method' => 'deleteArticle'],

    //category apis
    '/categories'         => ['controller' => 'CategoryController', 'method' => 'getAllCategories'],
    '/add_new_category'   => ['controller' => 'CategoryController', 'method' => 'addCategory'],
    '/update_category'    => ['controller' => 'CategoryController', 'method' => 'updateCategory'],
    '/get_category'       => ['controller' => 'CategoryController', 'method' => 'getCategory'],
    '/get_categories_by_Id' => ['controller' => 'CategoryController', 'method' => 'getCategoriesByID'],

    '/delete_categories'  => ['controller' => 'CategoryController', 'method' => 'deleteAllCategories'],
    '/delete_category'    => ['controller' => 'CategoryController', 'method' => 'deleteCategory'],

    //auth apis
    '/login'              => ['controller' => 'AuthController', 'method' => 'login'],
    '/register'           => ['controller' => 'AuthController', 'method' => 'register'],

];


