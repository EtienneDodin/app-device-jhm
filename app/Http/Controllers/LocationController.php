<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location;
use App\Models\Device;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $locations = Location::all();

        return view('admin.locations.index', compact('locations'));
    }

    /**
     * Rules to validate.
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
        ];
    }

    /**
     * Custom validation messages.
     */

     public function messages(): array
     {
         return [
             'name.required' => 'Le nom de l\'emplacement est requis.',
         ];
     }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.locations.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate($this->rules(), $this->messages());

        Location::create($validatedData);

        return redirect()->route('locations.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Location $location)
    {
        return view('admin.locations.edit', compact('location'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Location $location)
    {
        $validatedData = $request->validate($this->rules(), $this->messages());

        $location->update($validatedData);

        return redirect()->route('locations.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Location $location)
    {
        Device::where('location_id', $location->id)->update(['location_id' => null]);

        $location->delete();

        return redirect()->route('locations.index');
        
    }
}
