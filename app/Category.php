<?php

namespace App;

class Category
{
    private static $categories = [
        [
            'id' => 1,
            'category_url' => 'sport',
            'name' => 'Спорт',
        ],
        [
            'id' => 2,
            'category_url' => 'politics',
            'name' => 'Политика',
        ]

    ];

    public static function getCategories() {
        return static::$categories;
    }

    public static function getCategoryByName($name) {

        foreach (static::$categories as $category) {
            if ($category['category_url'] == $name) {
                break;
            }
        }
        return $category;
    }
}
