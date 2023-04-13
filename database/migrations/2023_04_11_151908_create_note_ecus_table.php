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
        Schema::create('note_ecus', function (Blueprint $table) {
            $table->id();

            $table->foreignId('etudiant_id')
                ->index()
                ->constrained()
                ->onDelete('cascade');

            $table->foreignId('ecu_id')
                ->index()
                ->constrained()
                ->onDelete('cascade');

            $table->integer('note');

            $table->unique(['etudiant_id', 'ecu_id'], 'unique_note');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('note_ecus');
    }
};
