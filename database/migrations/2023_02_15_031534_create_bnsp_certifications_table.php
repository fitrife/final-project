<?php

use App\Models\Ad;
use App\Models\Education;
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
        Schema::create('bnsp_certifications', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slugBnsp')->unique();
            $table->string('birthdate');
            $table->string('email');
            $table->string('phone');
            $table->foreignIdFor(Education::class); 
            $table->string('job');
            $table->text('company')->nullable(true);
            $table->text('company_address')->nullable(true);
            $table->text('company_messenger');
            $table->text('have_attended_training');
            $table->foreignId('training_id')->constrained()->nullable();
            $table->foreignIdFor(Ad::class)->nullable();
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
        Schema::dropIfExists('bnsp_certifications');
    }
};
