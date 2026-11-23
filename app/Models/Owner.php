<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Owner extends Model
{
    protected $fillable = ['name', 'email'];

    public function petProfile(): HasOne
    {
        return $this->hasOne(PetProfile::class);
    }
}