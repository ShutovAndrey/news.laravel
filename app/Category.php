<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use App\News;

class Category extends Model
{
        protected $fillable = ['name', 'category_url'];

        public function news(){
            return $this->hasMany(News::class, 'category_id');
        }
}
