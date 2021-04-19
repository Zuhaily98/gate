@extends('layouts.app')

@section('content')

    <div class="card card-default">
        <div class="card-header"> 
            Edit Tag
        </div>

        <div class="card-body">
           
            <form action="{{ route('tags.update', $tag) }}" method="POST"> 
                @csrf

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" class="form-control" name="name" value="{{ $tag->name }}">
                </div>
                <div class="form-group">
                    <button class="btn btn-success">Save Tag</button>
                </div>
            </form>
        </div>
    </div>

@endsection