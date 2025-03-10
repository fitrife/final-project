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
        Schema::create('softskill', function (Blueprint $table) {
            $table->id();
            $table->string('total_of_participant');
            $table->text('participants');
            $table->string('name');
            $table->string('slugSoftskill')->unique();
            $table->foreignId('training_id');
            $table->string('job_position');
            $table->string('company');
            $table->text('company_address');
            $table->string('company_email');
            $table->string('email');
            $table->string('telephone');
            $table->string('phone');
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
        Schema::dropIfExists('softskill');
    }
};
