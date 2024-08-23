<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\Owner;

class SearchDropdown extends Component
{
    public $searchOwner;
    public $owners;
    public $selectedOwnerId;

    public function mount()
    {
        $this->searchOwner = '';
        $this->owners = Owner::all();
        $this->selectedOwnerId = null;
    }

    public function updatedSearchOwner()
    {
        $this->owners = Owner::where('name', 'like', '%' . $this->searchOwner . '%')->get();
    }

    #[On('user-clicked')]
    public function selectOwner($ownerId)
    {
        $this->selectedOwnerId = $ownerId;
        $this->searchOwner = Owner::find($ownerId)->name;
        $this->owners = [];
    }

    public function render()
    {
        return view('livewire.search-dropdown');
    }
}
