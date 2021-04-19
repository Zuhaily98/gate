<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Phone;
use App\Http\Requests\Phones\CreatePhoneRequest;

class PhoneController extends Controller
{
    public function index()
    {
        return view('phones.index')->with('phones', Phone::all());
    }

    public function create()
    {
        return view('phones.create');
    }

    public function store(CreatePhoneRequest $request)
    {
        auth()->user()->phone()->create([
            'brand' => $request->brand,
            'number' => $request->number,
        ]);
        
        session()->flash('success','Phone created successfully!');

        return redirect(route('phones.index'));
    }
}
