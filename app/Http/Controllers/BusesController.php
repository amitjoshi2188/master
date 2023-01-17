<?php

namespace App\Http\Controllers;

use App\Models\Buses;
use Illuminate\Http\Request;

class BusesController extends Controller
{
    public function index()
    {
        $buses = Buses::orderBy('id', 'desc')->paginate(5);
        return view('buses.index', compact('buses'));
    }

    public function create()
    {
        return view('buses.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        Buses::create($request->post());

        return redirect()->route('buses.index')->with('success', 'Bus has been created successfully.');
    }

    public function show(Buses $buses)
    {
        return view('buses.show', compact('buses'));
    }

    public function edit(Buses $bus)
    {
        return view('buses.edit', compact('bus'));
    }

    public function update(Request $request, Buses $bus)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $bus->fill($request->post())->save();

        return redirect()->route('buses.index')->with('success', 'buses Has Been updated successfully');
    }

    public function destroy(Buses $bus)
    {
        $bus->delete();
        return redirect()->route('buses.index')->with('success', 'bus has been deleted successfully');
    }
}
