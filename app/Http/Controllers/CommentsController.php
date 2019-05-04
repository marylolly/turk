<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function addComment(Request $request)
{
	$comment = $request->input ('comment');
	$article_id = (int)$request->input('article_id');
	$user = $request->input ('user');

	$objComment = new Comment();
        $objComment = $objComment->create([
            'article_id' => $article_id,
            'user'    => $user,
            'comment'    => $comment
        ]);
        if($objComment) {
            return back();
        }
        return back();

}

 }
