<?php

namespace App\Http\Controllers;

use App\Http\Requests\VehicleFormRequest;
use App\Models\Vehicle;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        return view('vehicles.index', [
            'vehicles' => Vehicle::latest()->paginate(9),
            'vehicleCount' => Vehicle::count(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        return view('vehicles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VehicleFormRequest $request) {
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = Str::uuid().'.'.'jpg';
            Storage::putFileAs('public/images', $file, $fileName);
        }

        $vehicle = Vehicle::create([
            'make' => $request->make,
            'model' => $request->model,
            'year' => $request->year,
            'price' => $request->price,
            'description' => $request->description,
            'image' => $fileName
        ]);
        return to_route('vehicles.index')->with('success', $vehicle->year.' '.$vehicle->make.' '.$vehicle->model. ' has been created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Vehicle $vehicle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vehicle $vehicle)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vehicle $vehicle)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vehicle $vehicle)
    {
        //
    }
}
