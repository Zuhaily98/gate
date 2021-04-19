@extends('layouts.app')

@section('content')

    <div class="d-flex justify-content-end mb-2">
        @if (auth()->user()->phone()->count()<1)
            <a href="{{ route('phones.create') }}" class="btn btn-success">Add Phone</a>
        @endif
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
                    @foreach ($phones as $phone)
                        @can('view-phone', $phone)
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
                                    <a href="{{ route('phones.edit', $phone->id) }}" class="btn btn-info btn-sm">Edit</a>
                                    <form action="{{ route('phones.destroy', $phone->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>

                        @elsecan('manage-phone', $phone)
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
                                    <a href="{{ route('phones.edit', $phone->id) }}" class="btn btn-info btn-sm">Edit</a>
                                    <form action="{{ route('phones.destroy', $phone->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endcan


                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
