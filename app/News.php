<?php

namespace App;


class News
{
    private static $news = [
        [
            'id' => 43,
            'title' => 'Новость 1',
            'text' => 'ничего хорошего',
            'category_id' => 1,
        ],
        [
            'id' => 58,
            'title' => 'Новость 2',
            'text' => 'так себе новость',
            'category_id' => 1
        ],
        [
            'id' => 76,
            'title' => 'Новость 3',
            'text' => 'и снова что-то не так',
            'category_id' => 2
        ],
        [
            'id' => 88,
            'title' => 'Новость 4',
            'text' => 'плохо',
            'category_id' => 2
        ]
    ];

    public static function getNews() {
        return static::$news;
    }

    public static function getNewsId($id) {
//это конечно огого..сначала фильтрую колонки, потом по ним узнаю ключ и вывожу по этому ключу
       return static::$news[array_search($id, array_column(static::$news, 'id'))];
    }
}
