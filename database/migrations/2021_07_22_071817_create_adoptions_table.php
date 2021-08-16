<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdoptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adoptions', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->foreignId('pet_id')->constrained()->cascadeOnDelete();
            $table->string('title', 100);
            $table->string('phone', 50)->nullable();
            $table->dateTime('published_at')->nullable();
            $table->dateTime('adopted_at')->nullable();
            $table->mediumText('bio')->nullable();
            $table->mediumText('story')->nullable();
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
        Schema::dropIfExists('adoptions');
    }
}
