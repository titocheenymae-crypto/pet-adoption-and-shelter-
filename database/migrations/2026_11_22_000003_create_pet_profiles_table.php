<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pet_profiles', function (Blueprint $table) {
            $table->id();
            // unique() makes the Owner -> PetProfile relation truly one-to-one
            $table->foreignId('owner_id')->unique()->constrained()->cascadeOnDelete();
            $table->string('pet_name');
            $table->string('species');
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pet_profiles');
    }
};
