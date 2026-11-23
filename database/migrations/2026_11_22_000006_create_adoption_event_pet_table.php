<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    // Pivot for Pet <-> AdoptionEvent (belongsToMany ... ->withTimestamps())
    public function up(): void
    {
        Schema::create('adoption_event_pet', function (Blueprint $table) {
            $table->id();
            $table->foreignId('adoption_event_id')->constrained()->cascadeOnDelete();
            $table->foreignId('pet_id')->constrained()->cascadeOnDelete();
            $table->timestamps();

            $table->unique(['adoption_event_id', 'pet_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('adoption_event_pet');
    }
};
