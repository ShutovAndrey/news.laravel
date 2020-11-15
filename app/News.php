<?php

namespace App;

use App\Category;
use Illuminate\Database\Eloquent\Model;
use App\Comment;

class News extends Model
{
    protected $fillable = ['title', 'text', 'private', 'image', 'category_id'];

    public function category(){
        return $this->belongsTo(Category::class, 'category_id')->first();
    }

    public function comment(){
        return $this->hasMany(Comment::class, 'news_id');
    }

    public static function rules(){
        $category_id= (new Category())->getTable();
        return [
            'title' => 'required | min:10 | max:25',
            'text' => 'required | min:30 | max:800',
            'private' => 'sometimes|in:1',  // boolean
            'category_id' => "numeric | required | exists:{$category_id},id",
            'image' => 'mimes:jpeg,jpg,png,bpn | max:1500'
        ];
    }

    public static function attributes(){
        return [
            'title' => 'Заголовок новости',
            'text' => 'Текст новости',
            'category_id' => "Категория новости",
            'image' => 'Изображение'
        ];
    }
}
