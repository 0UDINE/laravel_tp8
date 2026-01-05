<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notes', function (Blueprint $table) {
        $table->id();
        $table->foreignId('etudiant_id')->constrained('etudiants')->onDelete('cascade');
        $table->foreignId('module_id')->constrained('modules')->onDelete('cascade');
        $table->decimal('note_intra', 5, 2)->nullable();
        $table->decimal('note_projet', 5, 2)->nullable();
        $table->decimal('note_final', 5, 2)->nullable();
        $table->decimal('moyenne', 5, 2)->nullable();
        
        $table->unique(['etudiant_id', 'module_id']);

        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notes');
    }
}
