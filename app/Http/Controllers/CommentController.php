<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Insta;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comments = Comment::all();
        return view('comment.index', compact('comments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store($id): RedirectResponse
    {
        $instapp = Insta::find($id);

        $comments = Comment::create([
            'comment' => request('comment'),
            'user_id' => Auth::id(),
            'insta_id' => $id,
        ]);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id, $commentId)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id, string $commentId)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, string $commentId)
    {
        $comments = Comment::find($commentId);
        $this->authorize('delete', $comments);
        $comments->delete();
        return redirect()->back();
    }
}
