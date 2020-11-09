<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;

class CommentController extends Controller
{
public function create(Request $request){
    $response = [

        'id' => 456456,

    ];

    echo json_encode("hello_andrey");
    die();
    dd($request);
    $newComment = new Comment();
    $newComment->fill($request->all())->save();

    return redirect()->route('news.NewsOne', $newComment->news_id)
        ->with([ 'comments'=>Comment::all()]);
}
}
