<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tutor_applications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                  ->constrained()
                  ->onDelete('cascade');

            // Step 1: personal info
            $table->string('phone')->nullable();
            $table->text('biography');

            // Step 3: experience
            $table->unsignedTinyInteger('experience_years');
            $table->text('experience_description');
            $table->boolean('online_experience')->default(false);

            // Step 4: uploaded documents
            $table->string('cv');
            $table->string('diploma');
            $table->string('id_card');

            // Application workflow
            $table->enum('status', ['pending', 'approved', 'rejected'])
                  ->default('pending');

            $table->timestamps();
        });

       
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tutor_applications');
    }
};
