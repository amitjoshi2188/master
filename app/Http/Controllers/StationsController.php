<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stations;


class StationsController extends Controller
{
    public function index()
    {
        $stations = Stations::orderBy('id', 'desc')->paginate(5);
        return view('stations.index', compact('stations'));
    }

    public function create()
    {
        return view('stations.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        Stations::create($request->post());

        return redirect()->route('stations.index')
            ->with('success', 'Station has been created successfully.');
    }

    public function show(Stations $stations)
    {
        return view('stations.show', compact('stations'));
    }

    public function edit(Stations $station)
    {
        return view('stations.edit', compact('station'));
    }

    public function update(Request $request, Stations $station)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $station->fill($request->post())->save();

        return redirect()->route('stations.index')
            ->with('success', 'stations Has Been updated successfully');
    }

    public function destroy(Stations $station)
    {
        $station->delete();
        return redirect()->route('stations.index')
            ->with('success', 'Station has been deleted successfully');
    }
}
