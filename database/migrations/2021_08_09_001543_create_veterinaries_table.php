<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVeterinariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('veterinaries', function (Blueprint $table) {
            $table->id();
            $table->string('slug');
            $table->foreignId('user_id')->constrained();
            $table->string('name', 255);
            $table->json('services');
            $table->string('specialty', 255)->nullable();
            $table->string('phone', 50);
            $table->string('email', 100)->nullable();
            $table->boolean('is_open_at_night')->default(false);
            $table->string('facebook_profile', 255)->nullable();
            $table->string('site', 255)->nullable();
            $table->text('about')->nullable();
            $table->boolean('status')->default(false);
            $table->dateTime('published_at')->nullable();
            $table->string('logo')->nullable();
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
        Schema::dropIfExists('veterinaries');
    }
}
