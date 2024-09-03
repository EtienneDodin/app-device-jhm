<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Owner;
use App\Models\Device;

class OwnerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $owners = Owner::all();

        return view('admin.owners.index', compact('owners'));
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
            'name.required' => 'Le nom de l\'utilisateur est requis.',
        ];
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.owners.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate($this->rules(), $this->messages());

        Owner::create($validatedData);

        return redirect()->route('owners.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Owner $owner)
    {
        return view('admin.owners.edit', compact('owner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Owner $owner)
    {
        $validatedData = $request->validate($this->rules(), $this->messages());

        $owner->update($validatedData);

        return redirect()->route('owners.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Owner $owner)
    {
        Device::where('owner_id', $owner->id)->update(['owner_id' => null]);

        $owner->delete();

        return redirect()->route('owners.index');
    }
}
