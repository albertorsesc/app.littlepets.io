<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddOrganizationColumnsToTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('teams', function (Blueprint $table) {
            $table->string('slug', 255)->nullable();
            $table->string('type', 50)->nullable();
            $table->string('phone', 50)->nullable();
            $table->string('email', 150)->nullable();
            $table->string('facebook_profile', 255)->nullable();
            $table->string('site', 255)->nullable();
            $table->unsignedInteger('capacity')->nullable();
            $table->text('about')->nullable();
            $table->string('logo', 255)->nullable();
            $table->dateTime('published_at')->nullable();
            $table->dateTime('verified_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('teams', function (Blueprint $table) {
            $table->dropColumn('type');
            $table->dropColumn('capacity');
            $table->dropColumn('published_at');
        });
    }
}
