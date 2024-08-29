<x-app-layout>
    <x-slot name="header">
            Ajouter un équipement
    </x-slot>

        <div>
            <form action="{{ route('devices.store') }}" method="POST" x-data="{ 
                showNumberField: false, 
                showIPField: false, 
                updateFields(event) {
                    const selectedOption = event.target.options[event.target.selectedIndex];
                    this.showNumberField = selectedOption.dataset.acceptsNumber === '1';
                    this.showIPField = selectedOption.dataset.acceptsIp === '1';
                },
                init() {
                    const selectElement = this.$refs.typeSelect;
                    const selectedOption = selectElement.options[selectElement.selectedIndex];
                    this.showNumberField = selectedOption.dataset.acceptsNumber === '1';
                    this.showIPField = selectedOption.dataset.acceptsIp === '1';
                }
            }" class="font-proxima flex flex-col items-center gap-8" x-init="init">
                @csrf
                    
                {{-- Code --}}
                <div class="flex flex-col gap-2 items-center">
                    <label for="code">Poste</label>
                    <input type="text" name="code" id="code" value="{{ old('code') }}" class="w-56 border rounded-md border-anthracite-grey">

                    @error('code')
                        <p class="text-rose-700">{{ $message }}</p>
                    @enderror
    
                </div>

                {{-- Types --}}
                <div class="flex flex-col gap-2 items-center">
                    <label for="type_id">Type d'équipement</label>
                    <select name="type_id" id="type_id" class="w-56 border rounded-md border-anthracite-grey" x-on:change="updateFields" x-ref="typeSelect">
                        @foreach ($types as $type)
                            <option value="{{ $type->id }}" {{ $type->id == old('type_id') ? 'selected' : '' }} data-accepts-number="{{ $type->accepts_number }}" data-accepts-ip="{{ $type->accepts_ip }}">
                                {{ $type->name }}
                            </option>
                        @endforeach
                    </select>

                    @error('type_id')
                        <p class="text-rose-700">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Location --}}
                <div class="flex flex-col gap-2 items-center">
                    <label for="location_id">Emplacement</label>
                    <select name="location_id" id="location_id" class="w-56 border rounded-md border-anthracite-grey">
                        <option class="text-gray-500" value="">Non défini</option>

                        @foreach ($locations as $location)
                            <option value="{{ $location->id }}" {{ $location->id == old('location_id') ? 'selected' : '' }}>
                                {{ $location->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Service --}}
                <div class="flex flex-col gap-2 items-center">
                    <label for="service_id">Service</label>
                    <select name="service_id" id="service_id" class="w-56 border rounded-md border-anthracite-grey">
                        <option class="text-gray-500" value="">Non défini</option>

                        @foreach ($services as $service)
                            <option value="{{ $service->id }}" {{ $service->id == old('service_id') ? 'selected' : '' }}>
                                {{ $service->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Owner --}}
                <div class="flex flex-col gap-2 items-center">
                    <label for="owner_id">Utilisateur</label>
                    <livewire:search-dropdown />
                </div>

                {{-- Phone number --}}
                <div x-show="showNumberField" x-cloak class="flex flex-col gap-2 items-center">
                    <label for="phone_number">Numéro de téléphone</label>
                    <input type="text" name="phone_number" id="phone_number" value="{{ old('phone_number') }}" maxlength="10" class="w-56 border rounded-md border-anthracite-grey">

                    @error('phone_number')
                        <p class="text-rose-700">{{ $message }}</p>
                    @enderror
                </div>

                {{-- IP --}}
                <div x-show="showIPField" x-cloak class="flex flex-col gap-2 items-center">
                    <label for="ip">Adresse IP</label>
                    <input type="text" name="ip" id="ip" value="{{ old('ip') }}" class="w-56 border rounded-md border-anthracite-grey">

                    @error('ip')
                        <p class="text-rose-700">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" class="font-akazan text-center text-dark-blue hover:text-main-gray hover:bg-light-blue transition duration-200 ease-in-out border rounded py-1.5 mb-12 w-20">CREER</button>
            </form>
        </div>
    </div>
</x-app-layout>
