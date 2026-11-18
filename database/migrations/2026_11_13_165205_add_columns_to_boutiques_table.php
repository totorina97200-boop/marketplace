
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('boutiques', function (Blueprint $table) {

            if (!Schema::hasColumn('boutiques', 'nom')) {
                $table->string('nom');
            }

            if (!Schema::hasColumn('boutiques', 'slug')) {
                $table->string('slug')->nullable();
            }

            if (!Schema::hasColumn('boutiques', 'description')) {
                $table->text('description')->nullable();
            }

            if (!Schema::hasColumn('boutiques', 'telephone')) {
                $table->string('telephone')->nullable();
            }

            if (!Schema::hasColumn('boutiques', 'statut')) {
                $table->string('statut')->default('active');
            }

        });
    }

    public function down(): void
    {
        Schema::table('boutiques', function (Blueprint $table) {
            $table->dropColumn([
                'nom',
                'slug',
                'description',
                'telephone',
                'statut',
            ]);
        });
    }
};
