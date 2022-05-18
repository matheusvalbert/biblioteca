<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommentRequest;
use App\Http\Resources\CommentResource;
use App\Models\Book;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Http\Requests\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Book $book)
    {
        $comments = $book->comments()->latest()->paginate(3);
        return CommentResource::collection($comments);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\CommentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CommentRequest $request)
    {
        $user = $request->user();
        $user->comments()->create($request->all());
    }
}
