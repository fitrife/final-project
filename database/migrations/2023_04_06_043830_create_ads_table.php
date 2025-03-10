<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ads', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->foreignId('training_categories_id')->constrained();
            $table->string('thumbnail')->nullable();
            $table->text('description');
            $table->text('theory');
            $table->text('participant_requirement')->nullable();
            $table->text('goal')->nullable();
            $table->text('method')->nullable();
            $table->text('facility')->nullable();
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
        Schema::dropIfExists('ads');
    }
};
