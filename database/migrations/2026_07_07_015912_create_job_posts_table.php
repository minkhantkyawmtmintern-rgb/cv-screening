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
        Schema::create('job_posts', function (Blueprint $table) {

            $table->id();

            $table->string('title');

            $table->string('department')
                ->nullable();

            $table->longText('description')
                ->nullable();

            $table->enum('experience_level', [
                'junior',
                'mid',
                'senior'
            ])->default('junior');

            $table->unsignedTinyInteger('minimum_experience')
                ->nullable();

            $table->string('location')
                ->nullable();

            $table->boolean('is_active')
                ->default(true);


            $table->foreignId('created_by')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_posts');
    }
};
