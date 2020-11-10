<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;

class CommentController extends Controller
{
public function create(Request $request){
    $request->validate(Comment::rules());
    $newComment = new Comment();
    $newComment->fill($request->all())->save();

    $response = 'ok';
    echo json_encode($response);
    die();

    //return redirect()->route('news.NewsOne', $newComment->news_id)
    //    ->with([ 'comments'=>Comment::all()]);
}
}
