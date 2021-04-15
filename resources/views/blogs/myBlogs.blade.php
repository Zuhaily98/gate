@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    <div class="card-header">My Blogs</div>

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
                            </thead>
                            <tbody>
                                @foreach ($blogs as $blog)

                                    @can('view-blog', $blog)
                                        <tr>
                                            <td>{{ $blog->title }}</td>
                                            <td>{{ $blog->content }}</td>
                                            <td>{{ $blog->user->name }}</td>
                                            <td>{{ $blog->created_at->diffForHumans() }}</td>
                                            <td>
                                                <a href="" class="badge badge-success">View</a>
                                                <a href="{{ route('blogs.edit', $blog->id) }}"
                                                    class="badge badge-primary">Edit</a>
                                                <a href="" class="badge badge-danger">Delete</a>
                                            </td>
                                        </tr>
                                    @endcan

                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
