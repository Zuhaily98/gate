@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    <div class="card-header">Blogs Posts</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="form-group">
                            <a href="{{ route('blogs.create') }}" class="btn btn-primary">Create Blog</a>
                        </div>

                        <table class="table">
                            <thead>
                                <th>Title</th>
                                <th>Content</th>
                                <th>Author</th>
                                <th>Created</th>
                                <th>Actions</th>
                                <th></th>
                            </thead>
                            <tbody>
                                @foreach ($blogs as $blog)

                                    @if (auth()->user()->isAdmin())
                                        @can('manage-blog', $blog)
                                        <tr>
                                            <td>{{ $blog->title }}</td>
                                            <td>{{ $blog->content }}</td>
                                            <td>{{ $blog->user->name }}</td>
                                            <td>{{ $blog->created_at->diffForHumans() }}</td>
                                            <td>
                                                <a href="{{ route('blogs.show', $blog->id) }}" class="badge badge-success">View</a>
                                                
                                                    <a href="{{ route('blogs.edit', $blog->id) }}"
                                                        class="badge badge-primary">Edit</a>
                                               
                                            </td>
                                            <td>
                                              
                                                <form action="{{ route('blogs.destroy', $blog->id) }}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="badge badge-danger">Delete</button>
                                                </form>
                                               
                                            </td>
                                        </tr>
                                        @endcan
                                    @else
                                    <tr>
                                        <td>{{ $blog->title }}</td>
                                        <td>{{ $blog->content }}</td>
                                        <td>{{ $blog->user->name }}</td>
                                        <td>{{ $blog->created_at->diffForHumans() }}</td>
                                        <td>
                                            <a href="{{ route('blogs.show', $blog->id) }}" class="badge badge-success">View</a>
                                            @can('update-blog', $blog)
                                                <a href="{{ route('blogs.edit', $blog->id) }}"
                                                    class="badge badge-primary">Edit</a>
                                            @endcan
                                        </td>
                                        <td>
                                            @can('delete-blog', $blog)
                                            <form action="{{ route('blogs.destroy', $blog->id) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="badge badge-danger">Delete</button>
                                            </form>
                                            @endcan
                                        </td>
                                    </tr>
                                    @endif

                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
