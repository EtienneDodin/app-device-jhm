<x-app-layout>
    <x-slot name="header">
            Ajouter un type de matériel
    </x-slot>

        <div class="pt-6">
            <form action="{{ route('types.store') }}" method="POST" class="font-proxima flex flex-col items-center gap-12">
                @csrf
                <div class="flex flex-col gap-3 items-center">
                    <label for="name">Type d'équipement</label>
                    <input type="text" name="name" id="name" class="border rounded-md border-anthracite-grey">
                </div>
                <div class="flex gap-4 items-center">
                    <label for="number">Numéro de téléphone</label>
                    <input type="hidden" name="accepts_number" value="0">
                    <input type="checkbox" id="number" name="accepts_number" value="1">
                </div>
                <div class="flex gap-4 items-center">
                    <label for="ip">Adresse IP</label>
                    <input type="hidden" name="accepts_ip" value="0">
                    <input type="checkbox" id="ip" name="accepts_ip" value="1">
                </div>
                <button type="submit" class="font-akazan text-center text-dark-blue hover:text-main-gray hover:bg-light-blue transition duration-200 ease-in-out border rounded py-1.5 w-20">CREER</button>
            </form>
        </div>
    </div>
</x-app-layout>