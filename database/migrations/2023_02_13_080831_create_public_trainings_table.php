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
        Schema::create('public_trainings', function (Blueprint $table) {
            $table->id();
            $table->string('program');
            $table->string('total_of_participants');
            $table->text('name_of_participants');
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('job_position');
            $table->string('company');
            $table->text('company_address');
            $table->string('company_email');
            $table->string('alternative_email');
            $table->string('company_phone');
            $table->string('handphone');
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
        Schema::dropIfExists('public');
    }
};
