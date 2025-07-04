<?php 

class CategoryService {

    public static function categoriesToArray($categories_db){
        $results = [];

        foreach($categories_db as $a){
             $results[] = $a->toArray();
        } 

        return $results;
    }



}