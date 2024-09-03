<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Device;
use App\Models\Owner;
use App\Models\Type;
use App\Models\Location;
use App\Models\Service;

class DeviceController extends Controller
{
    
    /**
     * Rules to validate.
     */
    public function rules(): array
    {
        return [
            'code' => 'required',
            'type_id' => 'integer|nullable',
            'location_id' => 'integer|nullable',
            'service_id' => 'integer|nullable',
            'owner_id' => 'integer|nullable',
            'phone_number' => 'numeric|nullable|regex:/^(0)[1-9]{1}[0-9]{8}$/i',
            'ip' => 'ip|nullable',
        ];
    }

     /**
     * Custom validation messages.
     */

    public function messages(): array
    {
        return [
            'code.required' => 'Le numéro de poste est obligatoire.',
            // 'service_id.exists' => 'Le service sélectionné est invalide.',
            'phone_number.numeric' => 'Le numéro de téléphone doit être un nombre.',
            'phone_number.regex' => 'Le numéro de téléphone doit contenir 10 chiffres, au format 0600000000.',
            'ip.ip' => 'L\'adresse IP doit être une adresse IP valide.',
        ];
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $owners = Owner::all();
        $types = Type::all();
        $locations = Location::all();
        $services = Service::all();

        return view('admin.devices.create', compact('owners', 'types', 'locations', 'services'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate($this->rules(), $this->messages());

        Device::create($validatedData);

        return redirect()->route('index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Device $device)
    {
        $types = Type::all();
        $locations = Location::all();
        $services = Service::all();

        return view('admin.devices.edit', compact('device', 'types', 'locations', 'services'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Device $device)
    {
        $validatedData = $request->validate($this->rules(), $this->messages());

        $device->update($validatedData);

        // Empty phone number and IP if the device type does not accept them
        if ($device->type_id) {
            if (!$device->type->accepts_number) {
                $device->update(['phone_number' => null]);
            };
    
            if (!$device->type->accepts_ip) {
                $device->update(['ip' => null]);
            };
        } else {
            $device->update(['phone_number' => null, 'ip' => null]);
        };
        
        return redirect()->route('index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Device $device)
    {
        $device->delete();

        return redirect()->route('index');
    }
}
