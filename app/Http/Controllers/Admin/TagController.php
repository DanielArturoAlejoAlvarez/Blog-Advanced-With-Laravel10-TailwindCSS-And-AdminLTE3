<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TagController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.tags.index')->only('index');
        $this->middleware('can:admin.tags.create')->only('create','store');
        $this->middleware('can:admin.tags.edit')->only('edit','update');
        $this->middleware('can:admin.tags.destroy')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()//: Response
    {
        $tags = Tag::all();
        return view('admin.tags.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()//: Response
    {
        $colors = [
            'red'           =>  'RED',
            'yellow'        =>  'YELLOW',
            'green'         =>  'GREEN',
            'blue'          =>  'BLUE',
            'indigo'        =>  'INDIGO',
            'purple'        =>  'PURPLE',
            'pink'          =>  'PINK',
        ];
        return view('admin.tags.create', compact('colors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)//: RedirectResponse
    {
        $request->validate([
            'name'  =>  'required',
            'slug'  =>  'required|unique:tags',
        ]);

        $tag = Tag::create($request->all());
        return redirect()
                    ->route('admin.tags.edit', $tag)
                    ->with('info','Tag saved successfully!');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tag $tag)//: Response
    {
        $colors = [
            'red'           =>  'RED',
            'yellow'        =>  'YELLOW',
            'green'         =>  'GREEN',
            'blue'          =>  'BLUE',
            'indigo'        =>  'INDIGO',
            'purple'        =>  'PURPLE',
            'pink'          =>  'PINK',

        ];
        return view('admin.tags.edit', compact('tag','colors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tag $tag)//: RedirectResponse
    {
        $request->validate([
            'name'  =>  'required',
            'slug'  =>  'required|unique:tags,slug,' . $tag->id,
        ]);

        $tag->update($request->all());
        return redirect()
                    ->route('admin.tags.edit', $tag)
                    ->with('info','Tag updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag)//: RedirectResponse
    {
        $tag->delete();
        return redirect()
                    ->route('admin.tags.index')
                    ->with('info','Tag deleted successfully!');;
    }
}
