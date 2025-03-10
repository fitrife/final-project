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
        Schema::create('bnsp', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('birthdate');
            $table->string('email');
            $table->string('phone');
            $table->foreignId('education_id');
            $table->string('job');
            $table->text('company')->nullable(true);
            $table->text('company_address')->nullable(true);
            $table->text('company_messenger');
            $table->text('have_attended_training');
            $table->foreignId('training_id');
            $table->foreignId('training_categories_id');
            $table->enum('progress', ['Belum', 'Sudah'])->default('Belum');
            $table->foreignId('user_id')->nullable()->constrained();
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
        Schema::dropIfExists('bnsp');
    }
};
