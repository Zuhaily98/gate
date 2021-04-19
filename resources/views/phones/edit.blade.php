@extends('layouts.app')

@section('content')

    <div class="card card-default">
        <div class="card-header"> 
            Edit Phone Information
        </div>

        <div class="card-body">
           
            <form action="{{ route('phones.update', $phone) }}" method="POST"> 
                @csrf

                <div class="form-group">
                    <label for="brand">Phone Brand</label>
                    <input type="text" id="brand" class="form-control" name="brand" value="{{ $phone->brand }}">
                </div>
                <div class="form-group">
                    <label for="number">Phone Number</label>
                    <input type="text" id="number" class="form-control" name="number" value="{{ $phone->number }}">
                </div>
                <div class="form-group">
                    <button class="btn btn-success">Update Phone</button>
                </div>
            </form>
        </div>
    </div>

@endsection