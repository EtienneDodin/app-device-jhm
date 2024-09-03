<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Device;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::all();

        return view('admin.services.index', compact('services'));
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
            'name.required' => 'Le nom du service est requis.',
        ];
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.services.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate($this->rules(), $this->messages());

        Service::create($validatedData);

        return redirect()->route('services.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        return view('admin.services.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
    {
        $validatedData = $request->validate($this->rules(), $this->messages());

        $service->update($validatedData);

        return redirect()->route('services.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        Device::where('service_id', $service->id)->update(['service_id' => null]);

        $service->delete();

        return redirect()->route('services.index');
        
    }
}
