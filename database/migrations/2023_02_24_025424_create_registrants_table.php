<?php

use App\Models\Education;
use App\Models\Training;
use App\Models\TrainingCategories;
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
        Schema::create('registrants', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('birthdate');
            $table->string('email');
            $table->string('phone');
            $table->foreignIdFor(Education::class);
            $table->string('job');
            $table->text('company')->nullable(true);
            $table->text('company_address')->nullable(true);
            $table->text('company_messenger');
            $table->text('have_attended_training');
            $table->foreignIdFor(Training::class);
            $table->foreignIdFor(TrainingCategories::class);
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
        Schema::dropIfExists('registrants');
    }
};
