<x-app-layout>
    <x-slot name="header">
        Modifier un utilisateur
    </x-slot>

    <form action="{{ route('owners.update', $owner) }}" method="POST" class="font-proxima flex flex-col items-center gap-8">
        @method('PUT')
        @csrf

        {{-- Name --}}
        <div class="flex flex-col gap-3 items-center">
            <label for="name">Nom</label>
            <input type="text" name="name" id="name" value="{{ $owner->name }}" class="w-56 border rounded-md border-anthracite-grey">

            @error('name')
                <p class="text-rose-700">{{ $message }}</p>
            @enderror
            
        </div>

        <button type="submit" class="font-akazan text-center text-dark-blue hover:text-main-gray hover:bg-light-blue transition duration-200 ease-in-out border rounded py-1.5 mb-12 w-20">MODIFIER</button>

    </form>

</x-app-layout>