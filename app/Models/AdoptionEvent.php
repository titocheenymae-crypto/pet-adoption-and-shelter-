<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class AdoptionEvent extends Model
{
    protected $fillable = [
        'event_name',
        'event_date',
        'location',
    ];

    protected function casts(): array
    {
        return [
            'event_date' => 'date',
        ];
    }

    public function pets(): BelongsToMany
    {
        return $this->belongsToMany(Pet::class)
                    ->withTimestamps();
    }
}