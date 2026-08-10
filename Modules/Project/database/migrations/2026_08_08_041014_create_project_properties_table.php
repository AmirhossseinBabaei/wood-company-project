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
            Schema::create('project_property', function (Blueprint $table) {
                $table->foreignId('project_id')
                    ->constrained('projects')
                    ->cascadeOnDelete();

                $table->foreignId('property_id')
                    ->constrained('properties')
                    ->cascadeOnDelete();

                $table->string('fa_value');
                $table->string('en_value');

                $table->primary(['project_id', 'property_id']);

                $table->timestamps();
            });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_images');
    }
};
