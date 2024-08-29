<div>

    <div x-data="{ open: false }" @click.outside="open = false">

        <input type="text" wire:model.live="searchOwner" id="owner_id" x-on:focus="open = true" class="w-56 border rounded-md border-anthracite-grey" placeholder="Rechercher un utilisateur...">
        <input type="text" name="owner_id" class="hidden" wire:model="selectedOwnerId">
        
        <div x-show="open" x-cloak class="absolute bg-white border rounded-md mt-1 w-56">
            @if ($this->owners)
                <ul>
                    @foreach ($this->owners as $owner)
                        <li wire:click="$dispatch('userClicked', { ownerId: {{ $owner->id }} })" class="cursor-pointer p-2 hover:bg-gray-200">{{ $owner->name }}</li>
                    @endforeach
                </ul>
            @else
                <div class="p-2">Aucun résultat trouvé</div>
            @endif
        </div>

    </div>

</div>