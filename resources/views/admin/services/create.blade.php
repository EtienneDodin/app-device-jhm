<x-app-layout>
    <x-slot name="header">
        Ajouter un service
    </x-slot>

    <div class="pt-6">
        <form action="{{ route('services.store') }}" method="POST" class="font-proxima flex flex-col items-center gap-10">
            @csrf

            <div class="flex flex-col gap-3 items-center">
                <label for="name">Nom</label>
                <input type="text" name="name" id="name" class="border rounded-md border-anthracite-grey">

                @error('name')
                    <p class="text-rose-700">{{ $message }}</p>
                @enderror
                
            </div>

            <button type="submit" class="font-akazan text-center text-dark-blue hover:text-main-gray hover:bg-light-blue transition duration-200 ease-in-out border rounded py-1.5 w-20">CREER</button>
        </form>
    </div>
</x-app-layout>