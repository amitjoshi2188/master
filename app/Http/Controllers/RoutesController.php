<?php

namespace App\Http\Controllers;

use App\Models\Buses;
use App\Models\Routes;
use App\Models\Stations;
use Illuminate\Http\Request;

class RoutesController extends Controller
{
    public function index()
    {
        $routes = Routes::orderBy('id', 'desc')->paginate(5);
        // echo "<pre>";
        // print_r($routes);
        // echo "<pre>";
        // exit;

        return view('routes.index', compact('routes'));
    }

    public function create()
    {


        $busListing = Buses::all()->toArray();
        $stationsListing = Stations::all()->toArray();

        foreach ($busListing as $key => $bus) {
            $buses[$bus['id']] = $bus['name'];
        }

        foreach ($stationsListing as $key => $station) {
            $stations[$station['id']] = $station['name'];
        }

        return view('routes.create', compact('buses', 'stations'));
    }

    public function store(Request $request)
    {


        $request->validate([
            'name' => 'required',
            'bus_id' => 'required',
            'from_station_id' => 'required',
            'to_station_id' => 'required',
            'timing' => 'required',
        ]);

        Routes::create($request->post());

        return redirect()->route('routes.index')->with('success', 'Route has been created successfully.');
    }

    public function show(Routes $route)
    {
        return view('routes.show', compact('route'));
    }

    public function edit(Routes $route)
    {


        $routeInfo = Routes::findOrFail($route->id)->toArray();
        $busListing = Buses::all()->toArray();
        $stationsListing = Stations::all()->toArray();
        foreach ($busListing as $key => $bus) {
            $buses[$bus['id']] = $bus['name'];
        }

        foreach ($stationsListing as $key => $station) {
            $stations[$station['id']] = $station['name'];
        }
        //        print_r($route);exit;
        return view('routes.edit', compact('route', 'routeInfo', 'buses', 'stations'));
    }

    public function update(Request $request, Routes $route)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $route->fill($request->post())->save();

        return redirect()->route('routes.index')->with('success', 'route Has Been updated successfully');
    }

    public function destroy(Routes $route)
    {
        $route->delete();
        return redirect()->route('routes.index')->with('success', 'route has been deleted successfully');
    }
}
