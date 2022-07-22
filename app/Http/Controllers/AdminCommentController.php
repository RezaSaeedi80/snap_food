<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class AdminCommentController extends Controller
{


    public function index()
    {
        $comments = Comment::where('is_approve', false)->paginate(2);
        return view('Admin.Comment', compact('comments'));
    }

    public function approve(Comment $comment)
    {
        try {
            $comment->update([
                'is_approve' => true
            ]);
            return redirect()->back()->with('comment updated successfully.');
        } catch (\Throwable $th) {
            return redirect()->back()->with('faild');
        }
    }

    public function destroy(Comment $comment)
    {
        try {
            $comment->delete();
            return redirect()->back()->with('comment updated successfully.');
        } catch (\Throwable $th) {
            return redirect()->back()->with('faild');
        }
    }
}
