
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('produits', function (Blueprint $table) {
            $table->foreignId('boutique_id')
                ->constrained('boutiques')
                ->cascadeOnDelete();

            $table->string('nom');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->decimal('prix', 10, 2);
            $table->unsignedInteger('stock')->default(0);
            $table->string('image')->nullable();
            $table->boolean('actif')->default(true);
        });
    }

    public function down(): void
    {
        Schema::table('produits', function (Blueprint $table) {
            $table->dropForeign(['boutique_id']);
            $table->dropUnique(['slug']);

            $table->dropColumn([
                'boutique_id',
                'nom',
                'slug',
                'description',
                'prix',
                'stock',
                'image',
                'actif',
            ]);
        });
    }
};
