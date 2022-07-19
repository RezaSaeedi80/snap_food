<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentSearchRequest;
use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use App\Http\Resources\CommentResource;
use App\Models\Cart;
use App\Models\Comment;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Comment::class, 'comment');
        $this->middleware('paid_cart', ['only' => ['store']]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CommentSearchRequest $request)
    {
        if ($request->has('resturant_id')) {
            $comments = Comment::whereHas(
                'cart', fn ($cart) => $cart->where('resturant_id', $request->resturant_id)
            )->get();
        }

        if ($request->has('food_id')) {
            $comments = Comment::whereHas(
                'cart', fn($cart) => $cart->whereHas(
                    'cartItems', fn($cartItem) => $cartItem->where('food_id', $request->food_id)
                )
            )->get();
        }

        return [
            'comments' => CommentResource::collection($comments)
        ];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCommentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCommentRequest $request)
    {
        try {
            Comment::create([
                'user_id' => auth()->id(),
                'cart_id' => $request->cart_id,
                'score' => $request->score,
                'message' => $request->message,
            ]);
            return response()->json([
                'msg' => 'comment added successfully.'
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'msg' => 'faild'
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        return $comment;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCommentRequest  $request
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCommentRequest $request, Comment $comment)
    {
        try {
            $comment->update([
                'message' => $request->message,
                'score' => $request->score
            ]);
            return response()->json([
                'msg' => 'comment updated successfully.'
            ]);

        } catch (\Throwable $th) {
            return response()->json([
                'msg' => 'faild'
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        try {
            $comment->replies()->delete();
            $comment->delete();
            return response()->json([
                'msg' => 'comment deleted successfully.'
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'msg' => 'faild'
            ]);
        }
    }
}
