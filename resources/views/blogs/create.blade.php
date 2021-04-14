@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Create Post
                    </div>

                    <div class="card-body">
                        <form action="{{ route('blogs.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" name="title" id="title" class="form-control" placeholder="Insert blog title here">
                            </div>
                            <div class="form-group">
                                <label for="content">Content</label>
                                <textarea name="content" id="content" cols="10" rows="10" class="form-control"
                                    placeholder="Insert blog content here"></textarea>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary" type="submit">Create Post</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
