@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Edit Post
                    </div>

                    <div class="card-body">
                        <form action="{{ route('blogs.update', $blog) }}" method="POST">
                            @csrf
                            
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" name="title" id="title" class="form-control" value="{{ $blog->title }}">
                            </div>
                            <div class="form-group">
                                <label for="content">Content</label>
                                <textarea name="content" id="content" cols="10" rows="10" class="form-control"
                                    placeholder="Insert blog content here">{{ $blog->content }}</textarea>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary" type="submit">Update Post</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
