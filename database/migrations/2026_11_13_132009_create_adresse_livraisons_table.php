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
       Schema::create('adresse_livraisons', function (Blueprint $table) {
    $table->id();
    $table->foreignId('commande_id')->constrained()->cascadeOnDelete();
    $table->string('nom_complet');
    $table->string('telephone');
    $table->string('adresse');
    $table->string('code_postal');
    $table->string('ville');
    $table->string('pays')->default('France');
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('adresse_livraisons');
    }
};
