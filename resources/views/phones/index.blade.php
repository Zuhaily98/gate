@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-end mb-2">
    <a href="{{ route('phones.create') }}" class="btn btn-success">Add Phone</a>
 </div>

<div class="card card-default">
    <div class="card-header">Phones</div>
    <div class="card-body">
        
        <table class="table">
            <thead>
                <th>Name</th>
                <th>Phone Brand</th>
                <th>Phone Number</th>
                <th></th>
            </thead>

            <tbody>
                @foreach($phones as $phone)
                <tr>
                    <td>
                        {{ $phone->user->name }}
                    </td>
                    <td>
                        {{ $phone->brand }}
                    </td>
                    <td>
                        {{ $phone->number }}
                    </td>
                    <td>
                        <a href="" class="btn btn-info btn-sm">Edit</a>
                        <button class="btn btn-danger btn-sm">Delete</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection