<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookStatesRequest;
use App\Http\Resources\BookResourceCollection;
use Illuminate\Http\Request;

class BookStatesController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = $request->user();
        $books = $user->books()->where('name', 'LIKE', "%{$request->filter}%")->latest()->paginate(3);
        return new BookResourceCollection($books);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookStatesRequest $request)
    {
        $user = $request->user();
        $user->books()->syncWithoutDetaching([
            $request->id => ['state' => $request->state]
        ]);
    }

    /**
     * Display the specified resource.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $user = $request->user();
        return $user->books()->find($request->id)->pivot->state ?? 'none';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $user = $request->user();
        return $user->books()->detach($request->id);
    }
}
