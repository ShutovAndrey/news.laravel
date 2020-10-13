<?php

namespace App;

use App\Category;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = ['title', 'text', 'private', 'image'];

    public function category(){
        return $this->belongsTo(Category::class, 'category_id')->first();
    }


}
