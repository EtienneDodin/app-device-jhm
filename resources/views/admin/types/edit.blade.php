<x-app-layout>
    <x-slot name="header">
        Modifier un équipement
    </x-slot>

    <form action="{{ route('types.update', $type) }}" method="POST" class="flex flex-col items-center gap-12">
        @method('PUT')
        @csrf
        <div class="flex flex-col gap-2 items-center">
            <label for="name">Nom</label>
            <input type="text" name="name" id="name" value="{{ $type->name }}" class="border rounded-md border-anthracite-grey">
        </div>

        <div class="flex gap-4 items-center">
            <label for="number">Numéro de téléphone</label>

            <input type="hidden" name="accepts_number" value="0">
            <input type="checkbox" id="number" name="accepts_number" value="1" {{ $type->accepts_number ? 'checked' : '' }}>
        </div>

        <div class="flex gap-4 items-center">
            <label for="ip">Adresse IP</label>

            <input type="hidden" name="accepts_ip" value="0">
            <input type="checkbox" id="ip" name="accepts_ip" value="1" {{ $type->accepts_ip ? 'checked' : '' }}>
        </div>

        <button type="submit" class="font-akazan text-center text-dark-blue hover:text-main-gray hover:bg-light-blue transition duration-200 ease-in-out border rounded py-1.5 w-20">MODIFIER</button>
    </form>

</x-app-layout>