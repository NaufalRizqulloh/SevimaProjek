<?php

namespace App\Http\Controllers;

use App\Models\Insta;
use App\Models\Like;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InstaAppController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $instapp = Insta::all();
        return view('dashboard', compact('instapp'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $instapp = Insta::find($id);

        $instapp = Insta::create([
            'user_id' => Auth::id(),
            'insta_id' => $id,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required',
            'image' => 'required'
        ]);

        $photoPath= '';

        if($request->hasFile('image')){
            $photoPath = $request->file('image')->store('images');
        }

        $instapp = new Insta();
        $instapp->title = $request->title;
        $instapp->user_id = Auth()->user()->id;
        $instapp->image = $photoPath;
        $instapp->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('comment.index',[
            'instapp'=> Insta::find($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $instapp = Insta::find($id);
        $this->authorize('edit', $instapp);
        return view('insta.edit', compact('instapp'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id )
    {
        $this->validate($request,[
            'title' => 'required'
        ]);

        $instapp = Insta::find($id);
        $instapp->title = $request->title;
        $instapp->save();
        return redirect()-> route('dashboard');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $instapp = Insta::find($id);
        $this->authorize('delete', $instapp);
        $instapp->delete();
        return redirect()->back();
    }
}
