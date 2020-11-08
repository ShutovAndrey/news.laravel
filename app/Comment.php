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
}
