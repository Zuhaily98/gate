<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Blogs\CreateBlogRequest;
use App\Http\Requests\Blogs\UpdateBlogRequest;
use App\Models\Blog;
use App\Models\Tag;

class BlogController extends Controller
{
    public function index()
    {
        return view('blogs.index')->with('blogs', Blog::all());
    }

    public function myBlogs()
    {
        return view('blogs.myBlogs')->with('blogs', Blog::all());
    }


    public function create()
    {
        return view('blogs.create')->with('tags', Tag::all());
    }

    public function store(CreateBlogRequest $request)
    {
        $blog = auth()->user()->blogs()->create([
            'title' => $request->title,
            'content' => $request->content,
        ]);
        
        // attach() is method to use for attaching many to many data
        if($request->tags){
            $blog->tags()->attach($request->tags);
        }

        session()->flash('success','Blog created successfully!');

        return redirect(route('blogs.myBlogs'));
    }

    public function edit(Blog $blog)
    {
        return view('blogs.edit')->with('blog', $blog)->with('tags', Tag::all());
    }

    public function update(UpdateBlogRequest $request, Blog $blog)
    {
        $data = request()->only(['title','content']);

        if ($request->tags)
        {
            // method for many to many relationshop to update and sync changes
            $blog->tags()->sync($request->tags);
        }

        $blog->update($data);

        //flash message
        session()->flash('success', 'Blog updated successfully!');

        //redirect
        return redirect(route('blogs.myBlogs'));
    }

    public function show(Blog $blog)
    {
        return view('blogs.show')->with('blog', $blog);
    }

    public function destroy(Blog $blog)
    {

        $blog->delete();

        session()->flash('success', 'Blog deleted successfully!');

        return redirect(route('blogs.myBlogs'));
    }
}
