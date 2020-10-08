<?php

namespace App;

use App\Category;

class News
{

    public static function getNews()
    {
        $arr=json_decode((\File::get(storage_path() . '\news.json')), true);
        $news=[];
        foreach ($arr as $item){
            $news[]=(array)$item;
        }
        return $news;
       // return static::$news;
    }

    /*
     * фильтр по массиву. ищу новость по id
     */
    public static function getNewsId($id)
    {
        return static::getNews()[array_search($id, array_column(static::getNews(), 'id'))];

    }

    public static function getNewsByCategoryName($name) {

        $id = Category::getCategoryByName($name)['id'];
        $news = [];
        foreach (static::getNews() as $item) {
            if ($item['category_id'] == $id) {
                $news[] = $item;
            }
        }
        return $news;
    }

}
