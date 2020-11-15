<?php


namespace App;

use Illuminate\Database\Eloquent\Model;

class ParsingResourse extends Model
{
    protected $fillable = ['name'];
    public $timestamps = false;

    public static function rules(){
        return [
            'name' => 'required|url',
        ];
    }
}
