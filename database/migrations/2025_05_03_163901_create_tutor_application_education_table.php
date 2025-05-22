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
        Schema::create('tutor_application_educations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tutor_application_id')
                  ->constrained('tutor_applications')
                  ->onDelete('cascade');

            // Step 2: education entries
            $table->string('institution');
            $table->string('degree');
            $table->string('field');
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->boolean('current')->default(false);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tutor_application_education');
    }
};
