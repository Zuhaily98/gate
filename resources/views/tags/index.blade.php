@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-end mb-2">
    <a href="{{ route('tags.create') }}" class="btn btn-success">Add tag</a>
 </div>

<div class="card card-default">
    <div class="card-header">Tags</div>
    <div class="card-body">
        
        <table class="table">
            <thead>
                <th>Name</th>
                <th>Post Count</th>
                <th></th>
            </thead>

            <tbody>
                @foreach($tags as $tag)
                <tr>
                    <td>
                        {{ $tag->name }}
                    </td>
                    <td>
                        {{ $tag->blogs()->count() }}
                    </td>
                    <td>
                        <a href="" class="btn btn-info btn-sm">Edit</a>
                        <!-- when user click on this button, a function on javaScript will open the modal below -->
                        <button class="btn btn-danger btn-sm">Delete</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection