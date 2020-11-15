<?php

namespace App\Http\Controllers\News;

use Illuminate\Http\Request;
use App\Comment;
use App\News;

class CommentController
{
    public function create(Request $request)
    {
        $request->validate(Comment::rules());
        $newComment = new Comment();
        $newComment->fill($request->all())->save();
        $this->incrementCommentsValue($request->news_id);
        echo json_encode('ok');
        die();
    }

    public function incrementCommentsValue($news_id)
    {
        $news = News::find($news_id);
        $news->comment_count = $news->comment_count + 1;
        $news->save();
    }
}
