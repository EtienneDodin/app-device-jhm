<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Device extends Model
{
    use HasFactory;
    protected $fillable = ['code', 'type_id', 'owner_id', 'location_id', 'service_id', 'phone_number', 'ip'];

    public function owner(): BelongsTo
    {
        return $this->belongsTo(Owner::class);
    }

    public function location(): BelongsTo
    {
        return $this->belongsTo(Location::class);
    }

    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }

    public function type(): BelongsTo
    {
        return $this->belongsTo(Type::class);
    }
    
}
