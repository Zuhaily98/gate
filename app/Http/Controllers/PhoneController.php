<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Phone;
use App\Http\Requests\Phones\CreatePhoneRequest;
use App\Http\Requests\Phones\UpdatePhoneRequest;

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

    public function edit(Phone $phone)
    {
        return view('phones.edit')->with('phone', $phone);
    }

    public function update(UpdatePhoneRequest $request, Phone $phone)
    {
        $data = request()->only(['brand','number']);

        $phone->update($data);

        //flash message
        session()->flash('success', 'Phone updated successfully!');

        //redirect
        return redirect(route('phones.index'));
    }

    public function destroy(Phone $phone)
    {
        $phone->delete();

        session()->flash('success', 'Phone deleted successfully!');

        return redirect(route('phones.index'));
    }
}
