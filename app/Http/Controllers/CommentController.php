<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, Post $post)
    {
        $request->validate([
            'body' => 'required',
        ]);

        $comment = new Comment;
        $comment->user_id = Auth::id();
        $comment->post_id = $post->id;
        $comment->body = $request->body;
        $comment->save();

        return back()->with('message', '댓글이 성공적으로 생성되었습니다.');
    }

    public function update(Request $request, Comment $comment)
    {
        $request->validate([
            'body' => 'required',
        ]);

        if (Auth::id() !== $comment->user_id) {
            return back()->with('error', '자신의 댓글만 수정할 수 있습니다.');
        }

        $comment->body = $request->body;
        $comment->save();

        return back()->with('message', '댓글이 성공적으로 수정되었습니다.');
    }

    public function destroy(Comment $comment)
    {
        if (Auth::id() !== $comment->user_id) {
            return back()->with('error', '자신의 댓글만 삭제할 수 있습니다.');
        }

        $comment->delete();

        return back()->with('message', '댓글이 성공적으로 삭제되었습니다.');
    }
}
