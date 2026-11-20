
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('commandes', function (Blueprint $table) {
            $table->foreignId('user_id')
                ->constrained('users')
                ->cascadeOnDelete();

            $table->string('numero')->unique();
            $table->decimal('total', 10, 2)->default(0);
            $table->string('statut')->default('en_attente');
            $table->string('statut_paiement')->default('en_attente');
        });
    }

    public function down(): void
    {
        Schema::table('commandes', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropUnique(['numero']);

            $table->dropColumn([
                'user_id',
                'numero',
                'total',
                'statut',
                'statut_paiement',
            ]);
        });
    }
};
