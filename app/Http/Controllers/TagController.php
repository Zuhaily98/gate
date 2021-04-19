<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;
use App\Http\Requests\Tags\CreateTagRequest;
use App\Http\Requests\Tags\UpdateTagRequest;

class TagController extends Controller
{
    public function index()
    {
        return view('tags.index')->with('tags', Tag::all());
    }

    public function create()
    {
        return view('tags.create');
    }

    public function store(CreateTagRequest $request)
    {
        Tag::create([
            'name' => $request->name
        ]);

        session()->flash('success', 'Tag created successfully!');

        return redirect(route('tags.index'));
    }

    public function edit(Tag $tag)
    {
        return view('tags.edit')->with('tag', $tag);
    }

    public function update(UpdateTagRequest $request, Tag $tag)
    {
        $data = request()->only(['name']);

        $tag->update($data);

        //flash message
        session()->flash('success', 'Tag updated successfully!');

        //redirect
        return redirect(route('tags.index'));
    }

    public function destroy(Tag $tag)
    {
        if ($tag->blogs->count() > 0)
        {
            session()->flash('error', 'Categories cannot be deleted because it has some blogs.');

            return redirect()->back();
        }

        $tag->delete();

        session()->flash('success', 'Tag deleted successfully!');

        return redirect(route('tags.index'));
    }
}
