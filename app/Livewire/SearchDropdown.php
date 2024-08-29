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
    public $selectedOwnerName;

    public function mount($selectedOwnerId = null, $selectedOwnerName = '')
    {
        $this->owners = Owner::all();
        $this->selectedOwnerId = $selectedOwnerId;
        $this->searchOwner = $selectedOwnerName;
    }

    public function updatedSearchOwner()
    {
        $this->owners = Owner::where('name', 'like', '%' . $this->searchOwner . '%')->get();
    }

    // When user clicks on an owner, this method will be called
    
    #[On('userClicked')]
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
