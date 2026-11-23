<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Pet extends Model
{
    protected $fillable = [
        'shelter_id',
        'name',
        'species',
        'status',
    ];

    public function shelter(): BelongsTo
    {
        return $this->belongsTo(Shelter::class);
    }

    public function adoptionEvents(): BelongsToMany
    {
        return $this->belongsToMany(AdoptionEvent::class)
                    ->withTimestamps();
    }
}

