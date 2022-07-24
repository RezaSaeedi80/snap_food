<?php

namespace App\Http\Controllers;

use App\Http\Requests\SellerCommentStoreRequest;
use App\Http\Requests\SellerCommentUpdateRequest;
use App\Models\Comment;
use App\Models\Resturant;
use Illuminate\Http\Request;

class SellerCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Resturant $resturant, Request $request)
    {
        $this->authorize('comments', $resturant);
        $comments = Comment::with('user')->whereHas(
            'cart', fn ($cart) => $cart->where('resturant_id', $resturant->id)
        )->where('parent_id', null)
            ->where('is_approve', true)
            ->get();


        return view('seller.Comment.Comments', compact('comments', 'resturant'));
    }

    public function notApprovedComment(Resturant $resturant, Request $request)
    {
        $comments = Comment::whereHas(
            'cart',
            fn ($cart) => $cart->where('resturant_id', $resturant->id)
        )->where('parent_id', null)
            ->where('is_approve', null)
            ->paginate(2);

        return view('seller.Comment.NotAppovedComment', compact('resturant', 'comments'));
    }

    public function approve(Resturant $resturant, Comment $comment, Request $request)
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

    public function reject(Resturant $resturant, Comment $comment, Request $request)
    {
        try {
            $comment->update([
                'is_approve' => false
            ]);
            return redirect()->back()->with('comment updated successfully.');
        } catch (\Throwable $th) {
            return redirect()->back()->with('faild');
        }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Resturant $resturant, SellerCommentStoreRequest $request)
    {
        $comment = Comment::findOrFail($request->comment_id);

        try {
            Comment::create([
                'user_id' => auth()->id(),
                'parent_id' => $comment->id,
                'cart_id' => $comment->cart_id,
                'score' => 5,
                'message' => $request->message,
            ]);
            return redirect()->back()->with('comment added successfully.');
        } catch (\Throwable $th) {
            return redirect()->back()->with('faild');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Resturant $resturant, Comment $comment)
    {
        $comment = $comment->load('replies', 'user');
        return view('seller.Comment.Comment', compact('resturant', 'comment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(SellerCommentUpdateRequest $request, Resturant $resturant, Comment $comment)
    {
        try {
            $comment->update([
                'message' => $request->message
            ]);
            if (isset($request->validator) && $request->validator->fails()) {
                return response()->json([
                    'errors' => $request->validator->errors()->messages()
                ], 200);
            }
            return response()->json([
                'success' => 'comment updated successfully'
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'msg' => 'faild'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Resturant $resturant, Comment $comment)
    {
        try {
            $comment->delete();
            return response()->json([
                'success' => 'comment deleted successfully'
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'msg' => 'faild'
            ]);
        }
    }
}
