@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Blog : {{ $blog->title }}
                    </div>

                    <div class="card-body">
                       
                            <div class="form-group">
                                <label for="title">Title : </label>
                                <input type="text" name="" id="" class="form-control" value="{{ $blog->title }}" disabled>
                            </div>
                            <div class="form-group">
                                <label for="blogger">Created By :</label>
                                <input type="text" name="" id="" class="form-control" value="{{ $blog->user->name }}" disabled>
                            </div>
                            <div class="form-group">
                                <label for="content">Content :</label>
                                <textarea name="" id="" cols="10" rows="10" class="form-control" disabled>{{ $blog->content }}</textarea>
                            </div>
                    
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
