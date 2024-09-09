<x-app-layout>
    <x-slot name="header">
        Ajouter un équipement
    </x-slot>

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
        }"
            class="font-proxima flex flex-col items-center gap-8" x-init="init">
            @csrf

            {{-- Code --}}
            <div class="flex flex-col gap-2 items-center">
                <label for="code">Poste</label>
                <input type="text" name="code" id="code" value="{{ old('code') }}"
                    class="w-56 border rounded-md border-anthracite-grey">

                @error('code')
                    <p class="text-rose-700">{{ $message }}</p>
                @enderror

            </div>

            {{-- Types --}}
            <div class="flex flex-col gap-2 items-center">
                <label for="type_id">Type d'équipement</label>

                <select name="type_id" id="type_id" class="w-56 border rounded-md border-anthracite-grey"
                    x-on:change="updateFields" x-ref="typeSelect">
                    @foreach ($types as $type)
                        <option value="{{ $type->id }}" {{ $type->id == old('type_id') ? 'selected' : '' }}
                            data-accepts-number="{{ $type->accepts_number }}" data-accepts-ip="{{ $type->accepts_ip }}">
                            {{ $type->name }}
                        </option>
                    @endforeach

                    <option class="text-gray-500" value="">Non défini</option>
                </select>

            </div>

            {{-- Owner --}}
            <div class="flex flex-col gap-2 items-center">
                <label for="owner_id">Utilisateur</label>
                <livewire:search-dropdown />
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

            {{-- Phone number --}}
            <div x-show="showNumberField" x-cloak class="flex flex-col gap-2 items-center">
                <label for="phone_number">Numéro de téléphone</label>
                <input type="text" name="phone_number" id="phone_number" value="{{ old('phone_number') }}"
                    maxlength="10" class="w-56 border rounded-md border-anthracite-grey">

                @error('phone_number')
                    <p class="text-rose-700">{{ $message }}</p>
                @enderror
            </div>

            {{-- IP --}}
            <div x-show="showIPField" x-cloak class="flex flex-col gap-2 items-center">
                <label for="ip">Adresse IP</label>
                <input type="text" name="ip" id="ip" value="{{ old('ip') }}"
                    class="w-56 border rounded-md border-anthracite-grey">

                @error('ip')
                    <p class="text-rose-700">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit"
                class="font-akazan text-center text-dark-blue hover:text-main-gray hover:bg-light-blue transition duration-200 ease-in-out border rounded py-1.5 mb-12 w-20">CREER</button>
        </form>

        {{-- Shortcut links --}}
        <div class="absolute right-60 bottom-1/3 flex flex-col gap-12">
            {{-- Add new device type --}}
            <a href="{{ route('types.create') }}"
                class="opacity-65 hover:opacity-100 py-1.5 px-4 flex gap-2 items-center bg-white hover:bg-light-gray transition duration-200 ease-in-out border rounded-md border-main-gray">
                <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path d="M4 12H20M12 4V20" stroke="#000000" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>
                <span class="font-akazan text-base text-gray-600">Ajouter un type de matériel</span>
            </a>

            {{-- Add new owner --}}
            <a href="{{ route('owners.create') }}"
                class="opacity-65 hover:opacity-100 py-1.5 px-4 flex gap-2 items-center bg-white hover:bg-light-gray transition duration-200 ease-in-out border rounded-md border-main-gray">
                <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path d="M4 12H20M12 4V20" stroke="#000000" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>
                <span class="font-akazan text-base text-gray-600">Ajouter un utilisateur</span>
            </a>

            {{-- Add new location --}}
            <a href="{{ route('locations.create') }}"
                class="opacity-65 hover:opacity-100 py-1.5 px-4 flex gap-2 items-center bg-white hover:bg-light-gray transition duration-200 ease-in-out border rounded-md border-main-gray">
                <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path d="M4 12H20M12 4V20" stroke="#000000" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>
                <span class="font-akazan text-base text-gray-600">Ajouter un emplacement</span>
            </a>

            {{-- Add new service --}}
            <a href="{{ route('services.create') }}"
                class="opacity-65 hover:opacity-100 py-1.5 px-4 flex gap-2 items-center bg-white hover:bg-light-gray transition duration-200 ease-in-out border rounded-md border-main-gray">
                <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path d="M4 12H20M12 4V20" stroke="#000000" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>
                <span class="font-akazan text-base text-gray-600">Ajouter un service</span>
            </a>

        </div>

    </div>
</x-app-layout>
