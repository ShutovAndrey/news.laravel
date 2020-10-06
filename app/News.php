<?php

namespace App;

use App\Category;

class News
{

   /* private static $news = [
        [
            'id' => 43,
            'title' => 'Новость 1',
            'text' => 'ничего хорошего',
            'category_id' => 1,
            'private' => false
        ],
        [
            'id' => 58,
            'title' => 'Новость 2',
            'text' => 'так себе новость',
            'category_id' => 1,
            'private' => false
        ],
        [
            'id' => 76,
            'title' => 'Новость 3',
            'text' => 'и снова что-то не так',
            'category_id' => 2,
            'private' => false
        ],
        [
            'id' => 88,
            'title' => 'Новость 4',
            'text' => 'плохо',
            'category_id' => 2,
            'private' => false
        ]
    ];*/

    public static function getNews()
    {
        $arr=json_decode((\File::get(storage_path() . '\news.json')));
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
