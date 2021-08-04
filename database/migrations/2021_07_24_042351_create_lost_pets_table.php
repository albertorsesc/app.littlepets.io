<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLostPetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lost_pets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pet_id')->constrained();
            $table->string('title', 50)->nullable();
            $table->string('phone', 50)->nullable();
            $table->string('post_type', 50); // owner/rescuer
            $table->mediumText('description')->nullable();
            $table->dateTime('published_at')->nullable();
            $table->dateTime('lost_at')->nullable(); // for owner
            $table->dateTime('found_at')->nullable(); // when it was found, either from owner or rescuer returning back to owner
            $table->dateTime('rescued_at')->nullable(); // for rescuer
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
        Schema::dropIfExists('lost_pets');
    }
}
