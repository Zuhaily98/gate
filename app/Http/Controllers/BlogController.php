<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    public function index()
    {
        return view('blogs.index')->with('blogs', Blog::all());
    }

    public function create()
    {
        return view('blogs.create');
    }

    public function store(Request $request)
    {
        $this->validate(request(), [
            'title' => 'required|min:4',
            'content' => 'required'
        ]);

        auth()->user()->blogs()->create([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        session()->flash('success','Blog created successfully!');

        return redirect(route('blogs.index'));
    }

    public function edit(Blog $blog)
    {
        return view('blogs.edit')->with('blog', $blog);
    }

    public function update(Blog $blog)
    {
        $this->validate(request(), [
            'title' => 'required|min:4',
            'content' => 'required'
        ]);

        $data = request()->only(['title','content']);

        $blog->update($data);

        //flash message
        session()->flash('success', 'Blog updated successfully!');

        //redirect
        return redirect(route('blogs.index'));
    }
}
