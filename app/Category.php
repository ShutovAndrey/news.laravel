<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use App\News;

class Category extends Model
{
        protected $fillable = ['name', 'category_url'];

        public function news(){
           // dd($this->hasMany(News::class, 'category_id')->get());
            return $this->hasMany(News::class, 'category_id')->paginate(5);
        }
}
