<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Type extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'accepts_number', 'accepts_ip'];

    public function devices(): HasMany
    {
        return $this->hasMany(Device::class);
    }
}
