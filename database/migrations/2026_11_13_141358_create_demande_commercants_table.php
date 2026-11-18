<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
       Schema::create('demande_commercants', function (Blueprint $table) {
        $table->id();

        $table->foreignId('user_id')
            ->unique()
            ->constrained()
            ->cascadeOnDelete();

        $table->string('nom_boutique');
        $table->text('description')->nullable();
        $table->string('telephone')->nullable();

        $table->string('statut')->default('en_attente');

        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
     Schema::dropIfExists('demande_commercants');
    }
};
