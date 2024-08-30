<?php

namespace App\Livewire;

use Livewire\Attributes\Url;
use Livewire\Component;
use App\Models\Device;

use App\Exports\DevicesExport;
use Maatwebsite\Excel\Facades\Excel;

class HomeController extends Component
{
    #[Url(except: '', history: true)]
    public $search = '';

    public $exportCopy;

    public function render()
    {
        $devices = Device::with('owner', 'location', 'type', 'service')
        ->where('code', 'like', '%'.$this->search.'%')
        ->orWhere('phone_number', 'like', '%'.$this->search.'%')
        ->orWhere('ip', 'like', '%'.$this->search.'%')
        ->orWhereHas('owner', function($query) {
            $query->where('name', 'like', '%'.$this->search.'%');
        })
        ->orWhereHas('location', function($query) {
            $query->where('name', 'like', '%'.$this->search.'%');
        })
        ->orWhereHas('service', function($query) {
            $query->where('name', 'like', '%'.$this->search.'%');
        })
        ->orWhereHas('type', function($query) {
            $query->where('name', 'like', '%'.$this->search.'%');
        })
        ->get();

        $this->exportCopy = $devices;

        return view('admin.index', compact('devices'))->layout('layouts.app');
    }


    // Export data to Excel or PDF using Laravel-Excel
    public function export($ext)
    {
        $export = new DevicesExport($this->exportCopy);

        return Excel::download($export, 'materiel.' . $ext);
    }
}