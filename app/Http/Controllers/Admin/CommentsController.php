<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Comment;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function update(Request $request, Comment $comment){

        //aggioramento del Commento
        $comment->approved = true;
        $comment->save();
        //redirect al post
        return redirect()->route("admin.posts.show" , $comment->post_id);

    }

    public function destroy(Comment $comment){

        $post_id = $comment->post_id;

        $comment->delete();

        return redirect()->route("admin.posts.show" , $comment->post_id);
    }
}
