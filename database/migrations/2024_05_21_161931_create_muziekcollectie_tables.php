<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMuziekcollectieTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artiesten', function (Blueprint $table) {
            $table->id();
            $table->string('naam');
            $table->timestamps();
        });

        Schema::create('genres', function (Blueprint $table) {
            $table->id();
            $table->string('naam');
            $table->timestamps();
        });

        Schema::create('albums', function (Blueprint $table) {
            $table->id();
            $table->string('titel');
            $table->foreignId('artiest_id')->constrained('artiesten');
            $table->foreignId('genre_id')->constrained('genres');
            $table->year('jaar_van_uitgave')->nullable();
            $table->integer('aantal_nummers')->nullable();
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
        Schema::dropIfExists('albums');
        Schema::dropIfExists('genres');
        Schema::dropIfExists('artiesten');
    }
}
