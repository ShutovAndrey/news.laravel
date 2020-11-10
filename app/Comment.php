<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\News;

class Comment extends Model
{
    protected $fillable = ['name', 'comment', 'news_id'];

    public function news(){
        return $this->belongsTo(News::class, 'news_id')->first();
    }

    public static function rules(){
        return [
            'name' => 'required | min:3 | max:25',
            'comment' => 'required | min:3 | max:300',
            'news_id' => 'required|integer',
        ];
    }
}
