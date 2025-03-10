<?php

use App\Models\Ad;
use App\Models\Ads;
use App\Models\Education;
use App\Models\Training;
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
        Schema::create('kemnaker_certifications', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slugKemnaker')->unique();
            $table->string('birthdate');
            $table->string('email');
            $table->string('phone');
            $table->foreignIdFor(Education::class);
            $table->string('job');
            $table->text('company')->nullable(true);
            $table->text('company_address')->nullable(true);
            $table->text('company_messenger');
            $table->text('have_attended_training');
            $table->foreignIdFor(Training::class)->nullable();
            $table->foreignIdFor(Ad::class)->nullable();
            $table->enum('progress', ['Belum', 'Sudah'])->default('Belum');
            $table->foreignId('user_id')->constrained()->nullable();
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
        Schema::dropIfExists('kemnaker_certifications');
    }
};
