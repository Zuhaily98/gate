@extends('layouts.app')

@section('content')

    <div class="card card-default">
        <div class="card-header"> 
            Create Phone
        </div>

        <div class="card-body">
           
            <form action="{{ route('phones.store') }}" method="POST"> 
                @csrf

                <div class="form-group">
                    <label for="brand">Phone Brand</label>
                    <input type="text" id="brand" class="form-control" name="brand">
                </div>
                <div class="form-group">
                    <label for="number">Phone Number</label>
                    <input type="text" id="number" class="form-control" name="number">
                </div>
                <div class="form-group">
                    <button class="btn btn-success">Add Phone</button>
                </div>
            </form>
        </div>
    </div>

@endsection