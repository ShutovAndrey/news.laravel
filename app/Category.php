<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
        protected $fillable = ['name', 'category_url'];

    /*public static function getCategories() {
        $arr=json_decode((\File::get(storage_path() . '\categories.json')));
        $categories=[];
        foreach ($arr as $item){
            $categories[]=(array)$item;
        }
        return $categories;
    }

    public static function getCategoryByName($name) {
        foreach (static::getCategories() as $category) {
            if ($category['category_url'] == $name) {
                break;
            }
        }
        return $category;
    }*/
}
